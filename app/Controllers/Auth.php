<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

        public function index()
    {
        return redirect()->to('home');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function googleLogin()
    {
        return redirect()->to('https://accounts.google.com/o/oauth2/auth');
    }
}