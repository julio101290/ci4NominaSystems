<?php

namespace App\Models;

use CodeIgniter\Model;

class TurnsModel extends Model{

    protected $table      = 'turns';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id','code','name','created_at','updated_at','deleted_at'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    =  [

    ];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}
        