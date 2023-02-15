<?php

 namespace App\Controllers;

 use App\Controllers\BaseController;
 use \App\Models\{HolidaysModel};
 use App\Models\LogModel;
 use CodeIgniter\API\ResponseTrait;

 class HolidaysController extends BaseController {

     use ResponseTrait;

     protected $log;
     protected $holidays;

     public function __construct() {
         $this->holidays = new HolidaysModel();
         $this->log = new LogModel();
         helper('menu');
     }

     public function index() {


         if ($this->request->isAJAX()) {




             $datos = $this->holidays->select('id,date,created_at,updated_at,deleted_at')->where('deleted_at', null);

             return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
         }

         $titulos["title"] = lang('holidays.title');
         $titulos["subtitle"] = lang('holidays.subtitle');


         return view('holidays', $titulos);
     }

     /**
      * Read Holidays
      */
     public function getHolidays() {


         $idHolidays = $this->request->getPost("idHolidays");
         $datosHolidays = $this->holidays->find($idHolidays);

         echo json_encode($datosHolidays);
     }

     /**
      * Save or update Holidays
      */
     public function save() {


         helper('auth');
         $userName = user()->username;
         $idUser = user()->id;

         $datos = $this->request->getPost();

         if ($datos["idHolidays"] == 0) {


             try {


                 if ($this->holidays->save($datos) === false) {

                     $errores = $this->holidays->errors();

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


             if ($this->holidays->update($datos["idHolidays"], $datos) == false) {

                 $errores = $this->holidays->errors();
                 foreach ($errores as $field => $error) {

                     echo $error . " ";
                 }

                 return;
             } else {

                 $dateLog["description"] = lang("holidays.logUpdated") . json_encode($datos);
                 $dateLog["user"] = $userName;

                 $this->log->save($dateLog);
                 echo "Actualizado Correctamente";

                 return;
             }
         }

         return;
     }

     /**
      * Delete Holidays
      * @param type $id
      * @return type
      */
     public function delete($id) {

         $infoHolidays = $this->holidays->find($id);
         helper('auth');
         $userName = user()->username;

         if (!$found = $this->holidays->delete($id)) {
             return $this->failNotFound(lang('holidays.msg.msg_get_fail'));
         }



         $logData["description"] = lang("holidays.logDeleted") . json_encode($infoHolidays);
         $logData["user"] = $userName;

         $this->log->save($logData);
         return $this->respondDeleted($found, lang('holidays.msg_delete'));
     }

 }
        