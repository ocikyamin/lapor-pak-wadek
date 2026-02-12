<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePengaduanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'referensi_pengaduan' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
                'null' => false,
                'unique' => true,
                'comment' => 'Nomor referensi pengaduan, contoh: LAP-20260210-0001',
            ],
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'kategori_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
                'comment' => 'Foreign key ke tabel kategori',
            ],
            'kategori_text' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
                'comment' => 'Kategori custom jika user memilih Lainnya',
            ],
            'pelapor_identitas' => [
                'type' => 'ENUM',
                'constraint' => ['anonim', 'identitas'],
                'default' => 'anonim',
                'comment' => 'Tipe pelapor: anonim atau identitas',
            ],
            'pelapor_nama' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
                'comment' => 'Nama pelapor (jika tidak anonim)',
            ],
            'pelapor_kontak' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
                'comment' => 'Email atau nomor WhatsApp pelapor',
            ],
            'terlapor_jenis' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'comment' => 'Jenis pihak yang dilaporkan (Mahasiswa/Dosen/Tendik/Lainnya)',
            ],
            'terlapor_nama' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'comment' => 'Nama pihak yang dilaporkan',
            ],
            'terlapor_nim' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true,
                'comment' => 'NIM mahasiswa (jika terlapor adalah mahasiswa)',
            ],
            'terlapor_prodi_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
                'comment' => 'Foreign key ke tabel prodi',
            ],
            'kejadian_deskripsi' => [
                'type' => 'LONGTEXT',
                'comment' => 'Deskripsi detail kejadian/pelanggaran (min 20, max 2000 chars)',
            ],
            'kejadian_tgl' => [
                'type' => 'DATE',
                'comment' => 'Tanggal kejadian terjadi',
            ],
            'kejadian_lokasi' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'comment' => 'Lokasi kejadian',
            ],
            'bukti_tipe' => [
                'type' => 'ENUM',
                'constraint' => ['file', 'sosmed'],
                'default' => 'file',
                'comment' => 'Tipe bukti: file/gambar atau link sosial media',
            ],
            'lampiran' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'comment' => 'Nama file lampiran (PNG, JPG, PDF)',
            ],
            'bukti_sosmed_platform' => [
                'type' => 'ENUM',
                'constraint' => ['youtube', 'tiktok', 'instagram', 'facebook', 'linkedin'],
                'null' => true,
                'comment' => 'Platform sosial media untuk bukti',
            ],
            'bukti_sosmed_url' => [
                'type' => 'TEXT',
                'null' => true,
                'comment' => 'URL link dari sosial media',
            ],
            'is_starred' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
                'default' => 0,
                'comment' => 'Flag untuk pengaduan penting',
            ],
            'status_read' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 0,
                'comment' => 'Flag untuk status baca pengaduan',
            ],
            'status_tindakan' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'default' => '0',
                'comment' => 'Status tindakan: 0 (Baru), Dibaca, Diproses, Selesai, Ditolak',
            ],
            'tindakan_keterangan' => [
                'type' => 'LONGTEXT',
                'null' => true,
                'comment' => 'Catatan/keterangan tindakan lanjut',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => false,
                'comment' => 'Waktu pembuatan pengaduan',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'comment' => 'Waktu update terakhir',
            ],
        ]);

        // Set primary key
        $this->forge->addKey('id', true);

        // Add indexes for better query performance
        $this->forge->addKey('kategori_id');
        $this->forge->addKey('terlapor_prodi_id');
        $this->forge->addKey('pelapor_identitas');
        $this->forge->addKey('created_at');

        // Create table
        $this->forge->createTable('pengaduan');

        // Add foreign key constraints
        $this->db->query('ALTER TABLE `pengaduan` 
            ADD CONSTRAINT `fk_pengaduan_kategori` 
            FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) 
            ON DELETE SET NULL ON UPDATE CASCADE
        ');

        $this->db->query('ALTER TABLE `pengaduan` 
            ADD CONSTRAINT `fk_pengaduan_prodi` 
            FOREIGN KEY (`terlapor_prodi_id`) REFERENCES `prodi` (`id`) 
            ON DELETE SET NULL ON UPDATE CASCADE
        ');
    }

    public function down()
    {
        $this->forge->dropTable('pengaduan');
    }
}
