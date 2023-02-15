<?php

 namespace App\Controllers;

 use App\Controllers\BaseController;
 use \App\Models\{DepartmentsModel};
 use App\Models\LogModel;
 use CodeIgniter\API\ResponseTrait;

 class DepartmentsController extends BaseController {

     use ResponseTrait;

     protected $log;
     protected $departments;

     public function __construct() {
         $this->departments = new DepartmentsModel();
         $this->log = new LogModel();
         helper('menu');
     }

     public function index() {


         if ($this->request->isAJAX()) {




             $datos = $this->departments->select('id,description,created_at,updated_at,deleted_at')->where('deleted_at', null);

             return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
         }

         $titulos["title"] = lang('departments.title');
         $titulos["subtitle"] = lang('departments.subtitle');


         return view('departments', $titulos);
     }

     /**
      * Read Departments
      */
     public function getDepartments() {


         $idDepartments = $this->request->getPost("idDepartments");
         $datosDepartments = $this->departments->find($idDepartments);

         echo json_encode($datosDepartments);
     }

     /**
      * Save or update Departments
      */
     public function save() {


         helper('auth');
         $userName = user()->username;
         $idUser = user()->id;

         $datos = $this->request->getPost();

         if ($datos["idDepartments"] == 0) {


             try {


                 if ($this->departments->save($datos) === false) {

                     $errores = $this->departments->errors();

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


             if ($this->departments->update($datos["idDepartments"], $datos) == false) {

                 $errores = $this->departments->errors();
                 foreach ($errores as $field => $error) {

                     echo $error . " ";
                 }

                 return;
             } else {

                 $dateLog["description"] = lang("departments.logUpdated") . json_encode($datos);
                 $dateLog["user"] = $userName;

                 $this->log->save($dateLog);
                 echo "Actualizado Correctamente";

                 return;
             }
         }

         return;
     }

     /**
      * Delete Departments
      * @param type $id
      * @return type
      */
     public function delete($id) {

         $infoDepartments = $this->departments->find($id);
         helper('auth');
         $userName = user()->username;

         if (!$found = $this->departments->delete($id)) {
             return $this->failNotFound(lang('departments.msg.msg_get_fail'));
         }



         $logData["description"] = lang("departments.logDeleted") . json_encode($infoDepartments);
         $logData["user"] = $userName;

         $this->log->save($logData);
         return $this->respondDeleted($found, lang('departments.msg_delete'));
     }

 }
        