<?php
 namespace App\Controllers;
 use App\Controllers\BaseController;
 use \App\Models\{SalariosminimosModel};
 use App\Models\LogModel;
 use CodeIgniter\API\ResponseTrait;
 use App\Models\EmpresasModel;

 class SalariosminimosController extends BaseController {
     use ResponseTrait;
     protected $log;
     protected $salariosminimos;
     public function __construct() {
         $this->salariosminimos = new SalariosminimosModel();
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
            $datos = $this->salariosminimos->mdlGetSalariosminimos($empresasID);
             
         
             return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
         }
         $titulos["title"] = lang('salariosminimos.title');
         $titulos["subtitle"] = lang('salariosminimos.subtitle');
         return view('salariosminimos', $titulos);
     }
     /**
      * Read Salariosminimos
      */
     public function getSalariosminimos() {
        
        helper('auth');

        $idUser = user()->id;
        $titulos["empresas"] = $this->empresa->mdlEmpresasPorUsuario($idUser);

        if (count($titulos["empresas"]) == "0") {

            $empresasID[0] = "0";
        } else {

            $empresasID = array_column($titulos["empresas"], "id");
        }
        
        
        $idSalariosminimos = $this->request->getPost("idSalariosminimos");
         $datosSalariosminimos = $this->salariosminimos->whereIn('idEmpresa',$empresasID)
         ->where("id",$idSalariosminimos)->first();
         echo json_encode($datosSalariosminimos);
     
     
        }
     /**
      * Save or update Salariosminimos
      */
     public function save() {
         helper('auth');
         $userName = user()->username;
         $idUser = user()->id;
         $datos = $this->request->getPost();
         if ($datos["idSalariosminimos"] == 0) {
             try {
                 if ($this->salariosminimos->save($datos) === false) {
                     $errores = $this->salariosminimos->errors();
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
             if ($this->salariosminimos->update($datos["idSalariosminimos"], $datos) == false) {
                 $errores = $this->salariosminimos->errors();
                 foreach ($errores as $field => $error) {
                     echo $error . " ";
                 }
                 return;
             } else {
                 $dateLog["description"] = lang("salariosminimos.logUpdated") . json_encode($datos);
                 $dateLog["user"] = $userName;
                 $this->log->save($dateLog);
                 echo "Actualizado Correctamente";
                 return;
             }
         }
         return;
     }
     /**
      * Delete Salariosminimos
      * @param type $id
      * @return type
      */
     public function delete($id) {
         $infoSalariosminimos = $this->salariosminimos->find($id);
         helper('auth');
         $userName = user()->username;
         if (!$found = $this->salariosminimos->delete($id)) {
             return $this->failNotFound(lang('salariosminimos.msg.msg_get_fail'));
         }
         $this->salariosminimos->purgeDeleted();
         $logData["description"] = lang("salariosminimos.logDeleted") . json_encode($infoSalariosminimos);
         $logData["user"] = $userName;
         $this->log->save($logData);
         return $this->respondDeleted($found, lang('salariosminimos.msg_delete'));
     }
 }
        