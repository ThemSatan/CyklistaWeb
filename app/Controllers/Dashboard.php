<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use \IonAuth\Libraries\IonAuth;

class Dashboard extends BaseController
{
    var $ionAuth;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, ResponseInterface $response, \Psr\Log\LoggerInterface $logger){
        parent::initController($request, $response, $logger);
        $this->ionAuth = new IonAuth();
    }

    public function index()
    {
        $user = $this->ionAuth->user()->row();
        echo "user: ".$user->username;
        echo "<br>už jsme tady :D";
    }
}
