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
$route['employee/edit/(:any)']='Frontend/EmployeeController/edit/$1';
$route['employee/update/(:any)']='Frontend/EmployeeController/update/$1';
$route['employee/delete/(:any)']='Frontend/EmployeeController/delete/$1';


// -----------------------------------------------------------------------------
//Project Login system

$route['login']='project/LoginController/index';
$route['login/authenticate']='project/LoginController/authenticate';
$route['homepage']='project/LoginController/home';
$route['tickets']='project/LoginController/tickets';
$route['raise_ticket']='project/LoginController/raise_ticket';
$route['create_ticket']='project/LoginController/create_ticket';
$route['ticket/delete/(:any)']='project/LoginController/delete_ticket/$1';
$route['ticket/edit/(:any)']='project/LoginController/edit_ticket/$1';
$route['ticket/update/(:any)']='project/LoginController/update_ticket/$1';
$route['logout']='project/LoginController/logout';











