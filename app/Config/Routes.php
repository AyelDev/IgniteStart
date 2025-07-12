<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// login pages

// user login page (default)
$routes->get('/', 'Home::user_login', ['filter' => 'auth']);

$routes->post('/authenticate', 'User::authenticate');

$routes->get('user/register', 'User::index');
$routes->post('user/register', 'User::register');

$routes->get('user/dashboard', 'User::userDashboard', ['filter' => 'userAuth']);

$routes->get('admin/dashboard', 'User::adminDashboard', ['filter' => 'adminAuth']);

$routes->get('/logout', 'User::logout');