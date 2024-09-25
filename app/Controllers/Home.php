<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use \IonAuth\Libraries\IonAuth;

use App\Models\race as rModel;
use App\Models\country as cModel;
use Config\MyConfig as ConfModel;

class Home extends BaseController
{
    function __construct() {
        $this->rModel = new rModel();
        $this->cModel = new cModel();
        $this->config = new ConfModel();
    }

    function index()
    {
        $config = new ConfModel();
        $perpage=$this->config->variable;
        $data['array']= $this->rModel->orderBy("id","asc")->paginate($perpage);
        $data['pager'] = $this->rModel->pager;
        $data['title']="Naše Cyklistika";

        return view('home',$data);
    }



}
