<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// 🔥 Halaman utama (FIRST PAGE)
$routes->get('/', 'Awalan::index');

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


#informasi 
$routes->get('/informasi', 'Informasi::index');

#logout
$routes->get('/logout', 'Home::logout');