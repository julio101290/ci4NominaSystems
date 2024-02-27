<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \App\Models\{
    CostcenterModel
};
use App\Models\LogModel;
use CodeIgniter\API\ResponseTrait;
use App\Models\BranchofficesModel;
use App\Models\EmpresasModel;

class CostcenterController extends BaseController {

    use ResponseTrait;

    protected $log;
    protected $costcenter;
    protected $branchoffice;
    protected $empresa;

    public function __construct() {
        $this->costcenter = new CostcenterModel();
        $this->log = new LogModel();
        $this->branchoffice = new BranchofficesModel();
        $this->empresa = new EmpresasModel();
        helper('menu');
    }

    public function index() {

        helper('auth');

        $idUser = user()->id;
        $titulos["empresas"] = $this->empresa->mdlEmpresasPorUsuario($idUser);

        if (count($titulos["empresas"]) == "0") {

            $empresasID[0] = "0";
        } else {

            $empresasID = array_column($titulos["empresas"], "id");
        }



        if ($this->request->isAJAX()) {




            $datos = $this->costcenter->select('id
                                                ,code
                                                ,name,type
                                                ,branchoffice
                                                ,created_at
                                                ,updated_at
                                                ,deleted_at')
                                                ->where('deleted_at', null)
                                                ->whereIn('idEmpresa', $empresasID);

            return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
        }

        $branchoffice = $this->branchoffice->select("*")->asObject()->findAll();

        $titulos["branchoffices"] = $branchoffice;
        $titulos["title"] = lang('costcenter.title');
        $titulos["subtitle"] = lang('costcenter.subtitle');

        return view('costcenter', $titulos);
    }

    /**
     * Read Costcenter
     */
    public function getCostcenter() {


        $idCostcenter = $this->request->getPost("idCostcenter");
        $datosCostcenter = $this->costcenter->find($idCostcenter);

        echo json_encode($datosCostcenter);
    }

    /**
     * Save or update Costcenter
     */
    public function save() {


        helper('auth');
        $userName = user()->username;
        $idUser = user()->id;

        $datos = $this->request->getPost();

        if ($datos["idCostcenter"] == 0) {


            try {


                if ($this->costcenter->save($datos) === false) {

                    $errores = $this->costcenter->errors();

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


            if ($this->costcenter->update($datos["idCostcenter"], $datos) == false) {

                $errores = $this->costcenter->errors();
                foreach ($errores as $field => $error) {

                    echo $error . " ";
                }

                return;
            } else {

                $dateLog["description"] = lang("costcenter.logUpdated") . json_encode($datos);
                $dateLog["user"] = $userName;

                $this->log->save($dateLog);
                echo "Actualizado Correctamente";

                return;
            }
        }

        return;
    }

    /**
     * Delete Costcenter
     * @param type $id
     * @return type
     */
    public function delete($id) {

        $infoCostcenter = $this->costcenter->find($id);
        helper('auth');
        $userName = user()->username;

        if (!$found = $this->costcenter->delete($id)) {
            return $this->failNotFound(lang('costcenter.msg.msg_get_fail'));
        }


        $this->costcenter->purgeDeleted();
        $logData["description"] = lang("costcenter.logDeleted") . json_encode($infoCostcenter);
        $logData["user"] = $userName;

        $this->log->save($logData);
        return $this->respondDeleted($found, lang('costcenter.msg_delete'));
    }
}
