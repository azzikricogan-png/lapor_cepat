<?php

namespace App\Controllers;

class Petugas extends BaseController
{
    public function profil()
    {
        return view('petugas/profil');
    }


    public function index()
    {
        return view('petugas/index');
    }


    public function laporan()
    {
        return view('petugas/laporan');
    }

    public function notifikasi()
    {
        return view('petugas/notifikasi');
    }
}