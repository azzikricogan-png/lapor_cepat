<?php

namespace App\Controllers;

use App\Models\LaporanModel;

class Awalan extends BaseController
{
    public function index()
    {
        $data['total'] = (new LaporanModel())
            ->countAllResults();

        $data['pending'] = (new LaporanModel())
            ->where('status', 'Menunggu')
            ->countAllResults();

        $data['diproses'] = (new LaporanModel())
            ->where('status', 'Diproses')
            ->countAllResults();

        $data['selesai'] = (new LaporanModel())
            ->where('status', 'Selesai')
            ->countAllResults();

        return view('awalan/index', $data);
    }

    public function proses()
    {
        return redirect()->to('auth/login');
    }
}