<?php

namespace App\Controllers;

use App\Models\LaporanModel;
use App\Models\NotifikasiModel;
use App\Models\UserModel;

class Home extends BaseController
{
    public function index()
    {
        $laporanModel = new LaporanModel();

        $total = $laporanModel->countAllResults();

        $pending = $laporanModel->where('status', 'Menunggu')->countAllResults(false);
        $diproses = $laporanModel->where('status', 'Diproses')->countAllResults(false);
        $selesai = $laporanModel->where('status', 'Selesai')->countAllResults(false);

        return view('home/index', [
            'total'     => $total,
            'pending'   => $pending,
            'diproses'  => $diproses,
            'selesai'   => $selesai
        ]);
    }

    public function profil()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $id_user = session()->get('id_user');

        $total_laporan = (new LaporanModel())
            ->where('id_user', $id_user)
            ->countAllResults();

        $proses = (new LaporanModel())
            ->where('id_user', $id_user)
            ->where('status', 'Diproses')
            ->countAllResults();

        $selesai = (new LaporanModel())
            ->where('id_user', $id_user)
            ->where('status', 'Selesai')
            ->countAllResults();

        //RIWAYAT
        $riwayat = (new LaporanModel())
            ->where('id_user', $id_user)
            ->orderBy('id_laporan', 'DESC')
            ->findAll(5);
        
        //TANGGAL BERGABUNG
        $userModel = new UserModel();

        $user = $userModel->find($id_user);
        $tanggal_daftar = $user['created_at'] ?? null;

        return view('home/profil', [
            'nama'          => session()->get('nama'),
            'email'         => session()->get('email'),
            'no_hp'         => session()->get('no_hp'),
            'total_laporan' => $total_laporan,
            'proses'        => $proses,
            'selesai'       => $selesai,
            'riwayat'       => $riwayat,
            'tanggal_daftar'=> $tanggal_daftar
        ]);
    }
    

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}