<?php

    namespace App\Models;
    use CodeIgniter\Model;

    class race extends Model{
        protected $table = "race";
        protected $returnType = "object";
        protected $primaryKey = "id";
        protected $autoIncrement = "true";
        protected $useSoftDeletes = "true";
        protected $allowedFields = ['default_name','link','country','type'];
        protected $deletedField = "deleted";
        protected $dateFormat = "int";
        protected $useTimeStamps = "true";
        protected $createdField = "created";
        protected $updatedField = "updated";
    }
?>