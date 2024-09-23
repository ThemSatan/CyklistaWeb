<?php

    namespace App\Models;
    use CodeIgniter\Model;

    class country extends Model{
        protected $table = "country";
        protected $returnType = "object";
        protected $primaryKey = "id";
    }
?>