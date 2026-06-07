<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('home/index');
    }

    public function profil()
    {
    if (!session()->get('logged_in')) {
        return redirect()->to('/login');
    }

    return view('home/profil', [
        'nama'  => session()->get('nama'),
        'email' => session()->get('email')
    ]);
    }

    public function logout()
    {
    session()->destroy();

    return redirect()->to('/');
    }
}