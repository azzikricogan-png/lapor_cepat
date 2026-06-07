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

            return redirect()->to('/home');
        }

        return redirect()
            ->back()
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
        $model = new UserModel();

        // Cek email sudah ada atau belum
        $cekEmail = $model
            ->where('email', $this->request->getPost('email'))
            ->first();

        if ($cekEmail) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Email sudah terdaftar');
        }

        $model->save([
            'nama'     => $this->request->getPost('nama'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            ),
            'no_hp'    => $this->request->getPost('no_hp'),
            'role'     => 'user'
        ]);

        return redirect()
            ->to('/login')
            ->with('success', 'Registrasi berhasil, silakan login');
    }

    // =========================
    // HALAMAN HOME
    // =========================
    public function home()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        return view('home');
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