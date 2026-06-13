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
$routes->get('/home', 'Home::index');
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
$routes->get('/laporan', 'Laporan::index');


#Buatlaporan
$routes->get('/buat_laporan', 'BuatLaporan::index');
$routes->post('/buat_laporan/simpan', 'BuatLaporan::simpan');


#informasi 
$routes->get('/informasi', 'Informasi::index');

#logout
$routes->get('/logout', 'Home::logout');



$routes->get('/lap', 'Menampilkan::index');
$routes->get('/tampil', 'menampilkan::tampil');


#Petugas
$routes->get('/petugas', 'Petugas::index');

#Admin
$routes->get('/admin', 'Admin::index');