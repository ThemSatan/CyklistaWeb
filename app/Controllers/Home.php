<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use \IonAuth\Libraries\IonAuth;

use App\Models\race as rModel;
use App\Models\country as cModel;

class Home extends BaseController
{
    function __construct() {
        $this->rModel = new rModel();
        $this->cModel = new cModel();
    }

    function index()
    {
        $data['title']="Naše Cyklistika";
        $data['array']= $this->cModel->orderBy("country_name","asc")->findAll();

        return view('home',$data);
    }



}
