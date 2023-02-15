<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \App\Models\{
    BranchofficesModel
};
use App\Models\LogModel;
use CodeIgniter\API\ResponseTrait;
use App\Models\EmpresasModel;

class BranchofficesController extends BaseController {

    use ResponseTrait;

    protected $log;
    protected $branchoffices;
    protected $empresas;

    public function __construct() {
        $this->branchoffices = new BranchofficesModel();
        $this->log = new LogModel();
        $this->empresas = new EmpresasModel();
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

}
