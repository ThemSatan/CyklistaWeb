<?php

    namespace App\Models;
    use CodeIgniter\Model;

    class race extends Model{
        protected $table = "race";
        protected $returnType = "object";
        protected $primaryKey = "id";
        /**protected $autoIncrement = "true";
        protected $useSoftDeletes = "true";
        protected $allowedFields = ['status', 'jmeno', 'vek', 'vaha', 'plemeno_id', 'pohlavi', 'narozeni', 'fotografie', 'popis'];
        protected $deletedField = "vymazano";
        protected $dateFormat = "int";
        protected $useTimeStamps = "true";
        protected $createdField = "vytvoreno";
        protected $updatedField = "upraveno";**/
    }
?>