<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LaporanModel;

class Laporan extends BaseController
{
    public function index()
    {
        helper('text'); // untuk substr / character_limiter jika dipakai

        $model = new LaporanModel();

        $data['laporan'] = $model
            ->select('laporan.*, layanan_laporan.nama_layanan')
            ->join('layanan_laporan', 'layanan_laporan.id_layanan = laporan.id_layanan')
            ->orderBy('laporan.id_laporan', 'DESC')
            ->findAll();

        // statistik (opsional tapi bagus untuk dashboard kamu)
        $data['total_laporan'] = $model->countAll();

        $data['pending'] = $model->where('status', 'Pending')->countAllResults(false);
        $data['diproses'] = $model->where('status', 'Diproses')->countAllResults(false);
        $data['selesai'] = $model->where('status', 'Selesai')->countAllResults(false);

        return view('laporan/index', $data);
    }

    public function detail($id)
    {
        $model = new LaporanModel();

        $data['laporan'] = $model
            ->select('laporan.*, layanan_laporan.nama_layanan')
            ->join('layanan_laporan', 'layanan_laporan.id_layanan = laporan.id_layanan')
            ->where('laporan.id_laporan', $id)
            ->first();

        return view('laporan/detail', $data);
    }
}