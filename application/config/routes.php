<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| DEFAULT ROUTES
|--------------------------------------------------------------------------
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
$route['login'] = 'auth/login';
$route['register'] = 'auth/register';
$route['logout'] = 'auth/logout';
$route['reset-password'] = 'auth/reset_password';

/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/
$route['dashboard'] = 'dashboard/index';
$route['laporan'] = 'laporan/index';
$route['laporan/pdf'] = 'laporan/pdf';

/*
|--------------------------------------------------------------------------
| ADMIN - BUKU
|--------------------------------------------------------------------------
*/
$route['buku'] = 'buku/index';
$route['buku/tambah'] = 'buku/tambah';
$route['buku/edit/(:num)'] = 'buku/edit/$1';
$route['buku/hapus/(:num)'] = 'buku/hapus/$1';

/*
|--------------------------------------------------------------------------
| ADMIN - ANGGOTA
|--------------------------------------------------------------------------
*/
$route['anggota'] = 'anggota/index';
$route['anggota/tambah'] = 'anggota/tambah';
$route['anggota/hapus/(:num)'] = 'anggota/hapus/$1';

/*
|--------------------------------------------------------------------------
| PEMINJAMAN (ADMIN & USER)
|--------------------------------------------------------------------------
*/
$route['peminjaman'] = 'peminjaman/index'; // admin
$route['peminjaman/pinjam'] = 'peminjaman/pinjam'; // user
$route['peminjaman/pinjam_single/(:num)'] = 'peminjaman/pinjam_single/$1';

/*
|--------------------------------------------------------------------------
| PENGEMBALIAN
|--------------------------------------------------------------------------
*/
$route['pengembalian'] = 'pengembalian/index'; // (opsional kalau mau list)
$route['pengembalian/kembalikan/(:num)'] = 'pengembalian/kembalikan/$1';
$route['pengembalian/konfirmasi/(:num)'] = 'pengembalian/konfirmasi/$1';

/*
|--------------------------------------------------------------------------
| DENDA
|--------------------------------------------------------------------------
*/
$route['denda'] = 'denda/index';
$route['denda/bayar/(:num)'] = 'denda/bayar/$1';

/*
|--------------------------------------------------------------------------
| USER AREA (CUSTOM ROUTE BIAR RAPI)
|--------------------------------------------------------------------------
*/
$route['user/buku'] = 'user/buku';
$route['user/peminjaman'] = 'user/peminjaman';
$route['user/pengembalian'] = 'user/pengembalian';
$route['user/denda'] = 'user/denda';
$route['user/riwayat'] = 'user/riwayat';
$route['user/profile'] = 'user/profile';