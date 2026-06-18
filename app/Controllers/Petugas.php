<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\LaporanModel;
use App\Models\LayananLaporanModel;
use App\Models\TanggapanModel;
use App\Models\notifikasiModel;

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
        $laporanModel    = new LaporanModel();
        $notifikasiModel = new NotifikasiModel();

        $id_laporan = $this->request->getPost('id_laporan');
        $status     = $this->request->getPost('status');

        // Ambil data laporan
        $laporan = $laporanModel->find($id_laporan);

        // Update status laporan
        $laporanModel->update($id_laporan, [
        'status' => $status
        ]);

        // Kirim notifikasi ke pemilik laporan
        if ($laporan) {

            if ($status == 'Diproses') {
                $pesan = 'Laporan Anda sedang diproses oleh petugas.';
            } elseif ($status == 'Selesai') {
                $pesan = 'Laporan Anda telah selesai ditangani.';
            } elseif ($status == 'Ditolak') {
                $pesan = 'Laporan Anda ditolak oleh petugas.';
            } else {
                $pesan = 'Status laporan Anda diperbarui menjadi '.$status;
            }

            $notifikasiModel->insert([
                'id_user'      => $laporan['id_user'],
                'pesan'        => $pesan,
                'status_baca'  => 'belum_dibaca',
                'created_at'   => date('Y-m-d H:i:s')
            ]);
        }

        return redirect()->to('/petugas/laporan')
                        ->with('success', 'Status berhasil diperbarui');
    }

    public function notifikasi()
    {
        $notifikasiModel = new \App\Models\NotifikasiModel();

        $data['notifikasi'] = $notifikasiModel
        ->where('status_baca', 'belum_dibaca')
        ->orderBy('created_at', 'DESC')
        ->findAll();

        return view('petugas/notifikasi', $data);
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
    
    public function simpanTanggapan()
    {  
        // 🔐 hanya petugas
        if (session()->get('role') !== 'petugas') {
            return redirect()->back()->with('error', 'Akses ditolak');
        }

        $tanggapanModel = new TanggapanModel();

        $isi = $this->request->getPost('isi_tanggapan');

        if (!$isi) {
            return redirect()->back()->with('error', 'Tanggapan tidak boleh kosong');
        }

        $data = [
            'id_laporan'    => $this->request->getPost('id_laporan'),
            'id_user'       => session()->get('id_user'),
            'isi_tanggapan' => $isi,
        ];

        $tanggapanModel->insert($data);

        return redirect()->to('/petugas/laporan')
                        ->with('success', 'Tanggapan berhasil dikirim');
    }


    public function readNotifikasi($id)
    {
        $notifikasiModel = new NotifikasiModel();

        $notifikasiModel->update($id, [
        'status_baca' => 'sudah_dibaca'
    ]);



    return redirect()->to('/petugas/notifikasi');
    }
}