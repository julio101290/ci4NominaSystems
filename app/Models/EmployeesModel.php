<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeesModel extends Model {

    protected $table = 'employees';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id'
        , 'idEmpresa'
        , 'codigo'
        , 'firstname'
        , 'lastname'
        , 'motherLastName'
        , 'nameAbrev'
        , 'sex'
        , 'birthdate'
        , 'placebirth'
        , 'RFC'
        , 'CURP'
        , 'scholarship'
        , 'initials'
        , 'email'
        , 'nip'
        , 'turn'
        , 'street'
        , 'number'
        , 'cologne'
        , 'state'
        , 'postalCode'
        , 'phone'
        , 'civilStatus'
        , 'sons'
        , 'spouse'
        , 'father'
        , 'mother'
        , 'socialSecurity'
        , 'familyMedicalUnit'
        , 'infonavit'
        , 'factor'
        , 'date'
        , 'numberInfonavit'
        , 'nameBeneficiary'
        , 'relationBeneficiary'
        , 'porcenBeneficiary'
        , 'nameBeneficiary2'
        , 'relationBeneficiary2'
        , 'porcenBeneficiary2'
        , 'bank'
        , 'bankAccount'
        , 'creditCard'
        , 'statusCard'
        , 'CLABE'
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
