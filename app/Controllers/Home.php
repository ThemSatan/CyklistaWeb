<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use \IonAuth\Libraries\IonAuth;

use App\Models\race as rModel;
use App\Models\location as lModel;
use App\Models\rider as rdModel;
use App\Models\country as cModel;
use Config\MyConfig as ConfModel;

class Home extends BaseController
{
    function __construct() {
        $this->rModel = new rModel();
        $this->lModel = new lModel();
        $this->rdModel = new rdModel();
        $this->cModel = new cModel();
        $this->config = new ConfModel();
    }

    var $ionAuth;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, ResponseInterface $response, \Psr\Log\LoggerInterface $logger){
        parent::initController($request, $response, $logger);
        $this->ionAuth = new IonAuth();
    }

    /*HOME PAGE*/

    function index()
    {
        $config = new ConfModel();
        $perpage=$this->config->variable;
        $data['array']= $this->rModel->orderBy("id","asc")->paginate($perpage);
        $data['pager'] = $this->rModel->pager;
        $data['logged'] = $this->ionAuth->loggedIn();
        $data['adminCheck'] = $this->ionAuth->isAdmin();
        $data['title']="Naše Cyklistika";

        return view('home',$data);
    }

    function riders()
    {
        $config = new ConfModel();
        $perpage=$this->config->variable;
        $data['array']= $this->rdModel->orderBy("id","asc")->paginate($perpage);
        $data['pager'] = $this->rdModel->pager;
        $data['logged'] = $this->ionAuth->loggedIn();
        $data['adminCheck'] = $this->ionAuth->isAdmin();
        $data['title']="Naše Cyklistika";

        return view('riders',$data);
    }

    function riderInfo($id)
    {
        $data['array']= $this->rdModel->where('id', $id)->orderBy("id","asc")->findAll();
        $data['logged'] = $this->ionAuth->loggedIn();
        $data['adminCheck'] = $this->ionAuth->isAdmin();
        $data['title']="Naše Cyklistika";

        return view('riderInfo',$data);
    }


    /*EDITING PAGE*/

    function devpage()
    {
        $config = new ConfModel();
        $perpage=$this->config->variable;
        $data['array']= $this->rModel->orderBy("id","asc")->paginate($perpage);
        $data['pager'] = $this->rModel->pager;
        $data['message'] = $this->session->message;
        $data['logged'] = $this->ionAuth->loggedIn();
        $data['adminCheck'] = $this->ionAuth->isAdmin();
        $data['title']="Naše Cyklistika";

        return view('devPage',$data);
    }

    /*UPDATING*/

    function updateRace($id) {
        $data['array']= $this->rModel->where('id', $id)->findAll();
        $data['title']="Upravit";
        $data['message'] = $this->session->message;
        $data['logged'] = $this->ionAuth->loggedIn();
        return view('updateRace',$data);
    }
    

    function updateForm() {
        $id = $this->request->getPost('id');
        $name = $this->request->getPost('default_name');
        $link = $this->request->getPost('link');
        $country = $this->request->getPost('country');
        $type = $this->request->getPost('type');

        $data = array(
            'id' => $this->request->getPost('id'),
            'default_name' => $this->request->getPost('default_name'),
            'link' => $this->request->getPost('link'),
            'country' => $this->request->getPost('country'),
            'type' => $this->request->getPost('type')

        );
        $this->rModel->save($data);

        $this->session->setFlashdata('message','Závod byl úspěšně upraven 🗣️');
        return redirect()->route('dev');
    }

    
    /*CREATING*/

    function addNew() {
        $data['array']= $this->rModel->orderBy("id","asc")->findAll();
        $data['message'] = $this->session->message;
        $data['title'] = "Přidat závod";
        $data['logged'] = $this->ionAuth->loggedIn();
        echo view('addNew', $data);
    }
    
    function createForm() {
            $name = $this->request->getPost('default_name');
            $link = $this->request->getPost('link');
            $country = $this->request->getPost('country');
            $type = $this->request->getPost('type');

            $data = array(
                'default_name' => $name,
                'link' => $link,
                'country' => $country,
                'type' => $type
            );

            $this->rModel->save($data);

            $this->session->setFlashdata('message', 'Závod byl úspěšně vytvořen 🗣️');
            return redirect()->route('race/new');
        }

    /*DELETION CONFIRMATION PAGE*/

    function confirmDelete($id){
        $data['array']= $this->rModel->find($id);
        $data['title']="Potvrdit";
        $data['message'] = $this->session->message;
        $data['logged'] = $this->ionAuth->loggedIn();
        return view('deleteRace',$data);
    }

    /*DELETING*/

    function deleteForm(){
        $id = $this->request->getPost('id');
        $return = $this->rModel->delete($id);
        $this->session->setFlashdata('message','Závod byl úspěšně odstraněn 🗣️');
        return redirect()->route('dev');
    }
}
