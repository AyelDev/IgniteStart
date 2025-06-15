<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    protected $session;

    public function __construct(){
        $this->session = session();
    }

    public function index(): string
    {
        $data = [];
        helper(['form']);
        return view('user/register', $data);
    }

    public function register(){
        helper(['form']);

        $rules = [
            'name'=> [
                'rules' => 'required|min_length[2]|max_length[50]',
                'errors' => [
                    'required' => 'Name is required',
                    'min_length' => 'name must be atleast 2 characters',
                    'max_length' => 'name must be atleast 50 characters'
                ],
            ],
            'username'=>[
                    'rules' => 'required|min_length[5]|max_length[15]|valid_username|is_unique[user.username]',
                    'errors' => [
                        'required' => 'Username is required',
                        'valid_username' => 'Please enter a valid username with at least 1 number and 1 special character',
                        'is_unique' => 'This username is already registered'
                    ],
            ],
            'password'=>[
                    'rules' => 'required|min_length[5]|max_length[15]|valid_password',
                    'errors' => [
                        'required' => 'Password is required',
                        'valid_password' => 'Please enter a valid password with at least 1 number and 1 special character'
                    ],
            ]
                //NOTE: CONTINUE VALIDATION
        ];

        if($this->validate($rules)){
            
            $userModel = new UserModel();
            $name = trim($this->request->getPost('name'));
            $username = trim($this->request->getPost('username'));
            $password = trim($this->request->getPost('password'));

            $data = [
                'name' => $name,
                'username' => $username,
                'password' => password_hash($password, PASSWORD_BCRYPT, ['cost' => 13])
            ];

            $userModel->save($data);
            $this->session->setFlashdata('success-msg', 'Registration success');
            return redirect()->to('/');
            
        }else{
            $data['validation'] = $this->validator;
            return view('user/register', $data);
        }
    }

    //dashboard
    public function dashboard(){
        $data = [];
        $data['session'] = session();
        return view('user/dashboard' , $data);
    }

}
