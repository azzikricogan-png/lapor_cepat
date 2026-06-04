<?php

namespace App\Models;

use CodeIgniter\Model;

class NotifikasiModel extends Model
{
    protected $table      = 'notifikasi';
    protected $primaryKey = 'id_notifikasi';

    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;

    protected $allowedFields = [
        'id_user',
        'pesan',
        'status_baca'
    ];
}