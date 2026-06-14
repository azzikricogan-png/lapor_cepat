<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    // =========================
    // HALAMAN LOGIN
    // =========================
    public function login()
    {
        return view('auth/login');
    }

    // =========================
    // PROSES LOGIN
    // =========================
    public function homex()
    {
        $model = new UserModel();

        $user = $model
            ->where('email', $this->request->getPost('email'))
            ->first();

        if (
            $user &&
            password_verify(
                $this->request->getPost('password'),
                $user['password']
            )
        ) {

            session()->set([
                'id_user'   => $user['id_user'],
                'nama'      => $user['nama'],
                'email'     => $user['email'],
                'role'      => $user['role'],
                'logged_in' => true
            ]);

            // Redirect sesuai role
            if ($user['role'] == 'admin') {
                return redirect()->to('/admin');
            }elseif ($user['role'] == 'petugas') {
                return redirect()->to('/petugas');
            }else { //masyarakat
                return redirect()->to('/home');
            }
        }

       return redirect()
        ->to('/login')
        ->with('error', 'Email atau password salah');
    }

    // =========================
    // HALAMAN REGISTER
    // =========================
    public function register()
    {
        return view('auth/register');
    }

    // =========================
    // PROSES REGISTER
    // =========================
    public function store()
    {
        // Cek password dan konfirmasi password
        if (
            $this->request->getPost('password') !=
            $this->request->getPost('konfirmasi_password')
        ) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Konfirmasi password tidak cocok');
        }

        $model = new UserModel();

        // Cek email sudah terdaftar
        $cekEmail = $model
            ->where('email', $this->request->getPost('email'))
            ->first();

        if ($cekEmail) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Email sudah terdaftar');
        }

        // Simpan data user
        $model->save([
            'nama'     => $this->request->getPost('nama'),
            'role'     => $this->request->getPost('role'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            ),
            'role'     => 'masyarakat', 'petugas'
        ]);

        return redirect()
            ->to('/login')
            ->with('success', 'Registrasi berhasil, silakan login');
    }

    // =========================
    // LOGOUT
    // =========================
    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }
}