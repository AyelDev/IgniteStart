<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    protected $session;
    public function __construct()
    {
        $this->session = session();
    }

    public function index(): string
    {
        $data = [];
        helper(['form']);
        return view('user/register', $data);
    }

    public function authenticate()
    {
        if (!$this->request->isAJAX()) {
            return $this->response
                ->setStatusCode(400)
                ->setJSON([
                    'sts_code' => 0,
                    'message' => 'Invalid request type. AJAX expected.'
                ]);
        }

        $rules = [
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email is required',
                    'valid_email' => 'Please enter a valid email'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password is required'
                ]
            ]

        ];

        if ($this->validate($rules)) {
            $userModel = new UserModel();
            $JSON_Data = $this->request->getJSON(true);

            $user = $userModel->where('email', $JSON_Data['email'])->first();

            if ($user && password_verify($JSON_Data['password'], $user['password'])) {

                $userSession = [
                    'id' => $user['id'],
                    'user_type' => $user['user_type'],
                    'user_status' =>  $user['user_status'],
                    'name' => $user['name'],
                    'email' => $user['email']
                ];

                switch ($user['user_status']) {
                    case 0:
                        $this->session->set('user_login', $userSession);
                        return $this->response
                            ->setStatusCode(401)
                            ->setContentType('application/json')
                            ->setJSON([
                                'sts_code' => 0,
                                'message' => [
                                    'invalid' => 'This is deactivated user'
                                ]
                            ]);

                    case 1:
                        $this->session->set('user_login', $userSession);
                        return $this->response
                            ->setStatusCode(200)
                            ->setContentType('application/json')
                            ->setJSON([
                                'sts_code' => 1,
                                'id' => $user['id'],
                                'user_type' => $user['user_type'],
                                'message' => 'Welcome ' . $user['name']
                            ]);

                    default:
                        return;
                }
            } else {
                return $this->response
                    ->setStatusCode(401)
                    ->setJSON([
                        'sts_code' => 0,
                        'message' => [
                            'invalid' => 'Invalid Email or Password'
                        ]
                    ]);
            }
        }

        return $this->response
            ->setStatusCode(422)
            ->setJSON([
                'sts_code' => 0,
                'message' => $this->validator->getErrors()
            ]);
    }

    public function register()
    {

        if (!$this->request->isAJAX()) {
            return $this->response
                ->setStatusCode(400)
                ->setJSON([
                    'sts_code' => 0,
                    'message' => 'Invalid request type. AJAX expected.'
                ]);
        }

        $rules = [
            'name' => [
                'rules' => 'required|min_length[2]|max_length[50]',
                'errors' => [
                    'required' => 'Name is required',
                    'min_length' => 'name must be atleast 2 characters',
                    'max_length' => 'name must be atleast 50 characters'
                ],
            ],
            'email' => [
                'rules' => 'required|min_length[10]|max_length[30]|valid_email|is_unique[tbl_user.email]',
                'errors' => [
                    'required' => 'Email is required',
                    'valid_email' => 'Please enter a valid email',
                    'is_unique' => 'This email is already registered'
                ],
            ],
            'password' => [
                'rules' => 'required|min_length[5]|max_length[15]|valid_password',
                'errors' => [
                    'required' => 'Password is required',
                    'valid_password' => 'Please enter a valid password with at least 1 number and 1 special character'
                ],
            ]
            //NOTE: CONTINUE VALIDATION
        ];

        if ($this->validate($rules)) {

            $userModel = new UserModel();

            $JSON_Data = $this->request->getJSON(true);

            $data = $this->prepareUserData($JSON_Data);

            // $userModel->save($data);
            // $this->session->setFlashdata('success-msg', 'Registration success');
            // return redirect()->to('/');

            $userModel->save($data);

            return $this->response
                ->setStatusCode(201)
                ->setContentType('application/json')
                ->setJSON([
                    'sts_code' => 1,
                    'message' => 'Registration success'
                ]);
        }

        return $this->response
            ->setStatusCode(422)
            ->setJSON([
                'sts_code' => 0,
                'message' => $this->validator->getErrors()
            ]);
    }

    //user
    public function userDashboard()
    {
        $data = [
            'title' => 'user - dashboard',
            'session' => session(),

            'styles' => [
                'modules/dashboard/css/dashboard.css',
            ],
            'scripts' => [
                'modules/dashboard/js/dashboard.js',
            ],
        ];
        return view('user/dashboard', $data);
    }

    //admin
    public function adminDashboard()
    {

        $data = [
            'title' => 'admin - dashboard',
            'session' => session(),

            'styles' => [
                'modules/dashboard/css/dashboard.css',
            ],
            'scripts' => [
                'modules/dashboard/js/dashboard.js',
            ],
        ];

        return view('admin/dashboard', $data, ['cache' => 1]);
    }

    public function users()
    {
        $data = [
            'title' => 'admin - users',
            'session' => session(),

            'styles' => [
                'modules/users/css/users.css',
            ],
            'scripts' => [
                'modules/users/js/users.js',
            ],
        ];
        return view('admin/users', $data, ['cache' => 1]);
    }

    public function getUsers()
    {
        $userModel = new UserModel();
        $user = $userModel->select('id, name, email, created_at, user_status')->findAll();

        $user_count = count($user);
        //  && $this->request->isAJAX()
        if ($user_count > 0) {
            return $this->response
                ->setStatusCode(200)
                ->setJSON([
                    'sts_code' => 1,
                    'data' => $user
                ]);
        }

        return $this->response
            ->setStatusCode(400)
            ->setJSON([
                'sts_code' => 0,
                'message' => 'Something went wrong.'
            ]);
    }

    public function assign_task()
    {

        $data = [
            'title' => 'admin - assign-task',
            'session' => session(),

            'styles' => [
                'modules/assigntask/css/assign_task.css',
            ],
            'scripts' => [
                'modules/assigntask/js/assign_task.js',
            ],
        ];

        return view('assigntask', $data, ['cache' => 1]);
    }

    public function _assign_task($asd) {}

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }

    public function testlogin()
    {
         $data = [
            'title' => 'test admin - assign-task',
            'session' => session(),

            'styles' => [
                'modules/assigntask/css/assign_task.css',
            ],
            'scripts' => [
                'modules/assigntask/js/assign_task.js',
            ],
        ];
        return view('testlogin', $data, ['cache' => 1]);
    }
}
