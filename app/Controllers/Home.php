<?php

namespace App\Controllers;

use App\Models\LaporanModel;
use App\Models\NotifikasiModel;

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

        $laporanModel = new LaporanModel();

        $total_laporan = $laporanModel
            ->where('id_user', session()->get('id_user'))
            ->countAllResults();

        return view('home/profil', [
            'nama'  => session()->get('nama'),
            'email' => session()->get('email'),
            'total_laporan' => $total_laporan
        ]);
    }

    

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}