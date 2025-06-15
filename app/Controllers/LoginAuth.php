<?php

namespace App\Controllers;

use CodeIgniter\HTTP\URI;

class LoginAuth extends BaseController
{   

    protected $session;
    protected $db;

    public function __construct(){
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
        $this->session->start();
    }

    public function authenticate()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        if(empty(trim($username)) || empty(trim($password))){
            session()->setFlashdata('error-msg', 'Login error');
            return redirect()->to('/');
        }

        return view('login');
    }
   
}
