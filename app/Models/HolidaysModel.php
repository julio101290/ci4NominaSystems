<?php

namespace App\Models;

use CodeIgniter\Model;

class HolidaysModel extends Model{

    protected $table      = 'holidays';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id','date','created_at','updated_at','deleted_at'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    =  [

    ];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}
        