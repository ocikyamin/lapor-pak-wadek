<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateJenisTeraporTable extends Migration
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
            'jenis' => [
                'type'       => 'VARCHAR',
                'constraint' => 60,
                'comment'    => 'Jenis pihak yang dilaporkan (Mahasiswa/Dosen/Tendik/Lainnya)',
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('jenis_terlapor');
    }

    public function down()
    {
        $this->forge->dropTable('jenis_terlapor');
    }
}
