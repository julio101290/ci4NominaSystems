<?php

namespace App\Models;

use CodeIgniter\Model;

class CostcenterModel extends Model {

    protected $table = 'costcenter';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id', 'code', 'name', 'type', 'branchoffice', 'created_at', 'updated_at', 'deleted_at'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $deletedField = 'deleted_at';
    protected $validationRules = [
        'code ' => 'is_unique[costcenter.code]',
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;

}
