<?php

namespace App\Models;

use CodeIgniter\Model;

class NominasModel extends Model {

    protected $table = 'nominas';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id'
        , 'idEmpresa'
        , 'idTipoNominas'
        , 'clave'
        , 'fechaInicial'
        , 'fechaFinal'
        , 'diasTrab'
        , 'cerrada'
        , 'descripcion'
        , 'usuarioAperturo'
        , 'fechaCerrado'
        , 'usuarioCerrado'
        , 'diasPagados'
        , 'fechaAplicacion'
        , 'porcISN'
        , 'diasFestivos'
        , 'ise'
        , 'proveedorISN'
        , 'porrsg', 'UMA'
        , 'created_at'
        , 'updated_at'
        , 'deleted_at'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $deletedField = 'deleted_at';
    protected $validationRules = [
        'idEmpresa'    => 'is_natural_no_zero',
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function mdlGetNominas($idEmpresas) {

        $result = $this->db->table('nominas a, empresas b')
                ->select('a.id
                        ,a.idEmpresa
                        ,a.idTipoNominas
                        ,a.clave
                        ,a.fechaInicial
                        ,a.fechaFinal
                        ,a.diasTrab
                        ,a.cerrada
                        ,a.descripcion
                        ,a.usuarioAperturo
                        ,a.fechaCerrado
                        ,a.usuarioCerrado
                        ,a.diasPagados
                        ,a.fechaAplicacion
                        ,a.porcISN
                        ,a.diasFestivos
                        ,a.ise
                        ,a.proveedorISN
                        ,a.porrsg
                        ,a.UMA
                        ,a.created_at
                        ,a.updated_at
                        ,a.deleted_at 
                        ,b.nombre as nombreEmpresa')
                ->where('a.idEmpresa', 'b.id', FALSE)
                ->whereIn('a.idEmpresa', $idEmpresas);

        return $result;
    }
}
