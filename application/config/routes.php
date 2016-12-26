<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*Welcome Controller*/
$route['about'] = 'welcome/about';

/*Account Controller*/
$route['account/(:any)'] = '';
$route['ambilDatakuCoeg'] = 'Account/ambilData';
$route['signup'] = 'Account/signup';
$route['login'] = 'Account/login';
$route['logout'] = 'Account/logout';

/*Administrator Controller*/
$route['administrator'] = 'Errorian';
$route['administrator/(:any)'] = 'Errorian';
$route['admin'] = 'Administrator';
$route['admin/pengumuman'] = 'Pengumuman';
$route['admin/pengumuman/tambah'] = 'Pengumuman/tambah';
$route['admin/pengumuman/lihat/(:any)'] = 'Pengumuman/lihat/$1';
$route['admin/pengumuman/ubah/(:any)'] = 'Pengumuman/ubah/$1';
$route['admin/pengumuman/hapus/(:any)'] = 'Pengumuman/hapus/$1';
$route['admin/pengumuman/(:any)'] = 'Pengumuman/index/$1';
$route['admin/mahasiswa'] = 'Mahasiswa';
$route['admin/mahasiswa/daftar-calon'] = 'Mahasiswa/daftarCalon';
$route['admin/mahasiswa/daftar-calon/(:any)'] = 'Mahasiswa/daftarCalon/$1';
$route['admin/mahasiswa/daftar-anggota'] = 'Mahasiswa/daftarAnggota';
$route['admin/mahasiswa/daftar-anggota/(:any)'] = 'Mahasiswa/daftarAnggota/$1';
$route['admin/mahasiswa/daftar-fungsionaris'] = 'Mahasiswa/daftarFungsionaris';
$route['admin/mahasiswa/daftar-fungsionaris/(:any)'] = 'Mahasiswa/daftarFungsionaris/$1';
$route['admin/mahasiswa/lihat-profil/(:any)'] = 'Mahasiswa/lihatProfil/$1';
$route['admin/mahasiswa/tambah-fungsionaris/(:any)'] = 'Mahasiswa/tambahFungsionaris/$1';
$route['admin/mahasiswa/hapusMahasiswa/(:any)'] = 'Mahasiswa/hapusMahasiswa/$1';
$route['admin/mahasiswa/hapusFungsionaris/(:any)'] = 'Mahasiswa/hapusFungsionaris/$1';
$route['admin/mahasiswa/verifikasiAnggota/(:any)'] = 'Mahasiswa/verifikasiAnggota/$1';
$route['admin/absensi'] = 'Absensi';
$route['admin/divisi'] = 'Divisi';
$route['admin/divisi/tambah'] = 'Divisi/tambah';
$route['admin/divisi/lihat/(:any)'] = 'Divisi/lihat/$1';
$route['admin/divisi/ubah/(:any)'] = 'Divisi/ubah/$1';
$route['admin/divisi/hapus/(:any)'] = 'Divisi/hapus/$1';
$route['admin/jabatan'] = 'Jabatan';
$route['admin/jabatan/tambah'] = 'Jabatan/tambah';
$route['admin/jabatan/lihat/(:any)'] = 'Jabatan/lihat/$1';
$route['admin/jabatan/ubah/(:any)'] = 'Jabatan/ubah/$1';
$route['admin/jabatan/hapus/(:any)'] = 'Jabatan/hapus/$1';
$route['admin/ubah-user'] = 'Administrator/ubahUser';
$route['admin/ubah-profil'] = 'Administrator/ubahProfil';
$route['admin/(:any)'] = 'Administrator/$1';

/*User Controller*/
$route['user'] = 'Errorian';
$route['user/(:any)'] = 'Errorian';
$route['anggota'] = 'User';
$route['anggota/pengumuman'] = 'Pengumuman';
$route['anggota/pengumuman/lihat/(:any)'] = 'Pengumuman/lihat/$1';
$route['anggota/pengumuman/(:any)'] = 'Pengumuman/';
$route['anggota/absensi'] = 'Absensi';
$route['anggota/divisi'] = 'Divisi';
$route['anggota/divisi/tambah'] = 'Divisi/tambah';
$route['anggota/divisi/lihat/(:any)'] = 'Divisi/lihat/$1';
$route['anggota/jabatan'] = 'Jabatan';
$route['anggota/jabatan/tambah'] = 'Jabatan/tambah';
$route['anggota/jabatan/lihat/(:any)'] = 'Jabatan/lihat/$1';
$route['anggota/ubah-user'] = 'User/ubahUser';
$route['anggota/ubah-profil'] = 'User/ubahProfil';
$route['anggota/(:any)'] = 'User/$1';

/*Pengumuman Controller Access is denied*/
$route['pengumuman'] ='Errorian';
$route['pengumuman/(:any)'] ='Pengumuman/$1';

$route['default_controller'] = 'Welcome';
$route['404_override'] = 'Errorian';
$route['translate_uri_dashes'] = FALSE;
