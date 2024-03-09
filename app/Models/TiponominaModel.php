<?php

namespace App\Models;

use CodeIgniter\Model;

class TiponominaModel extends Model {

    protected $table = 'tiponomina';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id'
        , 'codigo'
        , 'nombre'
        , 'direccion'
        , 'colonia'
        , 'ciudad'
        , 'idEmpresa'
        , 'idSucursal'
        , 'porcISN'
        , 'entidadFederativa'
        , 'cxcNom'
        , 'cxpISN'
        , 'cxcInfonavit'
        , 'cxcIMSS'
        , 'cxcFonacot'
        , 'diasPeriodoNomina'
        , 'maxDias'
        , 'codigoPostal'
        , 'riesgoPto'
        , 'areaSalMin'
        , 'ejecutivo'
        , 'ctaNom'
        , 'NRP'
        , 'porcRiesgoTrabajo'
        , 'numSucBancaria'
        , 'tipoNomina'
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
}
