<?php

    namespace App\Models;
    use CodeIgniter\Model;

    class year extends Model{
        protected $table = "race_year";
        protected $returnType = "object";
        protected $primaryKey = "id";
    }
?>