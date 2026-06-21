<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTanggapan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_tanggapan' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_laporan' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'id_user' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'isi_tanggapan' => [
                'type' => 'TEXT',
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

        $this->forge->addKey('id_tanggapan', true);

        $this->forge->addForeignKey(
            'id_laporan',
            'laporan',
            'id_laporan',
            'CASCADE',
            'CASCADE'
        );

        $this->forge->addForeignKey(
            'id_user',
            'users',
            'id_user',
            'CASCADE',
            'CASCADE'
        );

        $this->forge->createTable('tanggapan');
    }

    public function down()
    {
        $this->forge->dropTable('tanggapan');
    }
}
