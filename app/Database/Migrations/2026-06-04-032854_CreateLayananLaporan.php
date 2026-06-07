<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLayananLaporan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_layanan' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_layanan' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'deskripsi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['aktif', 'nonaktif'],
                'default' => 'aktif',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id_layanan', true);
        $this->forge->createTable('layanan_laporan');
    }

    public function down()
    {
        $this->forge->dropTable('layanan_laporan');
    }
}

