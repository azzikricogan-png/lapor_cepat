<?php

namespace App\Controllers;

class Laporan extends BaseController
{
    public function index()
    {
        $data['header'] = session()->get('logged_in')
            ? 'home/header'
            : 'layout/header';

        return view('laporan/index', $data);
    }
}