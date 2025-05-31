<?php

namespace App\Controllers;

class UserRegister extends BaseController
{
    public function index(): string
    {
        return view('register');
    }
   
}
