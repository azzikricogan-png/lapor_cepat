<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\LaporanModel;

class Petugas extends BaseController
{
    public function index()
    {
        return view('petugas/index');
    }

    public function profil()
    {
        return view('petugas/profil');
    }

    public function laporan()
    {
        $laporanModel = new LaporanModel();

        $data['laporan'] = $laporanModel
            ->select('laporan.*, users.nama')
            ->join('users', 'users.id_user = laporan.id_user')
            ->findAll();

        return view('petugas/laporan', $data);
    }


    public function notifikasi()
    {
        return view('petugas/notifikasi');
    }

    public function updateProfil()
    {
        $userModel = new UserModel();

        $id_user = session()->get('id_user');

        $userModel->update($id_user, [
            'nama'  => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'no_hp' => $this->request->getPost('no_hp')
        ]);

        session()->set([
            'nama'  => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'no_hp' => $this->request->getPost('no_hp')
        ]);

        return redirect()->to('/petugas/profil')
                         ->with('success', 'Profil berhasil diperbarui');
    }
}