<?php

namespace App\Controllers;

use Exception;

class UserRegister extends BaseController
{
     protected $db;
    public function __construct(){
        //NOTE: add validation for connection error
        $this->db = \Config\Database::connect();
    }

    public function index(): string
    {
        return view('register');
    }

    public function register(){

        $name = trim($this->request->getPost('name'));
        $username = trim($this->request->getPost('username'));
        $password = trim($this->request->getPost('password'));

        if(empty($name) || empty($username) || empty($password)){
            session()->setFlashdata('error-msg', 'Register error');
            return redirect()->to('/register');
        }
        
        $data = [
            'name' => $name,
            'username' => $username,
            'password' => hash('SHA512',$password)
        ];

        try{
            $builder = $this->db->table('user');
            
            $builder->insert($data);
            session()->setFlashdata('success-msg', 'Registration success');
            return view('register');
        }catch(Exception $e){
            if(strpos($e->getMessage(), 'username')){
                  session()->setFlashdata('error-msg', 'Username has already been registered');
                  return redirect()->to('/register');
            }
        }
        
        // NOTE: additional validations
        // 1. catch error for duplicate username 
        // 2. special characters
        // 3. input must be more than 5 characters 
    }
   
}
