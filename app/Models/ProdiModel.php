<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdiModel extends Model
{
    protected $table = 'prodi';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = false;
    protected $allowedFields = ['nm_prodi'];

    protected $validationRules = [
        'nm_prodi' => 'required|min_length[3]|is_unique[prodi.nm_prodi,id,{id}]'
    ];

    protected $validationMessages = [
        'nm_prodi' => [
            'required' => 'Nama program studi harus diisi',
            'is_unique' => 'Nama program studi sudah ada dalam database',
            'min_length' => 'Nama program studi minimal 3 karakter'
        ]
    ];
}
