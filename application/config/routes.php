<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['email'] = 'applicant/send_email';
$route['applicant/index'] = 'applicant/index';
$route['admin/index'] = 'admin/index';
$route['admin/setting'] = 'admin/setting';
$route['applicant/create'] = 'applicant/create';
$route['applicant/add'] = 'applicant/add';
$route['applicant/update'] = 'applicant/update';
$route['default_controller'] = 'users/login';
// $route['applicant/(:any)'] = 'applicant/view/$1';
$route['(:any)'] = 'pages/view/$1';
$route['applicant/createpdf'] = 'applicant/createpdf';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
