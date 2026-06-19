<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\LaporanModel;
use App\Models\NotifikasiModel;

class Admin extends BaseController
{
    public function index()
    {
        // Cek login
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        // Cek role admin
        if (session()->get('role') != 'admin') {
            return redirect()->to('/login');
        }

        $userModel = new UserModel();
        $laporanModel = new LaporanModel();

        // User terbaru
        $data['user'] = $userModel
            ->orderBy('id_user', 'DESC')
            ->findAll(5);

        // Statistik
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

        $notifikasiModel = new NotifikasiModel();

        $data['jumlah_notifikasi'] = $notifikasiModel
            ->where('status_baca', 0)
            ->countAllResults();
        
        $data['notifikasi'] = $notifikasiModel
            ->orderBy('id_notifikasi', 'DESC')
            ->findAll(5);

        // Ambil status dari URL
    $keyword = $this->request->getGet('keyword');
    $status  = $this->request->getGet('status');

    $builder = $laporanModel
        ->select('laporan.*, users.nama, layanan_laporan.nama_layanan')
        ->join('users', 'users.id_user = laporan.id_user')
        ->join('layanan_laporan', 'layanan_laporan.id_layanan = laporan.id_layanan');

    // Jika ada filter status
    if (!empty($status)) {
        $builder->where('laporan.status', $status);
    }

    if (!empty($keyword)) {

    $builder->groupStart()
        ->like('laporan.judul', $keyword)
        ->orLike('layanan_laporan.nama_layanan', $keyword)
        ->orLike('laporan.lokasi', $keyword)
        ->orLike('laporan.status', $keyword)
        ->orLike('users.nama', $keyword)
    ->groupEnd();
    }

    $data['laporan'] = $builder
        ->orderBy('id_laporan', 'DESC')
        ->findAll();

        return view('admin/index', $data);
    }

    public function laporan()
    {
        $laporanModel = new \App\Models\LaporanModel();

        $keyword = $this->request->getGet('keyword');
        $status  = $this->request->getGet('status');

        $builder = $laporanModel
            ->select('laporan.*, users.nama, layanan_laporan.nama_layanan')
            ->join('users', 'users.id_user = laporan.id_user')
            ->join('layanan_laporan', 'layanan_laporan.id_layanan = laporan.id_layanan');

        if (!empty($status)) {
            $builder->where('laporan.status', $status);
        }

        if (!empty($keyword)) {

            $builder->groupStart()
                ->like('laporan.judul', $keyword)
                ->orLike('laporan.lokasi', $keyword)
                ->orLike('laporan.status', $keyword)
                ->orLike('layanan_laporan.nama_layanan', $keyword)
            ->groupEnd();
        }

        $data['laporan'] = $builder
            ->orderBy('id_laporan', 'DESC')
            ->findAll();

        return view('admin/laporan', $data);
    }

    public function user()
    {
        $userModel = new \App\Models\UserModel();

        $keyword = $this->request->getGet('keyword');

        if (!empty($keyword)) {
            $data['user'] = $userModel
                ->groupStart()
                    ->like('nama', $keyword)
                    ->orLike('email', $keyword)
                ->groupEnd()
                ->findAll();
        } else {
            $data['user'] = $userModel->findAll();
        }

        return view('admin/user', $data);
    }

    public function notifikasi()
    {
        $notifikasiModel = new NotifikasiModel();

        $data['notifikasi'] = $notifikasiModel
            ->orderBy('id_notifikasi', 'DESC')
            ->findAll();

        return view('admin/notifikasi', $data);
    }

    public function hapusUser($id)
    {
        $userModel = new UserModel();

        $userModel->delete($id);
        return redirect()->to('admin/user')
            ->with('success', 'User berhasil dihapus');
        
    }

    
}