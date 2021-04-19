<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'tasks';
$route['/tasks/delete_task/(:any)'] = 'tasks/delete_task/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
