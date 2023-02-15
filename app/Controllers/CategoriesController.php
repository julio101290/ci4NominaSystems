<?php

 namespace App\Controllers;

 use App\Controllers\BaseController;
 use \App\Models\{CategoriesModel};
 use App\Models\LogModel;
 use CodeIgniter\API\ResponseTrait;

 class CategoriesController extends BaseController {

     use ResponseTrait;

     protected $log;
     protected $categories;

     public function __construct() {
         $this->categories = new CategoriesModel();
         $this->log = new LogModel();
         helper('menu');
     }

     public function index() {


         if ($this->request->isAJAX()) {




             $datos = $this->categories->select('id,name,minimumSalary,maximunSalary,created_at,updated_at,deleted_at')->where('deleted_at', null);

             return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
         }

         $titulos["title"] = lang('categories.title');
         $titulos["subtitle"] = lang('categories.subtitle');


         return view('categories', $titulos);
     }

     /**
      * Read Categories
      */
     public function getCategories() {


         $idCategories = $this->request->getPost("idCategories");
         $datosCategories = $this->categories->find($idCategories);

         echo json_encode($datosCategories);
     }

     /**
      * Save or update Categories
      */
     public function save() {


         helper('auth');
         $userName = user()->username;
         $idUser = user()->id;

         $datos = $this->request->getPost();

         if ($datos["idCategories"] == 0) {


             try {


                 if ($this->categories->save($datos) === false) {

                     $errores = $this->categories->errors();

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


             if ($this->categories->update($datos["idCategories"], $datos) == false) {

                 $errores = $this->categories->errors();
                 foreach ($errores as $field => $error) {

                     echo $error . " ";
                 }

                 return;
             } else {

                 $dateLog["description"] = lang("categories.logUpdated") . json_encode($datos);
                 $dateLog["user"] = $userName;

                 $this->log->save($dateLog);
                 echo "Actualizado Correctamente";

                 return;
             }
         }

         return;
     }

     /**
      * Delete Categories
      * @param type $id
      * @return type
      */
     public function delete($id) {

         $infoCategories = $this->categories->find($id);
         helper('auth');
         $userName = user()->username;

         if (!$found = $this->categories->delete($id)) {
             return $this->failNotFound(lang('categories.msg.msg_get_fail'));
         }



         $logData["description"] = lang("categories.logDeleted") . json_encode($infoCategories);
         $logData["user"] = $userName;

         $this->log->save($logData);
         return $this->respondDeleted($found, lang('categories.msg_delete'));
     }

 }
        