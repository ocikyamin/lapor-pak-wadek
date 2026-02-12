<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use \App\Models\PengaduanModel;
use \App\Models\KategoriModel;
use \App\Models\ProdiModel;
use \App\Models\PengaduanAktivitasModel;

class AdminController extends BaseController
{
    /**
     * Dashboard Analytics Page
     * Shows statistics and charts
     */
    public function index()
    {
        $pengaduanModel = new PengaduanModel();
        $aktivitasModel = new PengaduanAktivitasModel();

        // Get Statistics
        $stats = $pengaduanModel->getStatistics();

        // Get Chart Data (7 Days)
        $chart7Days = ['labels' => [], 'data' => []];
        for ($i = 6; $i >= 0; $i--) {
            $date = date('Y-m-d', strtotime("-$i days"));
            $count = $pengaduanModel->where('DATE(created_at)', $date)->countAllResults();
            $chart7Days['labels'][] = date('d M', strtotime($date));
            $chart7Days['data'][] = $count;
        }

        // Get Chart Data (30 Days)
        $chart30Days = ['labels' => [], 'data' => []];
        for ($i = 29; $i >= 0; $i--) {
            $date = date('Y-m-d', strtotime("-$i days"));
            $count = $pengaduanModel->where('DATE(created_at)', $date)->countAllResults();
            // Only show labels for every 5 days for 30 days chart to avoid crowding
            $chart30Days['labels'][] = ($i % 5 == 0) ? date('d M', strtotime($date)) : '';
            $chart30Days['data'][] = $count;
        }

        // Get Kategori Populer
        $popular_categories = $pengaduanModel->select('kategori_text, COUNT(*) as total')
            ->groupBy('kategori_text')
            ->orderBy('total', 'DESC')
            ->findAll(3);

        // Calculate percentages
        $total_reports = $stats['total'] ?: 1;
        foreach ($popular_categories as &$cat) {
            $cat['percentage'] = ROUND(($cat['total'] / $total_reports) * 100);
        }

        $data = [
            'stats' => $stats,
            'recent_reports' => $pengaduanModel->select('pengaduan.*, prodi.nm_prodi')
                ->join('prodi', 'prodi.id = pengaduan.terlapor_prodi_id', 'left')
                ->orderBy('created_at', 'DESC')
                ->findAll(5),
            'recent_activities' => $aktivitasModel->getRecentActivities(5),
            'popular_categories' => $popular_categories,
            'chart_data' => [
                'seven_days' => $chart7Days,
                'thirty_days' => $chart30Days
            ]
        ];

        return view('Admin/Dashboard', $data);
    }

    public function laporanMasuk()
    {
        $pengaduanModel = new PengaduanModel();
        $kategoriModel = new KategoriModel();
        $prodiModel = new ProdiModel();

        // Get Filter Parameters
        $search = $this->request->getGet('search');
        $status = $this->request->getGet('status');
        $kategori = $this->request->getGet('kategori');
        $jenis_terlapor = $this->request->getGet('jenis_terlapor');
        $prodi = $this->request->getGet('prodi');
        $tanggal = $this->request->getGet('tanggal');

        // Build Query
        $query = $pengaduanModel->select('pengaduan.*, prodi.nm_prodi')
            ->join('prodi', 'prodi.id = pengaduan.terlapor_prodi_id', 'left');

        if (!empty($search)) {
            $query->groupStart()
                ->like('referensi_pengaduan', $search)
                ->orLike('pelapor_nama', $search)
                ->orLike('terlapor_nama', $search)
                ->orLike('kejadian_deskripsi', $search)
                ->groupEnd();
        }

        if (!empty($status)) {
            if ($status === '0') {
                $query->groupStart()
                    ->where('status_tindakan', '0')
                    ->orWhere('status_tindakan', '')
                    ->orWhere('status_tindakan', null)
                    ->groupEnd();
            } else {
                $query->where('status_tindakan', $status);
            }
        }

        if (!empty($kategori)) {
            $query->where('pengaduan.kategori_id', $kategori);
        }

        if (!empty($jenis_terlapor)) {
            $query->where('terlapor_jenis', $jenis_terlapor);
        }

        if (!empty($prodi)) {
            $query->where('terlapor_prodi_id', $prodi);
        }

        if (!empty($tanggal)) {
            $query->where('DATE(pengaduan.created_at)', $tanggal);
        }

        $data = [
            'reports' => $query->orderBy('pengaduan.created_at', 'DESC')
                ->paginate(5, 'default'),
            'pager' => $pengaduanModel->pager,
            'stats' => $pengaduanModel->getStatistics(),
            'categories' => $kategoriModel->findAll(),
            'prodis' => $prodiModel->findAll(),
            'filters' => [
                'search' => $search,
                'status' => $status,
                'kategori' => $kategori,
                'jenis_terlapor' => $jenis_terlapor,
                'prodi' => $prodi,
                'tanggal' => $tanggal,
            ]
        ];

        return view('Admin/inbox/index', $data);
    }

    public function laporanDetail($id)
    {
        $pengaduanModel = new PengaduanModel();
        $aktivitasModel = new PengaduanAktivitasModel();

        $report = $pengaduanModel->getDetailWithProdi($id);

        if (!$report) {
            return redirect()->to(base_url('admin/laporan-masuk'))->with('error', 'Laporan tidak ditemukan.');
        }

        // Otomatis tandai dibaca dan catat aktivitas jika status masih baru
        $currentStatus = $report['status_tindakan'] ?? '0';
        $isNew = ($currentStatus == '0' || $currentStatus == '');

        if ($report['status_read'] == 0 || $isNew) {
            $updateData = [
                'id' => $id,
                'status_read' => 1
            ];
            $oldStatus = $report['status_tindakan'] ?: '0';

            if ($isNew) {
                $updateData['status_tindakan'] = 'Dibaca';

                // Log Aktivitas
                $aktivitasModel->insert([
                    'pengaduan_id' => $id,
                    'user_id' => session()->get('user_id') ?? 1,
                    'status_sebelumnya' => $oldStatus,
                    'status_sesudahnya' => 'Dibaca',
                    'catatan' => 'Laporan telah dibuka dan dibaca oleh Admin',
                ]);
            }

            // Gunakan save dengan skipValidation untuk proteksi proses otomatis
            $pengaduanModel->skipValidation(true)->save($updateData);

            // Update variabel lokal agar view menerima data terbaru
            $report['status_read'] = 1;
            if (isset($updateData['status_tindakan'])) {
                $report['status_tindakan'] = 'Dibaca';
            }
        }

        $report['activities'] = $aktivitasModel->getLogsByPengaduan($id);

        return view('Admin/inbox/detail', $report);
    }

    public function cetakLaporan($ref)
    {
        $pengaduanModel = new PengaduanModel();
        // Cari berdasarkan referensi_pengaduan instead of ID for obfuscation
        $report = $pengaduanModel->select('pengaduan.*, prodi.nm_prodi')
            ->join('prodi', 'prodi.id = pengaduan.terlapor_prodi_id', 'left')
            ->where('pengaduan.referensi_pengaduan', $ref)
            ->first();

        if (!$report) {
            return redirect()->to(base_url('admin/laporan-masuk'))->with('error', 'Laporan tidak ditemukan.');
        }

        return view('Admin/CetakLaporan', $report);
    }

    /**
     * AJAX Update Status and Notes
     */
    public function updateStatus()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(403)->setJSON(['message' => 'Forbidden']);
        }

        $id = $this->request->getPost('id');
        $status = $this->request->getPost('status');
        $catatan = $this->request->getPost('catatan');

        $pengaduanModel = new PengaduanModel();
        $aktivitasModel = new PengaduanAktivitasModel();

        $report = $pengaduanModel->find($id);
        if (!$report) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Laporan tidak ditemukan']);
        }

        $oldStatus = $report['status_tindakan'];

        // Update Pengaduan
        $dataUpdate = [
            'status_tindakan' => $status,
            'tindakan_keterangan' => $catatan
        ];

        // If status changes from '0' for the first time
        if ($oldStatus == '0' && $status != '0') {
            $dataUpdate['status_read'] = 1;
        }

        if ($pengaduanModel->update($id, $dataUpdate)) {
            // Log Activity
            $aktivitasModel->insert([
                'pengaduan_id' => $id,
                'user_id' => session()->get('user_id') ?? 1, // Fallback to 1 if session is null for dev
                'status_sebelumnya' => $oldStatus,
                'status_sesudahnya' => $status,
                'catatan' => $catatan,
            ]);

            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Status laporan berhasil diperbarui',
                'new_status' => $status,
                'updated_at' => date('d M Y, H:i') . ' WIB'
            ]);
        }

        return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal memperbarui status']);
    }
    /**
     * AJAX Toggle Star Status
     */
    public function toggleStar()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(403)->setJSON(['message' => 'Forbidden']);
        }

        $id = $this->request->getPost('id');
        $pengaduanModel = new PengaduanModel();
        $aktivitasModel = new PengaduanAktivitasModel();

        $report = $pengaduanModel->find($id);
        if (!$report) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Laporan tidak ditemukan']);
        }

        $newStar = $report['is_starred'] == 1 ? 0 : 1;

        if ($pengaduanModel->update($id, ['is_starred' => $newStar])) {
            // Log Activity
            $catatan = $newStar == 1 ? 'Menandai laporan dengan bintang' : 'Menghapus tanda bintang dari laporan';
            $aktivitasModel->insert([
                'pengaduan_id' => $id,
                'user_id' => session()->get('user_id') ?? 1,
                'status_sebelumnya' => $report['status_tindakan'] ?: '0',
                'status_sesudahnya' => $report['status_tindakan'] ?: '0',
                'catatan' => $catatan,
            ]);

            return $this->response->setJSON([
                'status' => 'success',
                'message' => $newStar == 1 ? 'Laporan ditandai bintang' : 'Tanda bintang dihapus',
                'is_starred' => $newStar
            ]);
        }

        return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal memperbarui tanda bintang']);
    }

    /**
     * AJAX Delete Laporan
     */
    public function deleteLaporan()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(403)->setJSON(['message' => 'Forbidden']);
        }

        $id = $this->request->getPost('id');
        $pengaduanModel = new PengaduanModel();

        $report = $pengaduanModel->find($id);
        if (!$report) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Laporan tidak ditemukan']);
        }

        // Delete File Attachment if exists
        if (!empty($report['lampiran'])) {
            $filePath = FCPATH . 'uploads/pengaduan/' . $report['lampiran'];
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        // Delete from Database (Aktivitas logs will be deleted by Cascade)
        if ($pengaduanModel->delete($id)) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Laporan #' . $report['referensi_pengaduan'] . ' berhasil dihapus permanen'
            ]);
        }

        return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal menghapus laporan']);
    }

    /**
     * View All Activity Logs
     */
    public function aktivitas()
    {
        $aktivitasModel = new PengaduanAktivitasModel();

        $data = [
            'activities' => $aktivitasModel->select('pengaduan_logs.*, users.username as admin_name, pengaduan.referensi_pengaduan')
                ->join('users', 'users.id = pengaduan_logs.user_id', 'left')
                ->join('pengaduan', 'pengaduan.id = pengaduan_logs.pengaduan_id', 'left')
                ->orderBy('pengaduan_logs.created_at', 'DESC')
                ->paginate(15, 'default'),
            'pager' => $aktivitasModel->pager,
            'title' => 'Log Aktivitas Sistem'
        ];

        return view('Admin/aktivitas', $data);
    }


    // Manajemen kategoriLaporan
    public function kategoriLaporan()
    {
        $kategoriModel = new KategoriModel();

        $data = [
            'title' => 'Manajemen Kategori Laporan',
            'categories' => $kategoriModel->orderBy('kategori', 'ASC')->findAll(),
        ];

        return view('Admin/Kategori/index', $data);
    }

    public function saveKategori()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(403);
        }

        $kategoriModel = new KategoriModel();
        $kategori = trim($this->request->getPost('kategori'));

        if (empty($kategori)) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Nama kategori tidak boleh kosong']);
        }

        // Check Unique Kategori
        if ($kategoriModel->where('kategori', $kategori)->first()) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Nama kategori sudah ada dalam database']);
        }

        if ($kategoriModel->insert(['kategori' => $kategori])) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Kategori berhasil ditambahkan']);
        }

        return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal menambahkan kategori']);
    }

    public function updateKategori()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(403);
        }

        $kategoriModel = new KategoriModel();
        $id = $this->request->getPost('id');
        $kategori = trim($this->request->getPost('kategori'));

        if (empty($kategori)) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Nama kategori tidak boleh kosong']);
        }

        // Check Unique Kategori (excluding current)
        if ($kategoriModel->where('kategori', $kategori)->where('id !=', $id)->first()) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Nama kategori sudah digunakan oleh kategori lain']);
        }

        if ($kategoriModel->update($id, ['kategori' => $kategori])) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Kategori berhasil diperbarui']);
        }

        return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal memperbarui kategori']);
    }

    public function deleteKategori()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(403);
        }

        $kategoriModel = new KategoriModel();
        $id = $this->request->getPost('id');

        // Check if category is used in pengaduan
        $pengaduanModel = new \App\Models\PengaduanModel();
        $isUsed = $pengaduanModel->where('kategori_id', $id)->first();

        if ($isUsed) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Kategori tidak dapat dihapus karena sedang digunakan dalam laporan']);
        }

        if ($kategoriModel->delete($id)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Kategori berhasil dihapus']);
        }

        return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal menghapus kategori']);
    }

    public function arsipLaporan()
    {
        $pengaduanModel = new PengaduanModel();
        $kategoriModel = new KategoriModel();
        $prodiModel = new ProdiModel();

        // Get Filter Parameters
        $search = $this->request->getGet('search');
        $status = $this->request->getGet('status');
        $kategori = $this->request->getGet('kategori');
        $jenis_terlapor = $this->request->getGet('jenis_terlapor');
        $prodi = $this->request->getGet('prodi');
        $tanggal = $this->request->getGet('tanggal');

        // Build Query - Focus on Archived reports (Selesai or Ditolak)
        $query = $pengaduanModel->select('pengaduan.*, prodi.nm_prodi')
            ->join('prodi', 'prodi.id = pengaduan.terlapor_prodi_id', 'left')
            ->groupStart()
            ->where('status_tindakan', 'Selesai')
            ->orWhere('status_tindakan', 'Ditolak')
            ->groupEnd();

        if (!empty($search)) {
            $query->groupStart()
                ->like('referensi_pengaduan', $search)
                ->orLike('pelapor_nama', $search)
                ->orLike('terlapor_nama', $search)
                ->orLike('kejadian_deskripsi', $search)
                ->groupEnd();
        }

        if (!empty($status)) {
            $query->where('status_tindakan', $status);
        }

        if (!empty($kategori)) {
            $query->where('pengaduan.kategori_id', $kategori);
        }

        if (!empty($jenis_terlapor)) {
            $query->where('terlapor_jenis', $jenis_terlapor);
        }

        if (!empty($prodi)) {
            $query->where('terlapor_prodi_id', $prodi);
        }

        if (!empty($tanggal)) {
            $query->where('DATE(pengaduan.created_at)', $tanggal);
        }

        $data = [
            'title' => 'Arsip Laporan Selesai',
            'reports' => $query->orderBy('pengaduan.created_at', 'DESC')
                ->paginate(10, 'default'),
            'pager' => $pengaduanModel->pager,
            'categories' => $kategoriModel->findAll(),
            'prodis' => $prodiModel->findAll(),
            'filters' => [
                'search' => $search,
                'status' => $status,
                'kategori' => $kategori,
                'jenis_terlapor' => $jenis_terlapor,
                'prodi' => $prodi,
                'tanggal' => $tanggal,
            ]
        ];

        return view('Admin/ArsipLaporan/index', $data);
    }

    public function prodi()
    {
        $prodiModel = new ProdiModel();

        $data = [
            'title' => 'Manajemen Program Studi',
            'prodis' => $prodiModel->orderBy('nm_prodi', 'ASC')->findAll(),
        ];

        return view('Admin/Prodi/index', $data);
    }

    public function saveProdi()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(403);
        }

        $prodiModel = new ProdiModel();
        $nama = $this->request->getPost('nm_prodi');

        if (empty($nama)) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Nama prodi tidak boleh kosong']);
        }

        // Check Unique Prodi
        if ($prodiModel->where('nm_prodi', $nama)->first()) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Nama program studi sudah ada']);
        }

        if ($prodiModel->insert(['nm_prodi' => $nama])) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Prodi berhasil ditambahkan']);
        }

        return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal menambahkan prodi']);
    }

    public function updateProdi()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(403);
        }

        $prodiModel = new ProdiModel();
        $id = $this->request->getPost('id');
        $nama = $this->request->getPost('nm_prodi');

        if (empty($nama)) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Nama prodi tidak boleh kosong']);
        }

        // Check Unique Prodi (excluding current)
        if ($prodiModel->where('nm_prodi', $nama)->where('id !=', $id)->first()) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Nama program studi sudah digunakan']);
        }

        if ($prodiModel->update($id, ['nm_prodi' => $nama])) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Prodi berhasil diperbarui']);
        }

        return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal memperbarui prodi']);
    }

    public function deleteProdi()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(403);
        }

        $prodiModel = new ProdiModel();
        $id = $this->request->getPost('id');

        // Check if prodi is used in pengaduan (terlapor_prodi_id)
        $pengaduanModel = new \App\Models\PengaduanModel();
        $isUsed = $pengaduanModel->where('terlapor_prodi_id', $id)->first();

        if ($isUsed) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Prodi tidak dapat dihapus karena sedang digunakan dalam data laporan']);
        }

        if ($prodiModel->delete($id)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Prodi berhasil dihapus']);
        }

        return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal menghapus prodi']);
    }

    // Kelola Users 

    public function users()
    {
        $userModel = new \App\Models\UserModel();

        $data = [
            'title' => 'Manajemen Pengguna',
            'users' => $userModel->orderBy('created_at', 'DESC')->findAll(),
        ];

        return view('Admin/Users/index', $data);
    }

    public function saveUser()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(403);
        }

        $userModel = new \App\Models\UserModel();
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        if (empty($username) || empty($email) || empty($password)) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Semua field wajib diisi']);
        }

        // Check Unique Username
        if ($userModel->where('username', $username)->first()) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Username sudah digunakan']);
        }

        // Check Unique Email
        if ($userModel->where('email', $email)->first()) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Email sudah digunakan']);
        }

        $data = [
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'is_active' => 1
        ];

        if ($userModel->insert($data)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'User berhasil ditambahkan']);
        }

        return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal menambahkan user']);
    }

    public function updateUser()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(403);
        }

        $userModel = new \App\Models\UserModel();
        $id = $this->request->getPost('id');
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $is_active = $this->request->getPost('is_active');

        if (empty($username) || empty($email)) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Username dan Email wajib diisi']);
        }

        // Check Unique Username (excluding current user)
        if ($userModel->where('username', $username)->where('id !=', $id)->first()) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Username sudah digunakan oleh akun lain']);
        }

        // Check Unique Email (excluding current user)
        if ($userModel->where('email', $email)->where('id !=', $id)->first()) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Email sudah digunakan oleh akun lain']);
        }

        $data = [
            'username' => $username,
            'email' => $email,
            'is_active' => $is_active
        ];

        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        if ($userModel->update($id, $data)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'User berhasil diperbarui']);
        }

        return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal memperbarui user']);
    }

    public function deleteUser()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(403);
        }

        $userModel = new \App\Models\UserModel();
        $id = $this->request->getPost('id');

        // Prevent self deletion if possible, though authentication context isn't fully clear here
        if ($id == session()->get('user_id')) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Anda tidak dapat menghapus akun Anda sendiri']);
        }

        if ($userModel->delete($id)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'User berhasil dihapus']);
        }

        return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal menghapus user']);
    }

    public function getNotificationCount()
    {
        $pengaduanModel = new \App\Models\PengaduanModel();

        return $this->response->setJSON([
            'unread' => $pengaduanModel->where('status_read', 0)->countAllResults(),
            'total' => $pengaduanModel->countAllResults(),
            'selesai' => $pengaduanModel->where('status_tindakan', 'Selesai')->countAllResults(),
        ]);
    }

}

