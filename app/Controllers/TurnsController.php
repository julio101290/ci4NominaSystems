<?php

 namespace App\Controllers;

 use App\Controllers\BaseController;
 use \App\Models\{TurnsModel};
 use App\Models\LogModel;
 use CodeIgniter\API\ResponseTrait;

 class TurnsController extends BaseController {

     use ResponseTrait;

     protected $log;
     protected $turns;

     public function __construct() {
         $this->turns = new TurnsModel();
         $this->log = new LogModel();
         helper('menu');
     }

     public function index() {


         if ($this->request->isAJAX()) {




             $datos = $this->turns->select('id,code,name,created_at,updated_at,deleted_at')->where('deleted_at', null);

             return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
         }

         $titulos["title"] = lang('turns.title');
         $titulos["subtitle"] = lang('turns.subtitle');


         return view('turns', $titulos);
     }

     /**
      * Read Turns
      */
     public function getTurns() {


         $idTurns = $this->request->getPost("idTurns");
         $datosTurns = $this->turns->find($idTurns);

         echo json_encode($datosTurns);
     }

     /**
      * Save or update Turns
      */
     public function save() {


         helper('auth');
         $userName = user()->username;
         $idUser = user()->id;

         $datos = $this->request->getPost();

         if ($datos["idTurns"] == 0) {


             try {


                 if ($this->turns->save($datos) === false) {

                     $errores = $this->turns->errors();

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


             if ($this->turns->update($datos["idTurns"], $datos) == false) {

                 $errores = $this->turns->errors();
                 foreach ($errores as $field => $error) {

                     echo $error . " ";
                 }

                 return;
             } else {

                 $dateLog["description"] = lang("turns.logUpdated") . json_encode($datos);
                 $dateLog["user"] = $userName;

                 $this->log->save($dateLog);
                 echo "Actualizado Correctamente";

                 return;
             }
         }

         return;
     }

     /**
      * Delete Turns
      * @param type $id
      * @return type
      */
     public function delete($id) {

         $infoTurns = $this->turns->find($id);
         helper('auth');
         $userName = user()->username;

         if (!$found = $this->turns->delete($id)) {
             return $this->failNotFound(lang('turns.msg.msg_get_fail'));
         }


         $this->turns->purgeDeleted();
         $logData["description"] = lang("turns.logDeleted") . json_encode($infoTurns);
         $logData["user"] = $userName;

         $this->log->save($logData);
         return $this->respondDeleted($found, lang('turns.msg_delete'));
     }

 }
        