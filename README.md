# Lapor Pak Wadek 3 (FTIK UIN Bukittinggi)

[![Technology - CodeIgniter 4](https://img.shields.io/badge/Framework-CodeIgniter%204-EF4223?style=for-the-badge&logo=codeigniter&logoColor=white)](https://codeigniter.com/)
[![Style - TailwindCSS](https://img.shields.io/badge/Styling-Tailwind%20CSS-06B6D4?style=for-the-badge&logo=tailwind-css&logoColor=white)](https://tailwindcss.com/)
[![Design - Glassmorphism](https://img.shields.io/badge/Design-Glassmorphism-0D9488?style=for-the-badge&logo=google-cloud&logoColor=white)](#)
[![PWA - Ready](https://img.shields.io/badge/PWA-Ready-EF6C00?style=for-the-badge&logo=pwa&logoColor=white)](#)


**Lapor Pak Wadek 3** adalah platform digital resmi yang dirancang untuk memfasilitasi civitas akademika FTIK UIN Sjech M. Djamil Djambek Bukittinggi dalam menyampaikan aspirasi, saran, dan pengaduan secara langsung kepada **Wakil Dekan III**.

### 🔗 Live Demo
Akses demo aplikasi di: [https://sigap.wuaze.com/](https://sigap.wuaze.com/)

## ✨ Fitur Utama

### 👤 Sisi Pelapor (Public/Student)
- **Pelaporan Anonim**: Menjamin keamanan identitas pelapor untuk isu-isu sensitif.
- **Kode Referensi Unik**: Setiap laporan mendapatkan ID unik untuk pelacakan status tanpa perlu login.
- **Modern UI/UX**: Desain premium dengan pendekatan *Glassmorphism* yang responsif dan atraktif.
- **Progressive Web App (PWA)**: Dapat diinstal di perangkat Android, iOS, maupun Desktop (Chrome/Edge) tanpa melalui App Store.
- **Notifikasi Interaktif**: Menggunakan library Notiflix untuk feedback yang elegan.

### 🔐 Sisi Admin (Control Panel)
- **Aura-Analytics Dashboard**: Visualisasi data laporan menggunakan Chart.js dengan filter waktu (7 & 30 hari).
- **Timeline Aktivitas**: Pantau setiap perubahan status laporan secara real-time.
- **Manajemen Resolusi**: Alur kerja sistematis mulai dari laporan Masuk, Dibaca, Diproses, hingga Selesai.
- **Quick Shortcuts**: Akses cepat ke pengaturan kategori dan otoritas admin.

## 🛠️ Teknologi yang Digunakan

| Komponen | Teknologi |
| --- | --- |
| **Backend** | CodeIgniter 4.x (PHP 8+) |
| **Frontend** | Tailwind CSS 3.x |
| **Database** | MySQL / MariaDB |
| **Library JS** | jQuery, Chart.js, Notiflix |
| **Icons** | Material Symbols Outlined, Material Icons |
| **Mobile Tech** | Progressive Web App (PWA) |
| **UI Concepts** | Glassmorphism, Micro-animations |

## 🚀 Instalasi & Setup

### Persyaratan Sistem
- PHP >= 8.1
- Composer
- Web Server (Apache/Nginx/XAMPP)
- MySQL/MariaDB

### Langkah-langkah
1. **Clone Repositori**
   ```bash
   git clone https://github.com/ocikyamin/lapor-pak-wadek.git
   cd newapp-lapor-pak-wadek
   ```

2. **Instal Dependensi**
   ```bash
   composer install
   ```

3. **Konfigurasi Environment**
   - Salin file `env` menjadi `.env`
   - Sesuaikan konfigurasi database:
     ```env
     database.default.hostname = localhost
     database.default.database = nama_db_anda
     database.default.username = root
     database.default.password = 
     database.default.DBDriver = MySQLi
     ```

4. **Database Setup**
   - Buat database baru di MySQL.
   - **Penting**: File *Database Migration* dan *Seeder* tidak disertakan dalam repositori GitHub ini untuk alasan keamanan dan privasi data. Silakan buat struktur tabel secara manual atau hubungi pengembang untuk skema database.

5. **Jalankan Aplikasi**
   ```bash
   php spark serve
   ```

## 📂 Struktur Folder Utama
- `app/Views/Landing`: Halaman publik (Beranda, Form Pengaduan, Info Referensi).
- `app/Views/Admin`: Dashboard dan manajemen internal admin.
- `public/assets`: File statis (CSS, JS, Images, Logo).
- `app/Controllers`: Logika bisnis dan pengolahan data.

## 👨‍💻 Tim Pengembang & Inisiator
- **Inisiator**: **Dr. Supriadi, S.Ag., M.Pd** (Wakil Dekan III FTIK UIN SMDD Bukittinggi)
- **Lead Developer**: **Abdul Yamin, S.Pd., M.Kom** ([@ocikyamin](https://github.com/ocikyamin))
- **Project**: Lapor Pak Wadek 3 - FTIK UIN SMDD Bukittinggi

## ⚖️ Lisensi & Penggunaan
Aplikasi ini bersifat **Proprietary**. Siapapun yang ingin menggunakan, memodifikasi, atau mendistribusikan ulang kode program ini **WAJIB** mendapatkan izin tertulis dari Inisiator (**Dr. Supriadi, S.Ag., M.Pd**) dan Lead Developer (**Abdul Yamin, S.Pd., M.Kom**). 


---
*© 2026 Lapor Pak Wadek 3 FTIK UIN Sjech M. Djamil Djambek Bukittinggi. All rights reserved.*
