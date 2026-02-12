<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = false;
    protected $allowedFields = ['kategori'];

    protected $validationRules = [
        'kategori' => 'required|min_length[3]|is_unique[kategori.kategori,id,{id}]'
    ];

    protected $validationMessages = [
        'kategori' => [
            'required' => 'Nama kategori harus diisi',
            'is_unique' => 'Nama kategori sudah ada dalam database',
            'min_length' => 'Nama kategori minimal 3 karakter'
        ]
    ];

}
