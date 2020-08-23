<?php
defined('BASEPATH') or exit('No direct script access allowed');
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['curah-hujan'] = 'curah_hujan';
$route['curah-hujan/show/(:any)'] = 'curah_hujan/show/$1';

$route['metode-gumbel'] = 'gumbel';
$route['metode-gumbel/show/(:any)'] = 'gumbel/show/$1';

$route['log-pearson'] = 'log_pearson';
$route['log-pearson/show/(:any)'] = 'log_pearson/show/$1';