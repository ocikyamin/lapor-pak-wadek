<?php

namespace App\Controllers;

use App\Models\PengaduanModel;

class PengaduanController extends BaseController
{
    protected $pengaduanModel;
    protected $helpers = ['form', 'url'];

    // Konfigurasi upload file
    protected $uploadPath = 'uploads/pengaduan/'; // Consolidated with AdminController
    protected $allowedMimes = ['image/png', 'image/jpeg', 'application/pdf'];
    protected $maxFileSize = 10485760; // 10MB in bytes

    public function __construct()
    {
        $this->pengaduanModel = new PengaduanModel();
    }

    /**
     * Submit form pengaduan via AJAX
     */
    public function Submit()
    {
        // Hanya terima POST request AJAX
        if (!$this->request->isAJAX() || strtolower($this->request->getMethod()) !== 'post') {
            return $this->response
                ->setStatusCode(400)
                ->setJSON([
                    'success' => false,
                    'message' => 'Invalid request method'
                ]);
        }

        try {
            // Get form data
            $data = [
                'pelapor_identitas' => $this->request->getPost('pelapor_identitas'),
                'pelapor_nama' => $this->request->getPost('pelapor_nama'),
                'pelapor_kontak' => $this->request->getPost('pelapor_kontak'),
                'kategori_id' => $this->request->getPost('kategori_id'),
                'kategori_text' => $this->request->getPost('kategori_text'),
                'terlapor_jenis' => $this->request->getPost('terlapor_jenis'),
                'terlapor_nama' => $this->request->getPost('terlapor_nama'),
                'terlapor_nim' => $this->request->getPost('terlapor_nim'),
                'terlapor_prodi_id' => $this->request->getPost('terlapor_prodi_id'),
                'kejadian_deskripsi' => $this->request->getPost('kejadian_deskripsi'),
                'kejadian_tgl' => $this->request->getPost('kejadian_tgl'),
                'kejadian_lokasi' => $this->request->getPost('kejadian_lokasi'),
                'bukti_tipe' => $this->request->getPost('bukti_tipe'),
                'bukti_sosmed_platform' => $this->request->getPost('sosmed_platform'),
                'bukti_sosmed_url' => $this->request->getPost('sosmed_url'),
            ];

            // Cast integer fields
            if (!empty($data['kategori_id']) && is_numeric($data['kategori_id'])) {
                $data['kategori_id'] = (int) $data['kategori_id'];
            } else {
                $data['kategori_id'] = null;
            }

            if (!empty($data['terlapor_prodi_id']) && is_numeric($data['terlapor_prodi_id'])) {
                $data['terlapor_prodi_id'] = (int) $data['terlapor_prodi_id'];
            } else {
                $data['terlapor_prodi_id'] = null;
            }

            // Hapus field kosong/null agar permit_empty benar-benar bekerja
            if (empty($data['terlapor_prodi_id'])) {
                unset($data['terlapor_prodi_id']);
            }
            if ($data['bukti_tipe'] !== 'sosmed') {
                unset($data['bukti_sosmed_platform']);
                unset($data['bukti_sosmed_url']);
            }

            // Generate nomor referensi_pengaduan unik
            $data['referensi_pengaduan'] = $this->generateReferensiPengaduan();

            // Validasi data di backend
            if (!$this->validateData($data)) {
                return $this->response
                    ->setStatusCode(422)
                    ->setJSON([
                        'success' => false,
                        'message' => 'Validasi data gagal',
                        'errors' => $this->validator->getErrors()
                    ]);
            }

            // Handle file upload jika ada
            $data['lampiran'] = null;
            if ($data['bukti_tipe'] === 'file') {
                $fileName = $this->handleFileUpload();
                if ($fileName === false) {
                    $errors = $this->validator->getErrors();
                    return $this->response
                        ->setStatusCode(422)
                        ->setJSON([
                            'success' => false,
                            'message' => 'File tidak dapat diunggah',
                            'errors' => $errors ?: ['lampiran' => 'Pilih file bukti yang valid']
                        ]);
                }
                $data['lampiran'] = $fileName;
            }

            // Set default values (sesuai kebutuhan AdminController)
            $data['is_starred'] = 0;
            $data['status_read'] = 0;
            $data['status_tindakan'] = '0';

            // Save ke database
            if (!$this->pengaduanModel->insert($data)) {
                return $this->response
                    ->setStatusCode(500)
                    ->setJSON([
                        'success' => false,
                        'message' => 'Gagal menyimpan pengaduan ke database',
                        'errors' => $this->pengaduanModel->errors()
                    ]);
            }

            // Get ID dari pengaduan yang baru dibuat
            $pengaduanId = $this->pengaduanModel->getInsertID();

            return $this->response
                ->setStatusCode(201)
                ->setJSON([
                    'success' => true,
                    'message' => 'Pengaduan berhasil dikirimkan',
                    'data' => [
                        'pengaduan_id' => $pengaduanId,
                        'referensi_pengaduan' => $data['referensi_pengaduan'],
                        'timestamp' => date('Y-m-d H:i:s')
                    ]
                ]);

        } catch (\Exception $e) {
            log_message('error', 'Pengaduan Submit Error: ' . $e->getMessage());

            return $this->response
                ->setStatusCode(500)
                ->setJSON([
                    'success' => false,
                    'message' => 'Terjadi kesalahan server',
                    'error' => ENVIRONMENT === 'development' ? $e->getMessage() : null
                ]);
        }
    }

    /**
     * Halaman sukses submit
     */
    public function successSubmit($id = null)
    {
        if (!$id) {
            return redirect()->to(base_url());
        }

        // Cari berdasarkan referensi_pengaduan
        $pengaduan = $this->pengaduanModel->where('referensi_pengaduan', $id)->first();

        return view('Landing/referensi_info', [
            'pengaduan' => $pengaduan,
            'referensi_pengaduan' => $pengaduan['referensi_pengaduan'] ?? $id
        ]);
    }

    /**
     * Generate nomor referensi pengaduan unik, format: LAP-YYYYMMDD-xxxx
     */
    protected function generateReferensiPengaduan()
    {
        $date = date('Ymd');
        // Hitung jumlah pengaduan hari ini
        $count = $this->pengaduanModel
            ->where('DATE(created_at)', date('Y-m-d'))
            ->countAllResults();
        $next = str_pad($count + 1, 4, '0', STR_PAD_LEFT);
        return 'LAP-' . $date . '-' . $next;
    }

    /**
     * Handle file upload dengan validasi ketat
     */
    protected function handleFileUpload()
    {
        $file = $this->request->getFile('lampiran');

        if (!$file || !$file->isValid()) {
            return null; // No file or invalid file
        }

        // Manual validation for cleaner error control in Submit
        $validation = \Config\Services::validation();
        $validation->setRules([
            'lampiran' => [
                'rules' => "uploaded[lampiran]|max_size[lampiran,10240]|mime_in[lampiran,image/png,image/jpg,image/jpeg,application/pdf]|ext_in[lampiran,png,jpg,jpeg,pdf]",
                'errors' => [
                    'uploaded' => 'File lampiran wajib diunggah.',
                    'max_size' => 'Ukuran file terlalu besar (max 10MB).',
                    'mime_in' => 'Tipe file tidak diizinkan. Gunakan PNG, JPG, atau PDF.',
                    'ext_in' => 'Ekstensi file tidak valid.'
                ]
            ]
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Set errors to global validator so Submit() can pick it up
            $this->validator = $validation;
            return false;
        }

        // Buat nama file yang aman
        $newName = $this->generateSafeFileName($file);

        // Buat folder jika belum ada (FCPATH ensures absolute path)
        $targetDir = FCPATH . $this->uploadPath;
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }

        // Move file
        if ($file->move($targetDir, $newName)) {
            return $newName;
        }

        return false;
    }

    /**
     * Generate nama file yang aman dari user input
     */
    protected function generateSafeFileName($file)
    {
        $timestamp = time();
        $random = bin2hex(random_bytes(4));
        $ext = strtolower($file->getExtension());
        return "bukti_{$timestamp}_{$random}.{$ext}";
    }

    /**
     * Validasi data aduan
     */
    protected function validateData(array $data, $rules = [], array $messages = [], ?string $dbGroup = null): bool
    {
        if (empty($rules)) {
            $rules = [
                'pelapor_identitas' => 'required|in_list[anonim,identitas]',
                'pelapor_nama' => 'permit_empty|string|max_length[255]',
                'pelapor_kontak' => 'permit_empty|string|max_length[255]',
                'kategori_id' => 'permit_empty|integer',
                'kategori_text' => 'permit_empty|string|max_length[255]',
                'terlapor_jenis' => 'required|in_list[Mahasiswa,Dosen,Tendik,Lainnya]',
                'terlapor_nama' => 'required|string|max_length[255]',
                'terlapor_nim' => 'permit_empty|string|max_length[20]',
                'terlapor_prodi_id' => 'permit_empty|integer',
                'kejadian_deskripsi' => 'required|string|min_length[20]|max_length[2000]',
                'kejadian_tgl' => 'required|valid_date',
                'kejadian_lokasi' => 'permit_empty|string|max_length[255]',
                'bukti_tipe' => 'permit_empty|in_list[file,sosmed]',
                'bukti_sosmed_platform' => 'permit_empty|in_list[youtube,tiktok,instagram,facebook,linkedin,twitter,other]',
                'bukti_sosmed_url' => 'permit_empty|string|valid_url',
            ];

            // Validasi tambahan jika identitas tidak anonim
            if (isset($data['pelapor_identitas']) && $data['pelapor_identitas'] === 'identitas') {
                $rules['pelapor_nama'] = 'required|string|max_length[255]';
                // pelapor_kontak tetap opsional
            }

            // Validasi tambahan jika bukti sosmed
            if (isset($data['bukti_tipe']) && $data['bukti_tipe'] === 'sosmed') {
                $rules['bukti_sosmed_platform'] = 'required|in_list[youtube,tiktok,instagram,facebook,linkedin,twitter,other]';
                $rules['bukti_sosmed_url'] = 'required|string|valid_url';
            }
        }

        return parent::validateData($data, $rules, $messages, $dbGroup);
    }
}
