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

        $status = $this->request->getGet('status'); // 👈 TAMBAH INI
        $keyword = $this->request->getGet('keyword');
        // ======================
        // QUERY LAPORAN (FILTER)
        // ======================
        $model->select('laporan.*, layanan_laporan.nama_layanan')
            ->join('layanan_laporan', 'layanan_laporan.id_layanan = laporan.id_layanan')
            ->where('laporan.id_user', $id_user);

        if ($status) {
            $model->where('laporan.status', $status);
        }

        // 🔥 FIX INI
        if (!empty($keyword)) {
            $model->groupStart()
                ->like('laporan.judul', $keyword)
                ->orLike('laporan.lokasi', $keyword)
                ->orLike('laporan.deskripsi', $keyword)
            ->groupEnd();
        }

        $data['laporan'] = $model
            ->orderBy('laporan.id_laporan', 'DESC')
            ->findAll();

        // Statistik
        $data['total_laporan'] = (new LaporanModel())
            ->where('id_user', $id_user)
            ->countAllResults();

        $data['menunggu'] = (new LaporanModel())
            ->where('id_user', $id_user)
            ->where('status', 'Menunggu')
            ->countAllResults();

        $data['diproses'] = (new LaporanModel())
            ->where('id_user', $id_user)
            ->where('status', 'Diproses')
            ->countAllResults();

        $data['selesai'] = (new LaporanModel())
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

    public function hapus($id)
    {
        $laporanModel = new \App\Models\LaporanModel();

        $laporanModel->delete($id);

        return redirect()->to('/laporan')
                    ->with('success', 'Laporan berhasil dihapus');
}
}