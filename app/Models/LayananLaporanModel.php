<?php

namespace App\Models;

use CodeIgniter\Model;

class LayananLaporanModel extends Model
{
    protected $table      = 'layanan_laporan';
    protected $primaryKey = 'id_layanan';

    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;

    protected $allowedFields = [
        'nama_layanan',
        'deskripsi',
        'status'
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}