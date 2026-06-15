<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\LaporanModel;
use App\Models\LayananLaporanModel;

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
        ->select('laporan.*, users.nama, layanan_laporan.nama_layanan')
        ->join('users', 'users.id_user = laporan.id_user')
        ->join('layanan_laporan', 'layanan_laporan.id_layanan = laporan.id_layanan')
        ->findAll();

    $data['total'] = $laporanModel->countAllResults();
    
    return view('petugas/laporan', $data);
    }

    public function updateStatus()
    {
    $laporanModel = new \App\Models\LaporanModel();

    $id_laporan = $this->request->getPost('id_laporan');
    $status     = $this->request->getPost('status');

    $laporanModel->update($id_laporan, [
        'status' => $status
    ]);

    return redirect()->to('/petugas/laporan')
                     ->with('success', 'Status berhasil diperbarui');
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