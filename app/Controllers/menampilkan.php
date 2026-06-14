<?php

namespace App\Controllers;

use App\Models\LaporanModel;

class Menampilkan extends BaseController
{
    public function index()
    

    {
        $model = new LaporanModel();
        $laporan = $model->findAll();

        foreach ($laporan as $row) {

            echo "<h3>Judul: " . $row['judul'] . "</h3>";
            echo "Deskripsi: " . $row['deskripsi'] . "<br>";
            echo "Lokasi: " . $row['lokasi'] . "<br>";
            echo "Status: " . $row['status'] . "<br>";

            // tampilkan gambar jika ada
            if (!empty($row['foto'])) {
                echo '<img src="' . base_url('uploads/' . $row['foto']) . '" width="200">';
            } else {
                echo "Tidak ada foto<br>";
            }

            echo "<hr>";
        }
    }
}