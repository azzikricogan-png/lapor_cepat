<?php

namespace App\Controllers;

class Informasi extends BaseController
{
    public function index()
    {
        $data['header'] = session()->get('logged_in')
            ? 'home/header'
            : 'layout/header';

        return view('informasi/index', $data);
    }
}