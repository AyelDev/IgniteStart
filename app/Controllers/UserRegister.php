<?php

namespace App\Controllers;

use Exception;

class UserRegister extends BaseController
{
     protected $db;
     protected $hashAlgo = 'SHA512';

    public function __construct(){
        //NOTE: add validation for connection error
        $this->db = \Config\Database::connect();
    }

    public function index(): string
    {
        return view('user/register');
    }

    public function register(){

        $name = trim($this->request->getPost('name'));
        $username = trim($this->request->getPost('username'));
        $password = trim($this->request->getPost('password'));

        if(empty($name) || empty($username) || empty($password))
        {
            session()->setFlashdata('error-msg', 'Register error');
            $this->db->close();
            return redirect()->to('/register');
        }
        
        $data = [
            'name' => $name,
            'username' => $username,
            'password' => hash($this->hashAlgo ,$password)
        ];

        try
        {
            $builder = $this->db->table('user');
            
            $builder->insert($data);
            session()->setFlashdata('success-msg', 'Registration success');
            $this->db->close();
            return redirect()->to('/');
        }
        catch(Exception $e)
        {
            if(strpos($e->getMessage(), 'username'))
            {      
                $this->db->close();
                session()->setFlashdata('error-msg', 'Username has already been registered');
                return redirect()->to('/register');
            }

        }
    }
}
