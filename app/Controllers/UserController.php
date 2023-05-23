<?php

namespace App\Controllers;

class UserController extends Controller
{

    public function login()
    {
        return $this->view('auth.login');
    }
    public function loginPost()
    {
        echo 'bonjour';
    }

}
