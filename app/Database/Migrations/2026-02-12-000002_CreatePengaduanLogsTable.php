<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePengaduanLogsTable extends Migration
{
    public function up()
    {
        // Jika tabel sudah ada (mungkin bekas migration sebelumnya yang gagal/setengah jalan)
        if ($this->db->tableExists('pengaduan_logs')) {
            // Pastikan kolom-kolom yang dibutuhkan ada
            $fieldsToFix = [];

            if (!$this->db->fieldExists('user_id', 'pengaduan_logs')) {
                $fieldsToFix['user_id'] = [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                    'null' => true,
                    'after' => 'pengaduan_id'
                ];
            }

            if (!$this->db->fieldExists('status_sebelumnya', 'pengaduan_logs')) {
                $fieldsToFix['status_sebelumnya'] = [
                    'type' => 'VARCHAR',
                    'constraint' => 20,
                    'null' => true,
                    'after' => 'user_id'
                ];
            }

            if (!$this->db->fieldExists('status_sesudahnya', 'pengaduan_logs')) {
                $fieldsToFix['status_sesudahnya'] = [
                    'type' => 'VARCHAR',
                    'constraint' => 20,
                    'null' => true,
                    'after' => 'status_sebelumnya'
                ];
            }

            if (!$this->db->fieldExists('catatan', 'pengaduan_logs')) {
                $fieldsToFix['catatan'] = [
                    'type' => 'TEXT',
                    'null' => true,
                    'after' => 'status_sesudahnya'
                ];
            }

            if (!empty($fieldsToFix)) {
                $this->forge->addColumn('pengaduan_logs', $fieldsToFix);
            }
        } else {
            // Jika tabel belum ada, buat baru secara lengkap
            $this->forge->addField([
                'id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                    'auto_increment' => true,
                ],
                'pengaduan_id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                    'null' => true,
                ],
                'user_id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                    'null' => true,
                    'comment' => 'ID Admin jika ini aktivitas admin',
                ],
                'status_sebelumnya' => [
                    'type' => 'VARCHAR',
                    'constraint' => 20,
                    'null' => true,
                ],
                'status_sesudahnya' => [
                    'type' => 'VARCHAR',
                    'constraint' => 20,
                    'null' => true,
                ],
                'catatan' => [
                    'type' => 'TEXT',
                    'null' => true,
                ],
                'ip_address' => [
                    'type' => 'VARCHAR',
                    'constraint' => 45,
                    'null' => true,
                ],
                'agent_string' => [
                    'type' => 'TEXT',
                    'null' => true,
                ],
                'created_at' => [
                    'type' => 'DATETIME',
                    'null' => true,
                ],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey('pengaduan_id');
            $this->forge->createTable('pengaduan_logs');

            // Tambahkan foreign key
            $this->db->query('ALTER TABLE `pengaduan_logs` 
                ADD CONSTRAINT `fk_logs_pengaduan` 
                FOREIGN KEY (`pengaduan_id`) REFERENCES `pengaduan` (`id`) 
                ON DELETE CASCADE ON UPDATE CASCADE
            ');
        }
    }

    public function down()
    {
        $this->forge->dropTable('pengaduan_logs');
    }
}
