<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KategoriPelanggaranSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kategori' => 'Pelanggaran Akademik',
                'desk'     => 'Tindakan yang melanggar aturan akademik seperti mencontek, plagiarisme, dan pemalsuan data.'
            ],
            [
                'kategori' => 'Pelanggaran Disiplin',
                'desk'     => 'Tindakan yang melanggar tata tertib kampus/sekolah, seperti terlambat, tidak hadir tanpa keterangan, atau berpakaian tidak sesuai.'
            ],
            [
                'kategori' => 'Pelanggaran Etika',
                'desk'     => 'Perilaku tidak sopan, ujaran kebencian, pelecehan, atau tindakan yang merugikan pihak lain.'
            ],
            [
                'kategori' => 'Pelanggaran Administratif',
                'desk'     => 'Ketidakpatuhan terhadap prosedur administrasi atau kelengkapan dokumen.'
            ],
            [
                'kategori' => 'Pelanggaran Keamanan',
                'desk'     => 'Tindakan yang membahayakan keselamatan, seperti membawa barang terlarang atau perkelahian.'
            ],
        ];

        // Opsional: kosongkan tabel dulu
        // $this->db->table('kategori_pelanggaran')->truncate();

        $this->db->table('kategori')->insertBatch($data);
    }
}
