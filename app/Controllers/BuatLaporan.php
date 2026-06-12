<?php

namespace App\Controllers;

use App\Models\LaporanModel;

class BuatLaporan extends BaseController
{
    public function index()
    {
        // 🔥 CEK LOGIN
        if (!session()->get('id_user')) {
            return redirect()->to('/login');
        }

        return view('buatlaporan/index');
    }

    public function simpan()
    {
        // 🔥 CEK LOGIN JUGA (WAJIB)
        if (!session()->get('id_user')) {
            return redirect()->to('/login');
        }

        $laporanModel = new LaporanModel();

        $id_user = session()->get('id_user');

        $file = $this->request->getFile('foto');
        $namaFoto = null;

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $namaFoto = $file->getRandomName();
            $file->move('uploads', $namaFoto);
        }

        $laporanModel->insert([
            'id_user'     => $id_user,
            'id_layanan'  => $this->request->getPost('id_layanan'),
            'judul'       => $this->request->getPost('judul'),
            'deskripsi'   => $this->request->getPost('deskripsi'),
            'lokasi'      => $this->request->getPost('lokasi'),
            'foto'        => $namaFoto,
            'status'      => 'Menunggu'
        ]);

        return redirect()->to('/buat_laporan');
    }
}