<?php

namespace App\Models;

use CodeIgniter\Model;

class PengaduanAktivitasModel extends Model
{
    protected $table = 'pengaduan_logs';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'pengaduan_id',
        'user_id',
        'status_sebelumnya',
        'status_sesudahnya',
        'catatan',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = ''; // We don't need updated_at for logs

    /**
     * Get activity logs with user info
     */
    public function getLogsByPengaduan($pengaduanId)
    {
        return $this->select('pengaduan_logs.*, users.username as admin_name')
            ->join('users', 'users.id = pengaduan_logs.user_id', 'left')
            ->where('pengaduan_id', $pengaduanId)
            ->orderBy('created_at', 'DESC')
            ->findAll();
    }

    /**
     * Get global recent activities for dashboard
     */
    public function getRecentActivities($limit = 5)
    {
        return $this->select('pengaduan_logs.*, users.username as admin_name, pengaduan.referensi_pengaduan, pengaduan.kategori_text')
            ->join('users', 'users.id = pengaduan_logs.user_id', 'left')
            ->join('pengaduan', 'pengaduan.id = pengaduan_logs.pengaduan_id', 'left')
            ->orderBy('pengaduan_logs.created_at', 'DESC')
            ->findAll($limit);
    }
}
