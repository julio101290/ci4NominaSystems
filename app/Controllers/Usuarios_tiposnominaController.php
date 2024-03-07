<?php
 namespace App\Controllers;
 use App\Controllers\BaseController;
 use \App\Models\{Usuarios_tiposnominaModel};
 use App\Models\LogModel;
 use CodeIgniter\API\ResponseTrait;
 use App\Models\EmpresasModel;

 class Usuarios_tiposnominaController extends BaseController {
     use ResponseTrait;
     protected $log;
     protected $usuarios_tiposnomina;
     public function __construct() {
         $this->usuarios_tiposnomina = new Usuarios_tiposnominaModel();
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
            $datos = $this->usuarios_tiposnomina->mdlGetUsuarios_tiposnomina($empresasID);
             
         
             return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
         }
         $titulos["title"] = lang('usuarios_tiposnomina.title');
         $titulos["subtitle"] = lang('usuarios_tiposnomina.subtitle');
         return view('usuarios_tiposnomina', $titulos);
     }
     /**
      * Read Usuarios_tiposnomina
      */
     public function getUsuarios_tiposnomina() {
        
        helper('auth');

        $idUser = user()->id;
        $titulos["empresas"] = $this->empresa->mdlEmpresasPorUsuario($idUser);

        if (count($titulos["empresas"]) == "0") {

            $empresasID[0] = "0";
        } else {

            $empresasID = array_column($titulos["empresas"], "id");
        }
        
        
        $idUsuarios_tiposnomina = $this->request->getPost("idUsuarios_tiposnomina");
         $datosUsuarios_tiposnomina = $this->usuarios_tiposnomina->whereIn('idEmpresa',$empresasID)
         ->where("id",$idUsuarios_tiposnomina)->first();
         echo json_encode($datosUsuarios_tiposnomina);
     
     
        }
     /**
      * Save or update Usuarios_tiposnomina
      */
     public function save() {
         helper('auth');
         $userName = user()->username;
         $idUser = user()->id;
         $datos = $this->request->getPost();
         if ($datos["idUsuarios_tiposnomina"] == 0) {
             try {
                 if ($this->usuarios_tiposnomina->save($datos) === false) {
                     $errores = $this->usuarios_tiposnomina->errors();
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
             if ($this->usuarios_tiposnomina->update($datos["idUsuarios_tiposnomina"], $datos) == false) {
                 $errores = $this->usuarios_tiposnomina->errors();
                 foreach ($errores as $field => $error) {
                     echo $error . " ";
                 }
                 return;
             } else {
                 $dateLog["description"] = lang("usuarios_tiposnomina.logUpdated") . json_encode($datos);
                 $dateLog["user"] = $userName;
                 $this->log->save($dateLog);
                 echo "Actualizado Correctamente";
                 return;
             }
         }
         return;
     }
     /**
      * Delete Usuarios_tiposnomina
      * @param type $id
      * @return type
      */
     public function delete($id) {
         $infoUsuarios_tiposnomina = $this->usuarios_tiposnomina->find($id);
         helper('auth');
         $userName = user()->username;
         if (!$found = $this->usuarios_tiposnomina->delete($id)) {
             return $this->failNotFound(lang('usuarios_tiposnomina.msg.msg_get_fail'));
         }
         $this->usuarios_tiposnomina->purgeDeleted();
         $logData["description"] = lang("usuarios_tiposnomina.logDeleted") . json_encode($infoUsuarios_tiposnomina);
         $logData["user"] = $userName;
         $this->log->save($logData);
         return $this->respondDeleted($found, lang('usuarios_tiposnomina.msg_delete'));
     }
     
        /**
     * Activar Desactivar Usuario Por Empresa
     */
    public function ActivarDesactivar() {

        $datos = $this->request->getPost();

        if ($datos["id"] > 0) {

            //ACTUALIZA SI  EXISTE

            if ($this->usuarios_tiposnomina->update($datos["id"], $datos) === false) {
                $errores = $this->usuarios_tiposnomina->errors();
                foreach ($errores as $field => $error) {
                    echo $error . " ";
                }
                return;
            }

            echo "ok";
        } else {

            //INSERTA SI  NO EXISTE
            if ($this->usuarios_tiposnomina->insert($datos) === false) {

                $errores = $this->usuarios_tiposnomina->errors();

                foreach ($errores as $key => $error) {

                    echo $error . " ";
                }

                return;
            }

            echo "ok";
        }
    }
 }
        