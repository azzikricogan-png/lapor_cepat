<?php

namespace App\Controllers;

use App\Models\LaporanModel;
use App\Models\NotifikasiModel;

class BuatLaporan extends BaseController
{
    public function index()
    {
        // 🔥 CEK LOGIN
        if (!session()->get('id_user')) {
            return redirect()->to('/login');
        }

        return view('buatlaporan/index');
    }

    public function simpan()
    {
        if (!session()->get('id_user')) {
            return redirect()->to('/login');
        }

        $laporanModel = new LaporanModel();

        $id_user = session()->get('id_user');

    // =========================
    // AMBIL LOKASI (LAT LNG)
    // =========================
        $lokasi = $this->request->getPost('lokasi'); 
        $alamat = $lokasi; // default kalau gagal

        if (!empty($lokasi)) {
            $coords = explode(',', $lokasi);

            if (count($coords) == 2) {
                $lat = $coords[0];
                $lng = $coords[1];

            // =========================
            // REVERSE GEOCODING GRATIS
            // OPENSTREETMAP
            // =========================
                $url = "https://nominatim.openstreetmap.org/reverse?format=json&lat=$lat&lon=$lng";

                $context = stream_context_create([
                    'http' => [
                        'header' => "User-Agent: CI4 App\r\n"
                    ]
                ]);

                $response = @file_get_contents($url, false, $context);

                if ($response) {
                    $data = json_decode($response, true);
                    $alamat = $data['display_name'] ?? $lokasi;
                }
            }
        }

    // =========================
    // UPLOAD FOTO
    // =========================
        $file = $this->request->getFile('foto');
        $namaFoto = null;

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $namaFoto = $file->getRandomName();
            $file->move('uploads', $namaFoto);
        }

    // =========================
    // SIMPAN KE DATABASE
    // =========================
        $laporanModel->insert([
            'id_user'     => $id_user,
            'id_layanan'  => $this->request->getPost('id_layanan'),
            'judul'       => $this->request->getPost('judul'),
            'deskripsi'   => $this->request->getPost('deskripsi'),
            'lokasi'      => $alamat, // 🔥 SUDAH JADI TEKS
            'foto'        => $namaFoto,
            'status'      => 'Menunggu'
        ]);

        // Notifikasi untuk pelapor
        $notifikasiModel = new NotifikasiModel();

        $notifikasiModel->insert([
            'id_user'      => $id_user,
            'pesan'        => 'Laporan Anda berhasil dikirim dan sedang menunggu verifikasi petugas.',
            'status_baca'  => 'belum_dibaca',
            'created_at'   => date('Y-m-d H:i:s')
        ]);

        // Notifikasi untuk petugas
        $notifikasiModel->insert([
            'id_user'      => $id_user,
            'pesan'        => 'Laporan baru masuk: '.$this->request->getPost('judul'),
            'status_baca'  => 'belum_dibaca',
            'created_at'   => date('Y-m-d H:i:s')
        ]);

        //sukses
        session()->setFlashdata('success', 'Laporan berhasil terkirim');

        return redirect()->to('/buat_laporan');
    }
}