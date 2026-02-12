<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKategoriTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'kategori' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'comment' => 'Nama kategori pelanggaran',
            ],
            'desk' => [
                'type' => 'TEXT',
                'comment' => 'Deskripsi kategori',
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('kategori');
    }

    public function down()
    {
        $this->forge->dropTable('kategori');
    }
}
