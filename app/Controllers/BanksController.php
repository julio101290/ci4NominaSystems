<?php

 namespace App\Controllers;

 use App\Controllers\BaseController;
 use \App\Models\{BanksModel};
 use App\Models\LogModel;
 use CodeIgniter\API\ResponseTrait;

 class BanksController extends BaseController {

     use ResponseTrait;

     protected $log;
     protected $banks;

     public function __construct() {
         $this->banks = new BanksModel();
         $this->log = new LogModel();
         helper('menu');
     }

     public function index() {


         if ($this->request->isAJAX()) {




             $datos = $this->banks->select('id,code,name,omision,RFC,keySAT,created_at,updated_at,deleted_at')->where('deleted_at', null);

             return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
         }
         
         $banksSat = $this->catalogosSAT->bancos()->searchByField("texto", "%%", 1000);

         $titulos["banksSat"] = $banksSat;
         $titulos["title"] = lang('banks.title');
         $titulos["subtitle"] = lang('banks.subtitle');


         return view('banks', $titulos);
     }

     /**
      * Read Banks
      */
     public function getBanks() {


         $idBanks = $this->request->getPost("idBanks");
         $datosBanks = $this->banks->find($idBanks);

         echo json_encode($datosBanks);
     }

     /**
      * Save or update Banks
      */
     public function save() {


         helper('auth');
         $userName = user()->username;
         $idUser = user()->id;

         $datos = $this->request->getPost();

         if ($datos["idBanks"] == 0) {


             try {


                 if ($this->banks->save($datos) === false) {

                     $errores = $this->banks->errors();

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


             if ($this->banks->update($datos["idBanks"], $datos) == false) {

                 $errores = $this->banks->errors();
                 foreach ($errores as $field => $error) {

                     echo $error . " ";
                 }

                 return;
             } else {

                 $dateLog["description"] = lang("banks.logUpdated") . json_encode($datos);
                 $dateLog["user"] = $userName;

                 $this->log->save($dateLog);
                 echo "Actualizado Correctamente";

                 return;
             }
         }

         return;
     }

     /**
      * Delete Banks
      * @param type $id
      * @return type
      */
     public function delete($id) {

         $infoBanks = $this->banks->find($id);
         helper('auth');
         $userName = user()->username;

         if (!$found = $this->banks->delete($id)) {
             return $this->failNotFound(lang('banks.msg.msg_get_fail'));
         }


         $this->banks->purgeDeleted();
         $logData["description"] = lang("banks.logDeleted") . json_encode($infoBanks);
         $logData["user"] = $userName;

         $this->log->save($logData);
         return $this->respondDeleted($found, lang('banks.msg_delete'));
     }

 }
        