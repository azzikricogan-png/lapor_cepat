<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');

// ====================
// AUTH
// ====================
$routes->get('/login', 'Auth::login');
$routes->post('/login/proses', 'Auth::prosesLogin');

$routes->get('/register', 'Auth::register');
$routes->post('/register/simpan', 'Auth::simpanRegister');

$routes->get('/logout', 'Auth::logout');

// ====================
// DASHBOARD
// ====================
$routes->get('/dashboard', 'Dashboard::index');

// ====================
// USERS
// ====================
$routes->get('/users', 'User::index');
$routes->get('/users/tambah', 'User::create');
$routes->post('/users/simpan', 'User::store');

$routes->get('/users/edit/(:num)', 'User::edit/$1');
$routes->post('/users/update/(:num)', 'User::update/$1');

$routes->get('/users/hapus/(:num)', 'User::delete/$1');

// ====================
// LAYANAN LAPORAN
// ====================
$routes->get('/layanan', 'LayananLaporan::index');
$routes->get('/layanan/tambah', 'LayananLaporan::create');
$routes->post('/layanan/simpan', 'LayananLaporan::store');

$routes->get('/layanan/edit/(:num)', 'LayananLaporan::edit/$1');
$routes->post('/layanan/update/(:num)', 'LayananLaporan::update/$1');

$routes->get('/layanan/hapus/(:num)', 'LayananLaporan::delete/$1');

// ====================
// LAPORAN
// ====================
$routes->get('/laporan', 'Laporan::index');
$routes->get('/laporan/tambah', 'Laporan::create');
$routes->post('/laporan/simpan', 'Laporan::store');

$routes->get('/laporan/detail/(:num)', 'Laporan::show/$1');

$routes->get('/laporan/edit/(:num)', 'Laporan::edit/$1');
$routes->post('/laporan/update/(:num)', 'Laporan::update/$1');

$routes->get('/laporan/hapus/(:num)', 'Laporan::delete/$1');

// ====================
// TANGGAPAN
// ====================
$routes->post('/tanggapan/simpan', 'Tanggapan::store');

$routes->get('/tanggapan/hapus/(:num)', 'Tanggapan::delete/$1');

// ====================
// NOTIFIKASI
// ====================
$routes->get('/notifikasi', 'Notifikasi::index');

$routes->get('/notifikasi/baca/(:num)', 'Notifikasi::baca/$1');

$routes->get('/notifikasi/hapus/(:num)', 'Notifikasi::delete/$1');
