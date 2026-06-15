<?php

namespace App\Controllers;

use App\Models\UserModel;

class Admin extends BaseController
{
   public function index()
    {
    // Harus login
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

    // Harus admin
        if (session()->get('role') != 'admin') {
            return redirect()->to('/login');
        }

        $userModel = new UserModel();

        $data['user'] = $userModel
            ->orderBy('id_user', 'DESC')
            ->findAll(5);

        return view('admin/index', $data);
    }
}