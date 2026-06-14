<?php

namespace App\Controllers;

use App\Models\NotifikasiModel;

class Notifikasi extends BaseController
{
    public function index()
    {
        $notifikasiModel = new NotifikasiModel();

        $data['notifikasi'] = $notifikasiModel
            ->where('id_user', session()->get('id_user'))
            ->findAll();

        return view('home/notifikasi', $data);
    }
}