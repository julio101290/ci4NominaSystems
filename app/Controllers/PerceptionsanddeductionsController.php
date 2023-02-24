<?php

 namespace App\Controllers;

 use App\Controllers\BaseController;
 use \App\Models\{PerceptionsanddeductionsModel};
 use App\Models\LogModel;
 use CodeIgniter\API\ResponseTrait;

 class PerceptionsanddeductionsController extends BaseController {

     use ResponseTrait;

     protected $log;
     protected $perceptionsanddeductions;


     public function __construct() {
         $this->perceptionsanddeductions = new PerceptionsanddeductionsModel();
         $this->log = new LogModel();
         helper('menu');
     }

     public function index() {


         if ($this->request->isAJAX()) {




             $datos = $this->perceptionsanddeductions->select('id,code,name,nameAbrev,type,Area,SATConcept,calc,orden,payType,ordinary,otherPay,created_at,updated_at,deleted_at')->where('deleted_at', null);

             return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
         }
         
         
         $otrosPagosSAT = $this->catalogosSAT->otrosTipoPago()->searchByField("texto", "%%", 1000);
         $conceptosSATDeducciones  = $this->catalogosSAT->deducciones()->searchByField("texto", "%%", 1000);
         $conceptosSATPercepciones  = $this->catalogosSAT->percepciones()->searchByField("texto", "%%", 1000);
   
         $titulos["deducciones"] = $conceptosSATDeducciones;
         $titulos["percepciones"] = $conceptosSATPercepciones;
         $titulos["otrosPagoSAT"] = $otrosPagosSAT;
         $titulos["title"] = lang('perceptionsanddeductions.title');
         $titulos["subtitle"] = lang('perceptionsanddeductions.subtitle');


         return view('perceptionsanddeductions', $titulos);
     }

     /**
      * Read Perceptionsanddeductions
      */
     public function getPerceptionsanddeductions() {


         $idPerceptionsanddeductions = $this->request->getPost("idPerceptionsanddeductions");
         $datosPerceptionsanddeductions = $this->perceptionsanddeductions->find($idPerceptionsanddeductions);

         echo json_encode($datosPerceptionsanddeductions);
     }

     /**
      * Save or update Perceptionsanddeductions
      */
     public function save() {


         helper('auth');
         $userName = user()->username;
         $idUser = user()->id;

         $datos = $this->request->getPost();

         if ($datos["idPerceptionsanddeductions"] == 0) {


             try {


                 if ($this->perceptionsanddeductions->save($datos) === false) {

                     $errores = $this->perceptionsanddeductions->errors();

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


             if ($this->perceptionsanddeductions->update($datos["idPerceptionsanddeductions"], $datos) == false) {

                 $errores = $this->perceptionsanddeductions->errors();
                 foreach ($errores as $field => $error) {

                     echo $error . " ";
                 }

                 return;
             } else {

                 $dateLog["description"] = lang("perceptionsanddeductions.logUpdated") . json_encode($datos);
                 $dateLog["user"] = $userName;

                 $this->log->save($dateLog);
                 echo "Actualizado Correctamente";

                 return;
             }
         }

         return;
     }

     /**
      * Delete Perceptionsanddeductions
      * @param type $id
      * @return type
      */
     public function delete($id) {

         $infoPerceptionsanddeductions = $this->perceptionsanddeductions->find($id);
         helper('auth');
         $userName = user()->username;

         if (!$found = $this->perceptionsanddeductions->delete($id)) {
             return $this->failNotFound(lang('perceptionsanddeductions.msg.msg_get_fail'));
         }


         $this->perceptionsanddeductions->purgeDeleted();
         $logData["description"] = lang("perceptionsanddeductions.logDeleted") . json_encode($infoPerceptionsanddeductions);
         $logData["user"] = $userName;

         $this->log->save($logData);
         return $this->respondDeleted($found, lang('perceptionsanddeductions.msg_delete'));
     }

 }
        