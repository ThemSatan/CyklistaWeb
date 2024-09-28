<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use \IonAuth\Libraries\IonAuth;

class Auth extends BaseController
{
    var $ionAuth;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, ResponseInterface $response, \Psr\Log\LoggerInterface $logger){
        parent::initController($request, $response, $logger);
        $this->ionAuth = new IonAuth();
    }
 
    /**
     * vykresli prihlasovaci formular
     */

    public function login()
    {
        $data['message'] = $this->session->message;
        $data['logged'] = $this->ionAuth->loggedIn();
        $data['title']="Přihlášení";
        return view('login',$data);
        
    }

    public function register()
    {
        $data['message'] = $this->session->message;
        $data['logged'] = $this->ionAuth->loggedIn();
        $data['title']="Registrace";
        return view('register',$data);
        
    }

    /**
     * zpracuje data z prihlasovaciho formulare
     */

    public function loginComplete()
    {
        //$this->load->helper('form');
        $login = $this->request->getPost('email');
        $password = $this->request->getPost('pswd');

        $this->ionAuth->login($login, $password);
        $logged = $this->ionAuth->loggedIn();
        $adminCheck = $this->ionAuth->isAdmin();
        if($logged){
            
            if($this->ionAuth->isAdmin() ){
                return redirect()->to('admin/dash');
            }
            else {
                return redirect()->to('home');
            }

        } 
        
        else {
            $this->session->setFlashdata('message','Špatně zadané údaje, zkuste to znovu');
            return redirect()->to('login');
        }
    }

    public function logoutComplete()
    {
        $this->ionAuth->logout();
        return redirect()->to('home');
    }

    public function registerComplete()
    {
        $email= $this->request->getPost('email');
        $username= $this->request->getPost('user');
        $password= $this->request->getPost('pswd');
        $passwordConfirm= $this->request->getPost('pswd2');
        $first_name= $this->request->getPost('name');
        $last_name= $this->request->getPost('surname');
 
        $additional_data = array(
            'name' => $first_name,
            'surname' => $last_name
        );
 
       
        $this->ionAuth->register($username, $password, $email, $additional_data);
        return redirect()->to('/login');
    }

    
}
