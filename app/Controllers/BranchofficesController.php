<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \App\Models\{
    BranchofficesModel
};
use App\Models\LogModel;
use CodeIgniter\API\ResponseTrait;
use App\Models\EmpresasModel;
use App\Models\UsuariosSucursalModel;

class BranchofficesController extends BaseController {

    use ResponseTrait;

    protected $log;
    protected $branchoffices;
    protected $empresas;
    protected $usuariosPorSucursal;

    public function __construct() {
        $this->branchoffices = new BranchofficesModel();
        $this->log = new LogModel();
        $this->empresas = new EmpresasModel();
        $this->usuariosPorSucursal = new UsuariosSucursalModel();
        helper('menu');
    }

    public function index() {


        if ($this->request->isAJAX()) {

            $datos = $this->branchoffices->select('id,key,name,cologne,city,postalCode,timeDifference,tax,dateAp,phone,fax,companie,created_at,deleted_at,updated_at')->where('deleted_at', null);

            return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
        }


        $empresas = $this->empresas->select("id,nombre")->asObject()->findAll();

        $titulos["empresas"] = $empresas;
        $titulos["title"] = lang('branchoffices.title');
        $titulos["subtitle"] = lang('branchoffices.subtitle');

        return view('branchoffices', $titulos);
    }

    /**
     * Read Branchoffices
     */
    public function getBranchoffices() {


        $idBranchoffices = $this->request->getPost("idBranchoffices");
        $datosBranchoffices = $this->branchoffices->find($idBranchoffices);

        echo json_encode($datosBranchoffices);
    }

    /**
     * Save or update Branchoffices
     */
    public function save() {


        helper('auth');
        $userName = user()->username;
        $idUser = user()->id;

        $datos = $this->request->getPost();

        if ($datos["idBranchoffices"] == 0) {


            try {


                if ($this->branchoffices->save($datos) === false) {

                    $errores = $this->branchoffices->errors();

                    foreach ($errores as $field => $error) {

                        echo $error . " ";
                    }

                    return;
                }

                $dateLog["description"] = lang("vehicles.logDescription") . json_encode($datos);
                $dateLog["user"] = $userName;

                $this->log->save($dateLog);

                echo "Guardado Correctamente";
            } catch (\PHPUnit\Framework\Exception $ex) {


                echo "Error al guardar " . $ex->getMessage();
            }
        } else {


            if ($this->branchoffices->update($datos["idBranchoffices"], $datos) == false) {

                $errores = $this->branchoffices->errors();
                foreach ($errores as $field => $error) {

                    echo $error . " ";
                }

                return;
            } else {

                $dateLog["description"] = lang("branchoffices.logUpdated") . json_encode($datos);
                $dateLog["user"] = $userName;

                $this->log->save($dateLog);
                echo "Actualizado Correctamente";

                return;
            }
        }

        return;
    }

    /**
     * Delete Branchoffices
     * @param type $id
     * @return type
     */
    public function delete($id) {

        $infoBranchoffices = $this->branchoffices->find($id);
        helper('auth');
        $userName = user()->username;

        if (!$found = $this->branchoffices->delete($id)) {
            return $this->failNotFound(lang('branchoffices.msg.msg_get_fail'));
        }



        $logData["description"] = lang("branchoffices.logDeleted") . json_encode($infoBranchoffices);
        $logData["user"] = $userName;

        $this->log->save($logData);
        return $this->respondDeleted($found, lang('branchoffices.msg_delete'));
    }

    /**
     * Get Storages via AJax
     */
    public function getSucursalesAjax() {

        $request = service('request');
        $postData = $request->getPost();

        $response = array();

        // Read new token and assign in $response['token']
        $response['token'] = csrf_hash();

        helper('auth');
        $userName = user()->username;
        $idUser = user()->id;

        $sucursalesPorUsuario = $this->usuariosPorSucursal->select("*")
                        ->where("idUsuario", $idUser)
                        ->where("status", "on")->findAll();

        $sucursalesPorUsuario = array_column($sucursalesPorUsuario, "idSucursal");
        if (!isset($postData['searchTerm'])) {
            // Fetch record
            $sucursales = new BranchofficesModel();
            $listSucursales = $sucursales->select('id,key,name')->where("deleted_at", null)
                    ->whereIn("id", $sucursalesPorUsuario)
                    ->where("companie", $postData["idEmpresa"])
                    ->orderBy('id')
                    ->orderBy('key')
                    ->orderBy('name')
                    ->findAll();
        } else {
            $searchTerm = $postData['searchTerm'];

            // Fetch record
            $sucursales = new BranchofficesModel();
            $listSucursales = $sucursales->select('id,key,name')
                    ->where("deleted_at", null)
                    ->whereIn("id", $sucursalesPorUsuario)
                    ->where("companie", $postData["idEmpresa"])
                    ->like('name', $searchTerm)
                    ->orLike('id', $searchTerm)
                    ->orLike('key', $searchTerm)
                    ->findAll();
        }

        $data = array();
        $data[] = array(
            "id" => 0,
            "text" => "0 Todas las sucursales",
        );

        foreach ($listSucursales as $sucursal) {
            $data[] = array(
                "id" => $sucursal['id'],
                "text" => $sucursal['key'] . ' ' . $sucursal['name'],
            );
        }

        $response['data'] = $data;

        return $this->response->setJSON($response);
    }

    public function usuariosPorSucursal($sucursal) {

        helper('auth');

        $idUser = user()->id;

        $datosSucursal = $this->branchoffices->select("companie as empresa")->where("id", $sucursal)->first();

        if (isset($datosSucursal["empresa"])) {

            $idEmpresa = $datosSucursal["empresa"];
        } else {

            $idEmpresa = -1;
        }


        $usuarios = $this->usuariosPorSucursal->mdlSucursalesPorUsuario($sucursal, $idEmpresa);

        return \Hermawan\DataTables\DataTable::of($usuarios)->toJson(true);
    }
    
     /**
     * Activar Desactivar Usuario Por Empresa
     */
    public function ActivarDesactivar() {

        $datos = $this->request->getPost();

        if ($datos["id"] > 0) {

            //ACTUALIZA SI  EXISTE

            if ($this->usuariosPorSucursal->update($datos["id"], $datos) === false) {
                $errores = $this->usuariosPorSucursal->errors();
                foreach ($errores as $field => $error) {
                    echo $error . " ";
                }
                return;
            }

            echo "ok";
        } else {

            //INSERTA SI  NO EXISTE
            if ($this->usuariosPorSucursal->insert($datos) === false) {

                $errores = $this->usuariosPorSucursal->errors();

                foreach ($errores as $key => $error) {

                    echo $error . " ";
                }

                return;
            }



            echo "ok";
        }
    }
    
    
     /**
     * Para obtener las estados
     * @return type
     */
    public function getEstadosSAT() {

        $request = service('request');
        $postData = $request->getPost();

        $response = array();

        // Read new token and assign in $response['token']
        $response['token'] = csrf_hash();

        if ($postData["pais"] == "") {

            $pais = "%";
        } else {

            $pais = $postData["pais"];
        }

        if (!isset($postData['searchTerm'])) {
            // Fetch record

            $listEstadosSAT = $this->catalogosSAT->estados40()->searchEstados("%%", $pais);
        } else {
            $searchTerm = $postData['searchTerm'];

            // Fetch record

            $listEstadosSAT = $this->catalogosSAT->estados40()->searchEstados("%$searchTerm%", $pais);
        }

        $data = array();
        foreach ($listEstadosSAT as $estadosSAT => $value) {

            $data[] = array(
                "id" => $value->codigo(),
                "text" => $value->codigo() . ' ' . $value->texto(),
            );
        }

        $response['data'] = $data;

        return $this->response->setJSON($response);
    }
}
