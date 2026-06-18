<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\LaporanModel;
use App\Models\LayananLaporanModel;

class Petugas extends BaseController
{
    public function index()
    {
        return view('petugas/profil');
    }

    public function profil()
    {
        return view('petugas/profil');
    }

    public function laporan()
    {
        $laporanModel = new LaporanModel();

        $keyword = $this->request->getGet('keyword');

        $builder = $laporanModel
            ->select('laporan.*, users.nama, layanan_laporan.nama_layanan')
            ->join('users', 'users.id_user = laporan.id_user')
            ->join('layanan_laporan', 'layanan_laporan.id_layanan = laporan.id_layanan');

        if (!empty($keyword)) {
            $builder->groupStart()
                ->like('laporan.judul', $keyword)
                ->orLike('users.nama', $keyword)
                ->orLike('laporan.lokasi', $keyword)
                ->groupEnd();
    }

    $data['laporan'] = $builder->findAll();


    
        $data['total'] = (new LaporanModel())
            ->countAllResults();

        $data['menunggu'] = (new LaporanModel())
            ->where('status', 'Menunggu')
            ->countAllResults();

        $data['diproses'] = (new LaporanModel())
            ->where('status', 'Diproses')
            ->countAllResults();

        $data['selesai'] = (new LaporanModel())
            ->where('status', 'Selesai')
            ->countAllResults();
    
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

         // Upload Foto
        $foto = $this->request->getFile('foto');

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {

            $namaFoto = $foto->getRandomName();

            $foto->move('uploads', $namaFoto);

            $data['foto'] = $namaFoto;

            // update session foto
            session()->set('foto', $namaFoto);
        }

        $userModel->update($id_user, $data);

        session()->set([
            'nama'  => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'no_hp' => $this->request->getPost('no_hp')
        ]);

        return redirect()->to('/petugas/profil')
                         ->with('success', 'Profil berhasil diperbarui');
    }
}