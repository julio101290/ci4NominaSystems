<?php

namespace App\Models;

use CodeIgniter\Model;

class TiposcalculosModel extends Model {

    protected $table = 'tiposcalculos';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id'
        , 'idEmpresa'
        , 'nombre'
        , 'claveTimbrado'
        , 'claveCalculo'
        , 'claveImpresion'
        , 'claveLiquidacion'
        , 'satTipoNomina'
        , 'tipoCalculo'
        , 'created_at'
        , 'updated_at'
        , 'deleted_at'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $deletedField = 'deleted_at';
    protected $validationRules = [
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function mdlGetTiposcalculos($idEmpresas) {

        $result = $this->db->table('tiposcalculos a, empresas b')
                ->select('a.id
                          ,a.idEmpresa,a.nombre
                          ,a.claveTimbrado
                          ,a.claveCalculo
                          ,a.claveImpresion
                          ,a.claveLiquidacion
                          ,a.satTipoNomina
                          ,a.created_at
                          ,a.tipoCalculo
                         ,a.updated_at
                         ,a.deleted_at 
                         ,b.nombre as nombreEmpresa')
                ->where('a.idEmpresa', 'b.id', FALSE)
                ->whereIn('a.idEmpresa', $idEmpresas);

        return $result;
    }
}
