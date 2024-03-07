<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \App\Models\{
    RiesgoslaboralesModel
};
use App\Models\LogModel;
use App\Models\EmpresasModel;
use CodeIgniter\API\ResponseTrait;

class RiesgoslaboralesController extends BaseController {

    use ResponseTrait;

    protected $log;
    protected $riesgoslaborales;
    protected $empresa;

    

    public function __construct() {
        $this->riesgoslaborales = new RiesgoslaboralesModel();
        $this->log = new LogModel();
        $this->empresa= new EmpresasModel();
        helper('menu');
    }

    public function index() {

        $idUser = user()->id;
        $titulos["empresas"] = $this->empresa->mdlEmpresasPorUsuario($idUser);

        if (count($titulos["empresas"]) == "0") {

            $empresasID[0] = "0";
        } else {

            $empresasID = array_column($titulos["empresas"], "id");
        }


        if ($this->request->isAJAX()) {




            $datos = $this->riesgoslaborales->select('id
                     ,idEmpresa
                     ,clase
                     ,porcentaje
                     ,created_at
                     ,updated_at
                     ,deleted_at')
                    ->where('deleted_at', null)
                    ->whereIn('idEmpresa', $empresasID);

            return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
        }

        $titulos["title"] = lang('riesgoslaborales.title');
        $titulos["subtitle"] = lang('riesgoslaborales.subtitle');

        return view('riesgoslaborales', $titulos);
    }

    /**
     * Read Riesgoslaborales
     */
    public function getRiesgoslaborales() {


        $idRiesgoslaborales = $this->request->getPost("idRiesgoslaborales");
        $datosRiesgoslaborales = $this->riesgoslaborales->find($idRiesgoslaborales);

        echo json_encode($datosRiesgoslaborales);
    }

    /**
     * Save or update Riesgoslaborales
     */
    public function save() {


        helper('auth');
        $userName = user()->username;
        $idUser = user()->id;

        $datos = $this->request->getPost();

        if ($datos["idRiesgoslaborales"] == 0) {


            try {


                if ($this->riesgoslaborales->save($datos) === false) {

                    $errores = $this->riesgoslaborales->errors();

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


            if ($this->riesgoslaborales->update($datos["idRiesgoslaborales"], $datos) == false) {

                $errores = $this->riesgoslaborales->errors();
                foreach ($errores as $field => $error) {

                    echo $error . " ";
                }

                return;
            } else {

                $dateLog["description"] = lang("riesgoslaborales.logUpdated") . json_encode($datos);
                $dateLog["user"] = $userName;

                $this->log->save($dateLog);
                echo "Actualizado Correctamente";

                return;
            }
        }

        return;
    }

    /**
     * Delete Riesgoslaborales
     * @param type $id
     * @return type
     */
    public function delete($id) {

        $infoRiesgoslaborales = $this->riesgoslaborales->find($id);
        helper('auth');
        $userName = user()->username;

        if (!$found = $this->riesgoslaborales->delete($id)) {
            return $this->failNotFound(lang('riesgoslaborales.msg.msg_get_fail'));
        }


        $this->riesgoslaborales->purgeDeleted();
        $logData["description"] = lang("riesgoslaborales.logDeleted") . json_encode($infoRiesgoslaborales);
        $logData["user"] = $userName;

        $this->log->save($logData);
        return $this->respondDeleted($found, lang('riesgoslaborales.msg_delete'));
    }
}
