<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'IndexController';
$route['login'] = 'LoginController';
$route['logout'] = 'LoginController/logout';
$route['halaman_index'] = 'IndexController';
$route['index_admin'] = 'AdminController';
$route['halaman_register'] = 'RegisterController';
$route['proses_login'] = 'LoginController/loginStep';
$route['data_barang'] = 'AdminController/cekBarang';
$route['tambah_barang'] = 'AdminController/tambahBarang';
$route['halaman_pesanan'] = 'PelangganController/pesananMenu';
$route['halaman_pelanggan'] = 'PelangganController';
$route['halaman_manajer'] = 'ManajerController';
$route['barang'] = 'BarangController';
$route['data_pelanggan'] = 'AdminController/cekPelanggan';
$route['data_konsultan'] = 'AdminController/cekKonsultan';
$route['edit_barang'] = 'AdminController/FuncEditBarang';
$route['tambah_data_barang'] = 'AdminController/FuncTambahBarang';
$route['tambah_data_admin'] = 'IndexController/updateAdmin';
$route['tabel_konsultan'] = 'IndexController/dataKonsultan';
$route['laporan_keuangan'] = 'AdminController/laporanKeuangan';
$route['profile_pelanggan'] = 'PelangganController/editProfilePelanggan';
$route['profile_konsultan'] = 'KonsultanController/editProfileKonsultan';
$route['edit_profile_pelanggan'] = 'PelangganController/editProfile';
$route['edit_profile_konsultan'] = 'KonsultanController/editProfile';
$route['cek_ongkir'] = 'Cek_ongkir';
$route['404_override'] = '';

$route['konsultasi']['get'] = 'KonsultasiController';
$route['konsultasi']['post'] = 'KonsultasiController/sendKonsultasi';
$route['konsultasi/postKomentar']['post'] = 'KonsultasiController/postKomentar';
$route['konsultasi/editkomen']['post'] = 'KonsultasiController/postEditKomentar';
$route['konsultasi/tambah'] = 'KonsultasiController/postKonsultasi';
$route['konsultasi/konsulDetail/(:num)'] = 'KonsultasiController/konsulDetail/$1';
$route['konsultasi/deleteKomentar'] = 'KonsultasiController/deleteKomentar';
$route['translate_uri_dashes'] = FALSE;
