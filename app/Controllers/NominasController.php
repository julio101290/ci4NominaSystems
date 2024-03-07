<?php
 namespace App\Controllers;
 use App\Controllers\BaseController;
 use \App\Models\{NominasModel};
 use App\Models\LogModel;
 use CodeIgniter\API\ResponseTrait;
 use App\Models\EmpresasModel;

 class NominasController extends BaseController {
     use ResponseTrait;
     protected $log;
     protected $nominas;
     public function __construct() {
         $this->nominas = new NominasModel();
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
            $datos = $this->nominas->mdlGetNominas($empresasID);
             
         
             return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
         }
         $titulos["title"] = lang('nominas.title');
         $titulos["subtitle"] = lang('nominas.subtitle');
         return view('nominas', $titulos);
     }
     /**
      * Read Nominas
      */
     public function getNominas() {
        
        helper('auth');

        $idUser = user()->id;
        $titulos["empresas"] = $this->empresa->mdlEmpresasPorUsuario($idUser);

        if (count($titulos["empresas"]) == "0") {

            $empresasID[0] = "0";
        } else {

            $empresasID = array_column($titulos["empresas"], "id");
        }
        
        
        $idNominas = $this->request->getPost("idNominas");
         $datosNominas = $this->nominas->whereIn('idEmpresa',$empresasID)
         ->where("id",$idNominas)->first();
         echo json_encode($datosNominas);
     
     
        }
     /**
      * Save or update Nominas
      */
     public function save() {
         helper('auth');
         $userName = user()->username;
         $idUser = user()->id;
         $datos = $this->request->getPost();
         if ($datos["idNominas"] == 0) {
             try {
                 if ($this->nominas->save($datos) === false) {
                     $errores = $this->nominas->errors();
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
             if ($this->nominas->update($datos["idNominas"], $datos) == false) {
                 $errores = $this->nominas->errors();
                 foreach ($errores as $field => $error) {
                     echo $error . " ";
                 }
                 return;
             } else {
                 $dateLog["description"] = lang("nominas.logUpdated") . json_encode($datos);
                 $dateLog["user"] = $userName;
                 $this->log->save($dateLog);
                 echo "Actualizado Correctamente";
                 return;
             }
         }
         return;
     }
     /**
      * Delete Nominas
      * @param type $id
      * @return type
      */
     public function delete($id) {
         $infoNominas = $this->nominas->find($id);
         helper('auth');
         $userName = user()->username;
         if (!$found = $this->nominas->delete($id)) {
             return $this->failNotFound(lang('nominas.msg.msg_get_fail'));
         }
         $this->nominas->purgeDeleted();
         $logData["description"] = lang("nominas.logDeleted") . json_encode($infoNominas);
         $logData["user"] = $userName;
         $this->log->save($logData);
         return $this->respondDeleted($found, lang('nominas.msg_delete'));
     }
 }
        