<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProdiSeeder extends Seeder
{
    public function run()
    {
          $data = [
            ['nm_prodi' => 'Teknik Informatika'],
            ['nm_prodi' => 'Sistem Informasi'],
            ['nm_prodi' => 'Teknik Komputer'],
            ['nm_prodi' => 'Manajemen Informatika'],
            ['nm_prodi' => 'Rekayasa Perangkat Lunak'],
        ];

        // Insert banyak data sekaligus
        $this->db->table('prodi')->insertBatch($data);
    }
}
