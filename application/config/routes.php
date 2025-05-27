<?php
// filepath: [routes.php](http://_vscodecontentref_/1)
// ...existing code...
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['default_controller'] = 'admin/C_Articles';
// Route untuk admin articles
$route['admin/c_articles'] = 'admin/C_Articles/index';
$route['admin/c_articles/create'] = 'admin/C_Articles/create';
$route['admin/c_articles/store'] = 'admin/C_Articles/store';
$route['admin/c_articles/edit/(:any)'] = 'admin/C_Articles/edit/$1';
$route['admin/c_articles/update/(:any)'] = 'admin/C_Articles/update/$1';
$route['admin/c_articles/delete/(:any)'] = 'admin/C_Articles/delete/$1';
// ...existing code...