<?php

    namespace App\Models;
    use CodeIgniter\Model;

    class location extends Model{
        protected $table = "location";
        protected $returnType = "object";
        protected $primaryKey = "id";
    }
?>