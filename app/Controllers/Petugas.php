<?php

namespace App\Controllers;
use App\Models\UserModel;
class Petugas extends BaseController
{
    public function profil()
    {
        return view('petugas/profil');
    }


    public function index()
    {
        return view('petugas/index');
    }


    public function laporan()
    {
        return view('petugas/laporan');
    }

    public function notifikasi()
    {
        return view('petugas/notifikasi');
    }


     // UPDATE PROFIL
    public function updateProfil()
    {
        $userModel = new UserModel();

        $id_user = session()->get('id_user');

        $userModel->update($id_user, [
            'nama'  => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'no_hp' => $this->request->getPost('no_hp')
        ]);

        // Update session juga
        session()->set([
            'nama'  => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'no_hp' => $this->request->getPost('no_hp')
        ]);

        return redirect()->to('/petugas/profil')
                         ->with('success', 'Profil berhasil diperbarui');
    }
}