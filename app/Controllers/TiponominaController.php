<?php

 namespace App\Controllers;

 use App\Controllers\BaseController;
 use \App\Models\{TiponominaModel};
 use App\Models\LogModel;
 use CodeIgniter\API\ResponseTrait;

 class TiponominaController extends BaseController {

     use ResponseTrait;

     protected $log;
     protected $tiponomina;

     public function __construct() {
         $this->tiponomina = new TiponominaModel();
         $this->log = new LogModel();
         helper('menu');
     }

     public function index() {


         if ($this->request->isAJAX()) {




             $datos = $this->tiponomina->select('id,codigo,nombre,direccion,colonia,ciudad,idEmpresa,idSucursal,porcISN,entidadFederativa,cxcNom,cxpISN,cxcInfonavit,cxcIMSS,cxcFonacot,diasPeriodoNomina,maxDias,codigoPostal,riesgoPto,areaSalMin,ejecutivo,ctaNom,NRP,porcRiesgoTrabajo,numSucBancaria,created_at,updated_at,deleted_at')->where('deleted_at', null);

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

 }
        