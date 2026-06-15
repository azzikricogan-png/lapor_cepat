<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LaporanModel;

class Laporan extends BaseController
{
    public function index()
    {
        helper('text');

        $model = new LaporanModel();

        $id_user = session()->get('id_user');

        // Data laporan user login
        $data['laporan'] = $model
            ->select('laporan.*, layanan_laporan.nama_layanan')
            ->join(
                'layanan_laporan',
                'layanan_laporan.id_layanan = laporan.id_layanan'
            )
            ->where('laporan.id_user', $id_user)
            ->orderBy('laporan.id_laporan', 'DESC')
            ->findAll();

        // Statistik
        $data['total_laporan'] = $model
            ->where('id_user', $id_user)
            ->countAllResults();

        $data['menunggu'] = $model
            ->where('id_user', $id_user)
            ->where('status', 'Menunggu')
            ->countAllResults();

        $data['diproses'] = $model
            ->where('id_user', $id_user)
            ->where('status', 'Diproses')
            ->countAllResults();

        $data['selesai'] = $model
            ->where('id_user', $id_user)
            ->where('status', 'Selesai')
            ->countAllResults();

        return view('laporan/index', $data);
    }

    public function detail($id)
    {
        $model = new LaporanModel();

        $laporan = $model
            ->select('laporan.*, layanan_laporan.nama_layanan')
            ->join(
                'layanan_laporan',
                'layanan_laporan.id_layanan = laporan.id_layanan'
            )
            ->where('laporan.id_laporan', $id)
            ->where('laporan.id_user', session()->get('id_user'))
            ->first();

        // Jika laporan tidak ditemukan
        if (!$laporan) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('laporan/detail', [
            'laporan' => $laporan
        ]);
    }
}