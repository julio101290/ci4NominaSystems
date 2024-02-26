<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \App\Models\{
    EmployeesModel
};
use App\Models\LogModel;
use App\Models\TurnsModel;
use App\Models\EmpresasModel;

use CodeIgniter\API\ResponseTrait;

class EmployeesController extends BaseController {

    use ResponseTrait;

    protected $log;
    protected $employees;
    protected $turns;
    protected $banks;
    protected $empresa;

    public function __construct() {
        $this->employees = new EmployeesModel();
        $this->log = new LogModel();
        $this->turns = new TurnsModel();
        $this->banks = new \App\Models\BanksModel();
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

            $datos = $this->employees->select('id
                                                ,codigo
                                                ,firstname
                                                ,lastname
                                                ,motherLastName
                                                ,nameAbrev
                                                ,sex
                                                ,birthdate
                                                ,placebirth
                                                ,RFC
                                                ,CURP
                                                ,scholarship
                                                ,initials
                                                ,email
                                                ,nip
                                                ,turn
                                                ,street
                                                ,number
                                                ,cologne
                                                ,state
                                                ,postalCode
                                                ,phone
                                                ,civilStatus
                                                ,sons
                                                ,spouse
                                                ,father
                                                ,mother
                                                ,socialSecurity
                                                ,familyMedicalUnit
                                                ,infonavit
                                                ,factor
                                                ,date
                                                ,numberInfonavit
                                                ,nameBeneficiary
                                                ,relationBeneficiary
                                                ,porcenBeneficiary
                                                ,nameBeneficiary2
                                                ,relationBeneficiary2
                                                ,porcenBeneficiary2
                                                ,bank
                                                ,bankAccount
                                                ,creditCard
                                                ,statusCard
                                                ,CLABE
                                                ,created_at
                                                ,updated_at
                                                ,deleted_at')
                                                ->where('deleted_at', null)
                                                ->whereIn('idEmpresa', $empresasID);;

            return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
        }

        $turns = $this->turns->where("deleted_at", null)->asObject()->findAll();
        $banks = $this->banks->where("deleted_at", null)->asObject()->findAll();

        $titulos["banks"] = $banks;
        $titulos["turns"] = $turns;
        $titulos["title"] = lang('employees.title');
        $titulos["subtitle"] = lang('employees.subtitle');

        return view('employees', $titulos);
    }

    /**
     * Read Employees
     */
    public function getEmployees() {


        $idEmployees = $this->request->getPost("idEmployees");
        $datosEmployees = $this->employees->find($idEmployees);

        echo json_encode($datosEmployees);
    }

    /**
     * Save or update Employees
     */
    public function save() {


        helper('auth');
        $userName = user()->username;
        $idUser = user()->id;

        $datos = $this->request->getPost();

        if ($datos["idEmployees"] == 0) {


            try {


                if ($this->employees->save($datos) === false) {

                    $errores = $this->employees->errors();

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


            if ($this->employees->update($datos["idEmployees"], $datos) == false) {

                $errores = $this->employees->errors();
                foreach ($errores as $field => $error) {

                    echo $error . " ";
                }

                return;
            } else {

                $dateLog["description"] = lang("employees.logUpdated") . json_encode($datos);
                $dateLog["user"] = $userName;

                $this->log->save($dateLog);
                echo "Actualizado Correctamente";

                return;
            }
        }

        return;
    }

    /**
     * Delete Employees
     * @param type $id
     * @return type
     */
    public function delete($id) {

        $infoEmployees = $this->employees->find($id);
        helper('auth');
        $userName = user()->username;

        if (!$found = $this->employees->delete($id)) {
            return $this->failNotFound(lang('employees.msg.msg_get_fail'));
        }


        $this->employees->purgeDeleted();
        $logData["description"] = lang("employees.logDeleted") . json_encode($infoEmployees);
        $logData["user"] = $userName;

        $this->log->save($logData);
        return $this->respondDeleted($found, lang('employees.msg_delete'));
    }
}
