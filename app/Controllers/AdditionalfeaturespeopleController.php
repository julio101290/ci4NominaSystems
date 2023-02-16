<?php

 namespace App\Controllers;

 use App\Controllers\BaseController;
 use \App\Models\{AdditionalfeaturespeopleModel};
 use App\Models\LogModel;
 use CodeIgniter\API\ResponseTrait;

 class AdditionalfeaturespeopleController extends BaseController {

     use ResponseTrait;

     protected $log;
     protected $additionalfeaturespeople;

     public function __construct() {
         $this->additionalfeaturespeople = new AdditionalfeaturespeopleModel();
         $this->log = new LogModel();
         helper('menu');
     }

     public function index() {


         if ($this->request->isAJAX()) {




             $datos = $this->additionalfeaturespeople->select('id,name,format,type,cid,code,created_at,updated_at,deleted_at')->where('deleted_at', null);

             return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
         }

         $titulos["title"] = lang('additionalfeaturespeople.title');
         $titulos["subtitle"] = lang('additionalfeaturespeople.subtitle');


         return view('additionalfeaturespeople', $titulos);
     }

     /**
      * Read Additionalfeaturespeople
      */
     public function getAdditionalfeaturespeople() {


         $idAdditionalfeaturespeople = $this->request->getPost("idAdditionalfeaturespeople");
         $datosAdditionalfeaturespeople = $this->additionalfeaturespeople->find($idAdditionalfeaturespeople);

         echo json_encode($datosAdditionalfeaturespeople);
     }

     /**
      * Save or update Additionalfeaturespeople
      */
     public function save() {


         helper('auth');
         $userName = user()->username;
         $idUser = user()->id;

         $datos = $this->request->getPost();

         if ($datos["idAdditionalfeaturespeople"] == 0) {


             try {


                 if ($this->additionalfeaturespeople->save($datos) === false) {

                     $errores = $this->additionalfeaturespeople->errors();

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


             if ($this->additionalfeaturespeople->update($datos["idAdditionalfeaturespeople"], $datos) == false) {

                 $errores = $this->additionalfeaturespeople->errors();
                 foreach ($errores as $field => $error) {

                     echo $error . " ";
                 }

                 return;
             } else {

                 $dateLog["description"] = lang("additionalfeaturespeople.logUpdated") . json_encode($datos);
                 $dateLog["user"] = $userName;

                 $this->log->save($dateLog);
                 echo "Actualizado Correctamente";

                 return;
             }
         }

         return;
     }

     /**
      * Delete Additionalfeaturespeople
      * @param type $id
      * @return type
      */
     public function delete($id) {

         $infoAdditionalfeaturespeople = $this->additionalfeaturespeople->find($id);
         helper('auth');
         $userName = user()->username;

         if (!$found = $this->additionalfeaturespeople->delete($id)) {
             return $this->failNotFound(lang('additionalfeaturespeople.msg.msg_get_fail'));
         }


         $this->additionalfeaturespeople->purgeDeleted();
         $logData["description"] = lang("additionalfeaturespeople.logDeleted") . json_encode($infoAdditionalfeaturespeople);
         $logData["user"] = $userName;

         $this->log->save($logData);
         return $this->respondDeleted($found, lang('additionalfeaturespeople.msg_delete'));
     }

 }
        