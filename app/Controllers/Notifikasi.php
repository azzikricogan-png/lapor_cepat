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
            ->where('status_baca', 'belum_dibaca')
            ->orderBy('created_at', 'DESC')
            ->findAll();

        return view('home/notifikasi', $data);
    }

    public function read($id)
    {
        $notifikasiModel = new NotifikasiModel();

        $notifikasiModel->update($id, [
            'status_baca' => 'sudah_dibaca'
        ]);

        return redirect()->to('/notifikasi');
    }
}