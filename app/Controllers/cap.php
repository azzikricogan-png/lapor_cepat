<?php

namespace App\Controllers;

class cap extends BaseController
{
    public function index()
    {
        echo password_hash("123", PASSWORD_DEFAULT);
    }
}