<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        // Password plaintext (hanya untuk seeder)
        $defaultPassword = password_hash('admin123', PASSWORD_BCRYPT);

        $data = [
            [
                'email' => 'admin@kampus.ac.id',
                'username' => 'admin',
                'password' => $defaultPassword,
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'email' => 'wadek3@kampus.ac.id',
                'username' => 'wadek3',
                'password' => password_hash('wadek123', PASSWORD_BCRYPT),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Opsional: kosongkan tabel dulu
        // $this->db->table('users')->truncate();

        $this->db->table('users')->insertBatch($data);
    }
}
