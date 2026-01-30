<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['abouts'] = 'Welcome/demo';
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
// http://localhost:81/PageController/about/index
$route['home'] = 'PageController/index';
$route['blog/(:num)'] = 'PageController/blog/$1';
// $route['blog/(:any)'] = 'errors/show_404';



// ------------------------------------
$route['employee'] = 'Frontend/EmployeeController/index';
$route['employee/add'] = 'Frontend/EmployeeController/create';
$route['employee/store'] = 'Frontend/EmployeeController/store';
$route['employee/edit/(:any)'] = 'Frontend/EmployeeController/edit/$1';
$route['employee/update/(:any)'] = 'Frontend/EmployeeController/update/$1';
$route['employee/delete/(:any)'] = 'Frontend/EmployeeController/delete/$1';


//------------------------------------------------------------------------------
//----------------------------Project Ticket system-----------------------------

//Login Routes

$route['login'] = 'project/LoginController/login';
$route['login/authenticate'] = 'project/LoginController/authenticate';
$route['logout'] = 'project/LoginController/logout';

//Ticket Routes
$route['homepage'] = 'project/TicketController/home';
$route['tickets'] = 'project/TicketController/tickets';
$route['raiseTicket'] = 'project/TicketController/raiseTicket';
$route['createTicket'] = 'project/TicketController/createTicket';
$route['ticket/delete/(:any)'] = 'project/TicketController/deleteTicket/$1';
$route['ticket/edit/(:any)'] = 'project/TicketController/editTicket/$1';
$route['ticket/update/(:any)'] = 'project/TicketController/updateTicket/$1';
