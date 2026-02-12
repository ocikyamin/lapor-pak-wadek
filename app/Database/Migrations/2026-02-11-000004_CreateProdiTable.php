<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProdiTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nm_prodi' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'comment'    => 'Nama program studi',
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('prodi');
    }

    public function down()
    {
        $this->forge->dropTable('prodi');
    }
}
