<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// 🔥 Halaman utama (FIRST PAGE)
$routes->get('/', 'Awalan::index');

# Awalan
$routes->get('/awalan', 'Awalan::index');

# Auth
$routes->get('/login', 'Auth::login');
$routes->get('/register', 'Auth::register');
$routes->get('auth/google', 'Auth::googleLogin');
$routes->get('auth/google/callback', 'Auth::googleCallback');

# Laporaa
$routes->get('/laporan', 'Laporan::index');
