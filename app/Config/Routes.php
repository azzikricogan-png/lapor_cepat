<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// 🔥 Halaman utama (FIRST PAGE)
$routes->get('/', 'Awalan::index');
$routes->get('/lapor', "Awalan::por");

# Awalan
$routes->get('/awalan', 'Awalan::index');
$routes->post('/awalan/login','Awalan::proses');


#home
$routes->get('/home', 'Home::index',[
    'filter' => ['auth','masyarakat']
]);
$routes->get('/profil', 'Home::profil');
$routes->post('/home', 'Home::laporan');



# Auth
#login
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'auth::homex');


#register
$routes->get('/register', 'Auth::register');
$routes->post('/register', 'auth::store');

$routes->get('auth/google', 'Auth::googleLogin');
$routes->get('auth/google/callback', 'Auth::googleCallback');

# Laporan
$routes->get('/laporan', 'Laporan::index',[
    'filter' => ['auth', 'masyarakat']
]);


#Buatlaporan
$routes->get('/buat_laporan', 'BuatLaporan::index',[
    'filter' => ['auth','masyarakat']
]);
$routes->post('/buat_laporan/simpan', 'BuatLaporan::simpan');


#informasi 
$routes->get('/informasi', 'Informasi::index');

#logout
$routes->get('/logout', 'Auth::logout');



$routes->get('/lap', 'Menampilkan::index');
$routes->get('/tampil', 'menampilkan::tampil');


#Petugas
$routes->get('petugas', 'Petugas::index',[
    'filter' => ['auth','petugas']
]);
$routes->get('petugas/profil', 'Petugas::profil');
$routes->post('/petugas/updateProfil', 'Petugas::updateProfil');
$routes->get('petugas/laporan', 'Petugas::laporan');
$routes->post('petugas/updateStatus', 'Petugas::updateStatus');
$routes->get('petugas/notifikasi', 'Petugas::notifikasi');


#Admin
$routes->get('/admin', 'Admin::index',[
    'filter' => ['auth','admin']
]);


#notifikasi
$routes->get('/notifikasi','Notifikasi::index',[
    'filter' => ['auth', 'masyarakat']
]);
$routes->get('/notifikasi/read/(:num)', 'Notifikasi::read/$1');



#ambil sandi
$routes->get('/cap', 'cap::index');