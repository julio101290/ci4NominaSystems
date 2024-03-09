<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \App\Models\{
    TiponominaModel
};
use App\Models\LogModel;
use App\Models\EmpresasModel;
use App\Models\RiesgoslaboralesModel;
use App\Models\BranchofficesModel;
use App\Models\SalariosminimosModel;
use App\Models\Usuarios_tiposnominaModel;
use CodeIgniter\API\ResponseTrait;

class TiponominaController extends BaseController {

    use ResponseTrait;

    protected $log;
    protected $tiponomina;
    protected $empresa;
    protected $riesgosLaborales;
    protected $sucursales;
    protected $salariosMinimos;
    protected $usuariosPorTipoNomina;
    protected $tiposNomina;

    public function __construct() {

        $this->tiponomina = new TiponominaModel();
        $this->log = new LogModel();
        $this->empresa = new EmpresasModel();
        $this->riesgosLaborales = new RiesgoslaboralesModel();
        $this->sucursales = new BranchofficesModel();
        $this->salariosMinimos = new SalariosminimosModel();
        $this->usuariosPorTipoNomina = new Usuarios_tiposnominaModel();
        $this->tiposNomina = new TiponominaModel();

        helper('menu');
    }

    public function index() {

        $idUser = user()->id;
        $titulos["empresas"] = $this->empresa->mdlEmpresasPorUsuario($idUser);

        $titulos[""] = "";

        if (count($titulos["empresas"]) == "0") {

            $empresasID[0] = "0";
        } else {

            $empresasID = array_column($titulos["empresas"], "id");
        }

        //Traemos los riesgos de trabajo
        $riesgosTrabajo = $this->riesgosLaborales->select("*")
                        ->whereIn("idEmpresa", $empresasID)
                        ->asArray()->findAll();

        $titulos["riesgosTrabajo"] = $riesgosTrabajo;

        //Traemos los salarios minimos por zona

        $salariosMinimos = $this->salariosMinimos->select("*")
                        ->whereIn("idEmpresa", $empresasID)
                        ->asArray()->findAll();

        $titulos["salariosMinimos"] = $salariosMinimos;



        if ($this->request->isAJAX()) {




            $datos = $this->tiponomina->select('id
                    ,codigo
                    ,nombre
                    ,direccion
                    ,colonia
                    ,ciudad
                    ,idEmpresa
                    ,idSucursal
                    ,porcISN
                    ,entidadFederativa
                    ,cxcNom
                    ,cxpISN
                    ,cxcInfonavit
                    ,cxcIMSS
                    ,cxcFonacot
                    ,diasPeriodoNomina
                    ,maxDias
                    ,codigoPostal
                    ,riesgoPto
                    ,areaSalMin,ejecutivo
                    ,ctaNom
                    ,NRP
                    ,porcRiesgoTrabajo
                    ,numSucBancaria
                    ,created_at
                    ,updated_at
                    ,deleted_at')
                    ->where('deleted_at', null)
                    ->whereIn('idEmpresa', $empresasID);

            return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
        }

        $titulos["title"] = lang('tiponomina.title');
        $titulos["subtitle"] = lang('tiponomina.subtitle');

        return view('tiponomina', $titulos);
    }

    /**
     * Read Tiponomina
     */
    public function getTiponomina() {


        $idTiponomina = $this->request->getPost("idTiponomina");
        $datosTiponomina = $this->tiponomina->find($idTiponomina);

        $sucursal = $this->sucursales->select("*")->where("id", $datosTiponomina["idSucursal"])->findAll();

        $salario = $this->salariosMinimos->select("*")->where("id", $datosTiponomina["areaSalMin"])->asArray()->findAll();

        if (count($salario) > 0) {

            $datosTiponomina["nombreSalario"] = $salario[0]["descripcion"];
        } else {

            $datosTiponomina["nombreSalario"] = "Sin salario seleccionado";
        }

        $datosEstado = $this->catalogosSAT->estados40()->searchEstados("%", "MEX", $datosTiponomina["entidadFederativa"]);

        if (count($datosEstado) > 0) {

            $datosTiponomina["nombreEstado"] = $datosEstado[0]->texto();
        } else {

            $datosTiponomina["nombreEstado"] = "Sin Estado";
        }


        if (count($sucursal) > 0) {

            $datosTiponomina["nombreSucursal"] = $sucursal[0]["key"] . " " . $sucursal[0]["name"];
        } else {

            $datosTiponomina["nombreSucursal"] = "Sin sucursal seleccionada";
        }


        echo json_encode($datosTiponomina);
    }

    /**
     * Save or update Tiponomina
     */
    public function save() {


        helper('auth');
        $userName = user()->username;
        $idUser = user()->id;

        $datos = $this->request->getPost();

        if ($datos["idTiponomina"] == 0) {


            try {


                if ($this->tiponomina->save($datos) === false) {

                    $errores = $this->tiponomina->errors();

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


            if ($this->tiponomina->update($datos["idTiponomina"], $datos) == false) {

                $errores = $this->tiponomina->errors();
                foreach ($errores as $field => $error) {

                    echo $error . " ";
                }

                return;
            } else {

                $dateLog["description"] = lang("tiponomina.logUpdated") . json_encode($datos);
                $dateLog["user"] = $userName;

                $this->log->save($dateLog);
                echo "Actualizado Correctamente";

                return;
            }
        }

        return;
    }

    /**
     * Delete Tiponomina
     * @param type $id
     * @return type
     */
    public function delete($id) {

        $infoTiponomina = $this->tiponomina->find($id);
        helper('auth');
        $userName = user()->username;

        if (!$found = $this->tiponomina->delete($id)) {
            return $this->failNotFound(lang('tiponomina.msg.msg_get_fail'));
        }


        $this->tiponomina->purgeDeleted();
        $logData["description"] = lang("tiponomina.logDeleted") . json_encode($infoTiponomina);
        $logData["user"] = $userName;

        $this->log->save($logData);
        return $this->respondDeleted($found, lang('tiponomina.msg_delete'));
    }

    public function usuariosPorTipoNomina($tipoNomina) {

        helper('auth');

        $idUser = user()->id;

        $datosTipoNomina = $this->tiponomina->select("id,nombre,idEmpresa")->where("id", $tipoNomina)->first();

        //datosTipoNomina = $this->branchoffices->select("companie as empresa")->where("id", $sucursal)->first();

        if (isset($datosTipoNomina["idEmpresa"])) {

            $idEmpresa = $datosTipoNomina["idEmpresa"];
        } else {

            $idEmpresa = -1;
        }


        //$usuarios = $this->usuariosPorSucursal->mdlSucursalesPorUsuario($sucursal, $idEmpresa);

        $usuarios = $this->usuariosPorTipoNomina->mdlTiposNominaPorUsuario($tipoNomina, $idEmpresa);

        return \Hermawan\DataTables\DataTable::of($usuarios)->toJson(true);
    }
}
