<?php

namespace App\Models;

use CodeIgniter\Model;

class PengaduanModel extends Model
{
    protected $table = 'pengaduan';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'referensi_pengaduan',
        'kategori_id',
        'kategori_text',
        'pelapor_identitas',
        'pelapor_nama',
        'pelapor_kontak',
        'terlapor_jenis',
        'terlapor_nama',
        'terlapor_nim',
        'terlapor_prodi_id',
        'kejadian_deskripsi',
        'kejadian_tgl',
        'kejadian_lokasi',
        'bukti_tipe',
        'lampiran',
        'bukti_sosmed_platform',
        'bukti_sosmed_url',
        'is_starred',
        'status_read',
        'status_tindakan',
        'tindakan_keterangan',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // Validation
    protected $validationRules = [
        'referensi_pengaduan' => 'required|string|max_length[30]|is_unique[pengaduan.referensi_pengaduan]',
        'kategori_id' => 'permit_empty|integer',
        'kategori_text' => 'permit_empty|string|max_length[255]',
        'pelapor_identitas' => 'required|in_list[anonim,identitas]',
        'pelapor_nama' => 'permit_empty|string|max_length[255]',
        'pelapor_kontak' => 'permit_empty|string|max_length[255]',
        'terlapor_jenis' => 'required|in_list[Mahasiswa,Dosen,Tendik,Lainnya]',
        'terlapor_nama' => 'required|string|max_length[255]',
        'terlapor_nim' => 'permit_empty|string|max_length[20]',
        'terlapor_prodi_id' => 'permit_empty|integer',
        'kejadian_deskripsi' => 'required|string|min_length[20]|max_length[2000]',
        'kejadian_tgl' => 'required|valid_date',
        'kejadian_lokasi' => 'permit_empty|string|max_length[255]',
        'bukti_tipe' => 'in_list[file,sosmed]',
        'lampiran' => 'permit_empty|string|max_length[255]',
        'bukti_sosmed_platform' => 'permit_empty|in_list[youtube,tiktok,instagram,facebook,linkedin,twitter,other]',
        'bukti_sosmed_url' => 'permit_empty|valid_url',
        'is_starred' => 'permit_empty|in_list[0,1]',
        'status_read' => 'permit_empty|in_list[0,1]',
        'status_tindakan' => 'permit_empty|string|max_length[20]',
        'tindakan_keterangan' => 'permit_empty|string',
    ];

    protected $validationMessages = [
        'kategori_id' => [
            'integer' => 'Kategori harus berupa angka',
        ],
        'pelapor_identitas' => [
            'required' => 'Tipe pelapor harus dipilih',
            'in_list' => 'Tipe pelapor tidak valid',
        ],
        'terlapor_jenis' => [
            'required' => 'Jenis pihak yang dilaporkan harus dipilih',
            'in_list' => 'Jenis pihak tidak valid',
        ],
        'terlapor_nama' => [
            'required' => 'Nama pihak yang dilaporkan harus diisi',
        ],
        'kejadian_deskripsi' => [
            'required' => 'Deskripsi kejadian harus diisi',
            'min_length' => 'Deskripsi minimal 20 karakter',
            'max_length' => 'Deskripsi maksimal 2000 karakter',
        ],
        'kejadian_tgl' => [
            'required' => 'Tanggal kejadian harus diisi',
            'valid_date' => 'Format tanggal tidak valid',
        ],

        'bukti_sosmed_url' => [
            'valid_url' => 'URL tidak valid',
        ],
    ];

    /**
     * Get pengaduan detail dengan join ke tabel prodi
     * 
     * @param int $id
     * @return array|null
     */
    public function getDetailWithProdi($id)
    {
        return $this->select('pengaduan.*, prodi.nm_prodi')
            ->join('prodi', 'prodi.id = pengaduan.terlapor_prodi_id', 'left')
            ->where('pengaduan.id', $id)
            ->first();
    }

    /**
     * Get pengaduan dengan filter dan pagination
     * 
     * @param int $perPage
     * @param int $page
     * @param array $filters
     * @return array
     */
    /**
     * Get all pengaduan with prodi name
     * 
     * @return array
     */
    public function getPengaduanList()
    {
        return $this->select('pengaduan.*, prodi.nm_prodi')
            ->join('prodi', 'prodi.id = pengaduan.terlapor_prodi_id', 'left')
            ->orderBy('pengaduan.created_at', 'DESC')
            ->findAll();
    }

    public function getPengaduanPaginated($perPage = 10, $page = 1, $filters = [])
    {
        $query = $this->select();

        // Apply filters
        if (!empty($filters['pelapor_identitas'])) {
            $query->where('pelapor_identitas', $filters['pelapor_identitas']);
        }
        if (!empty($filters['terlapor_jenis'])) {
            $query->where('terlapor_jenis', $filters['terlapor_jenis']);
        }
        if (!empty($filters['status_tindakan'])) {
            $query->where('status_tindakan', $filters['status_tindakan']);
        }
        if (!empty($filters['kategori_id'])) {
            $query->where('kategori_id', $filters['kategori_id']);
        }
        if (!empty($filters['search'])) {
            $query->groupStart()
                ->like('terlapor_nama', $filters['search'])
                ->orLike('kejadian_deskripsi', $filters['search'])
                ->orLike('kejadian_lokasi', $filters['search'])
                ->groupEnd();
        }

        return [
            'total' => $query->countAllResults(false),
            'data' => $query->orderBy('created_at', 'DESC')
                ->paginate($perPage, 'default', $page - 1),
            'pager' => $this->pager,
            'perPage' => $perPage,
            'page' => $page,
        ];
    }

    /**
     * Get pengaduan by pelapor (anonim atau identitas)
     * 
     * @param string $identitas
     * @return array
     */
    public function getByIdentitas($identitas)
    {
        return $this->where('pelapor_identitas', $identitas)
            ->orderBy('created_at', 'DESC')
            ->findAll();
    }

    /**
     * Get pengaduan by jenis terlapor
     * 
     * @param string $jenis
     * @return array
     */
    public function getByJenisTerlapor($jenis)
    {
        return $this->where('terlapor_jenis', $jenis)
            ->orderBy('created_at', 'DESC')
            ->findAll();
    }

    /**
     * Get pengaduan dengan bukti sosial media
     * 
     * @return array
     */
    public function getWithSosmedProof()
    {
        return $this->where('bukti_tipe', 'sosmed')
            ->where('bukti_sosmed_url !=', null)
            ->orderBy('created_at', 'DESC')
            ->findAll();
    }

    /**
     * Get pengaduan dengan file attachment
     * 
     * @return array
     */
    public function getWithFileProof()
    {
        return $this->where('bukti_tipe', 'file')
            ->where('lampiran !=', null)
            ->orderBy('created_at', 'DESC')
            ->findAll();
    }

    /**
     * Update status pengaduan
     * 
     * @param int $id
     * @param array $status
     * @return bool
     */
    public function updateStatus($id, $status = [])
    {
        return $this->update($id, [
            'is_starred' => $status['is_starred'] ?? 0,
            'status_read' => $status['status_read'] ?? 0,
            'status_tindakan' => $status['status_tindakan'] ?? 0,
            'tindakan_keterangan' => $status['tindakan_keterangan'] ?? null,
        ]);
    }

    /**
     * Get pengaduan yang sudah ditandai (starred)
     * 
     * @return array
     */
    public function getStarred()
    {
        return $this->where('is_starred', true)
            ->orderBy('created_at', 'DESC')
            ->findAll();
    }

    /**
     * Get pengaduan yang belum dibaca
     * 
     * @return array
     */
    public function getUnread()
    {
        return $this->where('status_read', false)
            ->orderBy('created_at', 'DESC')
            ->findAll();
    }

    /**
     * Get statistik pengaduan
     * 
     * @return array
     */
    public function getStatistics()
    {
        return [
            'total' => $this->countAll(),
            'unread' => $this->builder()->where('status_read', 0)->countAllResults(),
            'baru' => $this->builder()->where('status_tindakan', '0')->countAllResults(),
            'diproses' => $this->builder()->where('status_tindakan', 'Diproses')->countAllResults(),
            'selesai' => $this->builder()->where('status_tindakan', 'Selesai')->countAllResults(),
            'anonim' => $this->builder()->where('pelapor_identitas', 'anonim')->countAllResults(),
            'identitas' => $this->builder()->where('pelapor_identitas', 'identitas')->countAllResults(),
        ];
    }
}
