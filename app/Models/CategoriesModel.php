<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriesModel extends Model{

    protected $table      = 'categories';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id','name','minimumSalary','maximunSalary','created_at','updated_at','deleted_at'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    =  [

    ];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}
        