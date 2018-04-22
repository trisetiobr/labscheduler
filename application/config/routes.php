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
$route['default_controller'] = 'welcome';
$route['create'] = 'blog/create'; //$route['create']--->nama urlnya = blog/create -->nama controller
//admin
$route['staff/dashboard'] = 'staff/dashboard';
//pengajar
$route['staff/pengajar'] = 'staff/pengajar';
$route['staff/pengajar/detail/(:any)'] = 'staff/pengajar/detail/$1';
$route['staff/pengajar/update/(:any)'] = 'staff/pengajar/update/$1';
$route['staff/pengajar/ubah/(:any)'] = 'staff/pengajar/ubah';
$route['staff/pengajar/tambah'] = 'staff/pengajar/tambah';
$route['staff/pengajar/create'] = 'staff/pengajar/create';//Create
$route['staff/pengajar/delete/(:any)'] = 'staff/pengajar/delete/$1';//Delete

$route['staff/pengajar/ajax_check_username'] = 'staff/pengajar/ajax_check_username';

//matakuliah
$route['staff/subject'] = 'staff/subject';
$route['staff/subject/create'] = 'staff/subject/create';

//laboratorium
$route['staff/laboratorium'] = 'staff/laboratorium';
//jadwal
$route['staff/jadwal'] = 'staff/jadwal';
//peminjaman
$route['staff/peminjaman'] = 'staff/peminjaman';
//daftar pengguna

// TESTING
$route['test/ajax/db'] = 'test/test_ajax_db';
$route['test/form'] = 'test/test_form';

$route['staff/daftar-pengguna'] = 'staff/daftar_pengguna';
$route['login'] = 'login';
$route['staff/logout'] = 'logout';
$route['user/logout'] = 'logout';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;