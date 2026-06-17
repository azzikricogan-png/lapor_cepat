<?php

namespace App\Controllers;

use App\Models\LaporanModel;
use App\Models\NotifikasiModel;
use App\Models\UserModel;

class Home extends BaseController
{
    public function index()
    {
        $id_user = session()->get('id_user');

        $data['total'] = (new LaporanModel())
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

        return view('home/index', $data);
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
            'nama'          => $user['nama'],
            'email'         => $user['email'],
            'no_hp'         => $user['no_hp'],
            'alamat'        => $user['alamat'] ?? '',
            'foto'          => $user['foto'] ?? 'default.png',
            'total_laporan' => $total_laporan,
            'proses'        => $proses,
            'selesai'       => $selesai,
            'riwayat'       => $riwayat,
            'tanggal_daftar'=> $tanggal_daftar
        ]);
    }

    //UPDATE PROFIL
    public function updateProfil()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $id_user = session()->get('id_user');
        $userModel = new UserModel();

         // ambil file foto
        $file = $this->request->getFile('foto');
        $namaFoto = null;

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $namaFoto = $file->getRandomName();
            $file->move('uploads', $namaFoto);
        }

        $data = [
            'nama'      => $this->request->getPost('nama'),
            'email'     => $this->request->getPost('email'),
            'no_hp'     => $this->request->getPost('no_hp'),
            'alamat'    => $this->request->getPost('alamat'),
        ];

        if ($namaFoto) {
            $data['foto'] = $namaFoto;
        }

        $userModel->update($id_user, $data);

    // Update session agar langsung berubah tanpa logout
        session()->set([
            'nama'  => $data['nama'],
            'email' => $data['email'],
            'no_hp' => $data['no_hp'],
            'foto'  => $namaFoto['foto'] ?? session()->get('foto')
        ]);

        return redirect()->to('/profil')
                        ->with('success', 'Profil berhasil diperbarui');
    }

    //UBAHPASSWORD
    public function ubahPassword()
    {   
        $id_user = session()->get('id_user');

        $passwordLama = $this->request->getPost('password_lama');
        $passwordBaru = $this->request->getPost('password_baru');
        $konfirmasiPassword = $this->request->getPost('konfirmasi_password');

        $userModel = new UserModel();
        $user = $userModel->find($id_user);

    // Cek password lama
        if (!password_verify($passwordLama, $user['password'])) {
            return redirect()->back()
                ->with('error', 'Password lama salah');
        }

    // Cek konfirmasi password
        if ($passwordBaru !== $konfirmasiPassword) {
            return redirect()->back()
                ->with('error', 'Konfirmasi password tidak cocok');
        }

    // Update password
        $userModel->update($id_user, [
            'password' => password_hash($passwordBaru, PASSWORD_DEFAULT)
        ]);

        return redirect()->back()
            ->with('success', 'Password berhasil diubah');
    }
    

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}