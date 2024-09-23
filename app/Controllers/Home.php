<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use \IonAuth\Libraries\IonAuth;

use App\Models\race as rModel;

class Home extends BaseController
{
    function __construct() {
        $this->rModel = new rModel();
    }

    function index()
    {
        $data['title']="Naše Cyklistika";
        $data['array']= $this->rModel->orderBy("id","asc")->array_unique($array)->findAll();

        return view('home',$data);
    }



}
