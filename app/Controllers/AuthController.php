<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class AuthController extends BaseController
{
    public function index()
    {
        return view('Admin/Auth/index');
    }

    public function login()
    {
        // Validasi input
        if (
            !$this->validate([
                'email' => 'required|valid_email',
                'password' => 'required'
            ])
        ) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Format email harus benar dan password wajib diisi'
            ]);
        }

        // Ambil input JSON atau POST
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        // Cek user ditemukan dan password cocok
        if ($user && password_verify($password, $user['password'])) {
            // Cek status aktif
            if (!$user['is_active']) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Akun Anda dinonaktifkan. Hubungi admin.'
                ]);
            }

            // Set session
            session()->set([
                'user_id' => $user['id'],
                'username' => $user['username'],
                'email' => $user['email'],
                'role' => $user['role'] ?? 'admin', // Default role jika belum ada kolom role
                'is_logged_in' => true
            ]);

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Login berhasil! Mengarahkan...',
                'redirect' => base_url('admin/dashboard')
            ]);
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Username atau password salah!'
            ]);
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'))->with('message', 'Anda telah berhasil logout.');
    }
}
