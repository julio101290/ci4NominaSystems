<?php
namespace App\Models;
use CodeIgniter\Model;
class SalariosminimosModel extends Model{
    protected $table      = 'salariosminimos';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id','idEmpresa','descripcion','importe','created_at','updated_at','deleted_at'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $deletedField  = 'deleted_at';
    protected $validationRules    =  [
    ];
    protected $validationMessages = [];
    protected $skipValidation     = false;



    public function mdlGetSalariosminimos($idEmpresas){

        $result = $this->db->table('salariosminimos a, empresas b')
                 ->select('a.id,a.idEmpresa,a.descripcion,a.importe,a.created_at,a.updated_at,a.deleted_at ,b.nombre as nombreEmpresa')
                 ->where('a.idEmpresa', 'b.id', FALSE)
                 ->whereIn('a.idEmpresa',$idEmpresas);
 
         return $result;
     }

}
        