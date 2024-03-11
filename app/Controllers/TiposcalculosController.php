<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \App\Models\{
    TiposcalculosModel
};
use App\Models\LogModel;
use CodeIgniter\API\ResponseTrait;
use App\Models\EmpresasModel;

class TiposcalculosController extends BaseController {

    use ResponseTrait;

    protected $log;
    protected $tiposcalculos;

    public function __construct() {
        $this->tiposcalculos = new TiposcalculosModel();
        $this->log = new LogModel();
        $this->empresa = new EmpresasModel();
        helper('menu');
        helper('utilerias');
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
            $datos = $this->tiposcalculos->mdlGetTiposcalculos($empresasID);

            return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
        }
        $titulos["title"] = lang('tiposcalculos.title');
        $titulos["subtitle"] = lang('tiposcalculos.subtitle');
        return view('tiposcalculos', $titulos);
    }

    /**
     * Read Tiposcalculos
     */
    public function getTiposcalculos() {

        helper('auth');

        $idUser = user()->id;
        $titulos["empresas"] = $this->empresa->mdlEmpresasPorUsuario($idUser);

        if (count($titulos["empresas"]) == "0") {

            $empresasID[0] = "0";
        } else {

            $empresasID = array_column($titulos["empresas"], "id");
        }

        $datosPost = $this->request->getPost();

        $tipoCalculo = $datosPost["idTiposcalculos"];

        $datosTiposcalculos = $this->tiposcalculos->select("*")
                        ->whereIn('idEmpresa', $empresasID)
                        ->where("id", $tipoCalculo)->first();

        echo json_encode($datosTiposcalculos);
    }

    /**
     * Save or update Tiposcalculos
     */
    public function save() {
        helper('auth');
        $userName = user()->username;
        $idUser = user()->id;
        $datos = $this->request->getPost();
        if ($datos["idTiposcalculos"] == 0) {
            try {
                if ($this->tiposcalculos->save($datos) === false) {
                    $errores = $this->tiposcalculos->errors();
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
            if ($this->tiposcalculos->update($datos["idTiposcalculos"], $datos) == false) {
                $errores = $this->tiposcalculos->errors();
                foreach ($errores as $field => $error) {
                    echo $error . " ";
                }
                return;
            } else {
                $dateLog["description"] = lang("tiposcalculos.logUpdated") . json_encode($datos);
                $dateLog["user"] = $userName;
                $this->log->save($dateLog);
                echo "Actualizado Correctamente";
                return;
            }
        }
        return;
    }

    /**
     * Delete Tiposcalculos
     * @param type $id
     * @return type
     */
    public function delete($id) {
        $infoTiposcalculos = $this->tiposcalculos->find($id);
        helper('auth');
        $userName = user()->username;
        if (!$found = $this->tiposcalculos->delete($id)) {
            return $this->failNotFound(lang('tiposcalculos.msg.msg_get_fail'));
        }
        $this->tiposcalculos->purgeDeleted();
        $logData["description"] = lang("tiposcalculos.logDeleted") . json_encode($infoTiposcalculos);
        $logData["user"] = $userName;
        $this->log->save($logData);
        return $this->respondDeleted($found, lang('tiposcalculos.msg_delete'));
    }
}
