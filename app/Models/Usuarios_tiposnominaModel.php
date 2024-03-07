<?php

namespace App\Models;

use CodeIgniter\Model;

class Usuarios_tiposnominaModel extends Model {

    protected $table = 'usuarios_tiposnomina';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id'
                            , 'idEmpresa'
                            , 'idUsuario'
                            , 'idTipoNomina'
                            , 'status'
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

    public function mdlGetUsuarios_tiposnomina($idEmpresas) {

        $result = $this->db->table('usuarios_tiposnomina a, empresas b')
                ->select('a.id,a.idEmpresa,a.idSucursal,a.idTipoNomina,a.status,a.created_at,a.updated_at,a.deleted_at ,b.nombre as nombreEmpresa')
                ->where('a.idEmpresa', 'b.id', FALSE)
                ->whereIn('a.idEmpresa', $idEmpresas);

        return $result;
    }

    public function mdlTiposNominaPorUsuario($tipoNomina, $empresasID) {

        $result = $this->db->table('users a, tiponomina b')
                ->select(
                        'ifnull(a.id,0) as id
                ,a.username
                ,b.idEmpresa
                ,' . $tipoNomina . ' as idTipoNomina
                ,ifnull((select status 
                            from usuarios_tiposnomina z
                            where z.idUsuario = a.id
                                and z.idEmpresa=b.idEmpresa
                                    and z.idTipoNomina=' . $tipoNomina . '
                                    ),\'off\') as status
                                        
                ,ifnull((select z.id 
                        from usuarios_tiposnomina z
                        where z.idUsuario = a.id
                            and z.idEmpresa=b.idEmpresa
                                and z.idTipoNomina=' . $tipoNomina . '
                                ),0) as idTipoNominaUsuario
                '
                )
                ->where('b.idEmpresa', $empresasID);

        return $result;
    }
}
