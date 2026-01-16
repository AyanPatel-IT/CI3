<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['abouts'] = 'Welcome/demo';
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
// http://localhost:81/PageController/about/index
$route['home'] = 'PageController/index';
$route['blog/(:num)'] = 'PageController/blog/$1';
// $route['blog/(:any)'] = 'errors/show_404';



// ------------------------------------
$route['employee']='Frontend/EmployeeController/index';
$route['employee/add']='Frontend/EmployeeController/create';
$route['employee/store']='Frontend/EmployeeController/store';



