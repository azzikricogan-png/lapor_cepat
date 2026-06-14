<?php

namespace App\Controllers;

use App\Models\UserModel;

class Admin extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();

        $data['user'] = $userModel
            ->orderBy('id_user', 'DESC')
            ->findAll(5); // tampilkan 5 user terbaru

        return view('admin/index', $data);
    }
}