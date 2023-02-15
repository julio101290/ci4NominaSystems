<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * @method User|null first()
 */
class EmpresasModel extends Model {

    protected $table = 'empresas';
    protected $primaryKey = 'id';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'id', 'nombre', 'direccion', 'rfc', 'telefono', 'correoElectronico', 'diasEntrega',
        'caja', 'logo', 'certificado', 'archivoKey', 'contraCertificado', 'regimenFiscal', 'razonSocial', 'CURP',
        'codigoPostal', 'created_at ', 'updated_at ', 'deleted_at'
    ];
    protected $useTimestamps = true;
    protected $validationRules = [
        'correoElectronico' => 'required|valid_email',
        'razonSocial ' => 'required|alpha_numeric_punct|min_length[3]|is_unique[empresas.razonSocial]',
        'rfc ' => 'is_unique[empresas.rfc]',
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;

}
