<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
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
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 60,
                'unique'     => true,
                'comment'    => 'Email admin',
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'comment'    => 'Password hash',
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => 60,
                'unique'     => true,
                'comment'    => 'Username admin',
            ],
            'is_active' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 1,
                'comment'    => 'Status aktif (0/1)',
            ],
            'created_at' => [
                'type'    => 'TIMESTAMP',
                'default' => new \CodeIgniter\Database\RawSql('CURRENT_TIMESTAMP'),
                'comment' => 'Waktu dibuat',
            ],
            'updated_at' => [
                'type'    => 'TIMESTAMP',
                'default' => new \CodeIgniter\Database\RawSql('CURRENT_TIMESTAMP'),
                'null'    => true,
                'comment' => 'Waktu update terakhir',
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
