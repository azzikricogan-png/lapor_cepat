<?php

namespace App\Controllers;

class Awalan extends BaseController
{
    public function index()
    {
        return view('awalan/index');
    }
    public function proses() {
        return redirect()->to('auth/login');
    }
}