<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::LandingPage');

$routes->get('buat-laporan', 'HomeController::BuatLaporan');
// Submit pengaduan via AJAX
$routes->post('submit-pengaduan', 'PengaduanController::Submit');
$routes->get('/referensi/(:any)', 'PengaduanController::successSubmit/$1');

$routes->get('login', 'AuthController::index');
$routes->post('login', 'AuthController::login');
$routes->get('logout', 'AuthController::logout');

// ============================================
// ADMIN ROUTES
// ============================================


$routes->group('admin', static function ($routes) {
    $routes->get('dashboard', 'AdminController::index');
    $routes->get('laporan-masuk', 'AdminController::laporanMasuk');
    $routes->get('laporan-detail/(:num)', 'AdminController::laporanDetail/$1');
    $routes->get('laporan-cetak/(:any)', 'AdminController::cetakLaporan/$1');
    $routes->post('laporan-update-status', 'AdminController::updateStatus');
    $routes->post('laporan-toggle-star', 'AdminController::toggleStar');
    $routes->post('laporan-delete', 'AdminController::deleteLaporan');
    $routes->get('aktivitas', 'AdminController::aktivitas');

    // Arsip Laporan
    $routes->get('arsip', 'AdminController::arsipLaporan');

    // Kategori Laporan
    $routes->get('kategori', 'AdminController::kategoriLaporan');
    $routes->post('kategori-save', 'AdminController::saveKategori');
    $routes->post('kategori-update', 'AdminController::updateKategori');
    $routes->post('kategori-delete', 'AdminController::deleteKategori');

    // Prodi
    $routes->get('prodi', 'AdminController::prodi');
    $routes->post('prodi-save', 'AdminController::saveProdi');
    $routes->post('prodi-update', 'AdminController::updateProdi');
    $routes->post('prodi-delete', 'AdminController::deleteProdi');

    // User 
    $routes->get('users', 'AdminController::users');
    $routes->post('users-save', 'AdminController::saveUser');
    $routes->post('users-update', 'AdminController::updateUser');
    $routes->post('users-delete', 'AdminController::deleteUser');

    // Stats/Notifications
    $routes->get('get-notification-count', 'AdminController::getNotificationCount');



});



// ============================================
// PENGADUAN ROUTES
// ============================================

// $routes->group('admin/pengaduan/', static function ($routes) {
//     // Get detail pengaduan
//     $routes->get('/pengaduan/detail/(:num)', 'Pengaduan::detail/$1', ['as' => 'pengaduan.detail']);

//     // Get list pengaduan
//     $routes->get('/pengaduan/list', 'Pengaduan::list', ['as' => 'pengaduan.list']);

//     // Get statistik
//     $routes->get('/pengaduan/statistics', 'Pengaduan::statistics', ['as' => 'pengaduan.statistics']);

//     // Download file bukti
//     $routes->get('/pengaduan/download/(:any)', 'Pengaduan::downloadFile/$1', ['as' => 'pengaduan.download']);

//     // Update status pengaduan
//     $routes->post('/pengaduan/update-status/(:num)', 'Pengaduan::updateStatus/$1', ['as' => 'pengaduan.updateStatus']);

// });


