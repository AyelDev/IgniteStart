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

$routes->group("", ['filter' => 'userAuth'], function ($routes) {
    $routes->get('user/dashboard', 'User::userDashboard');
    $routes->get('user/assign-task', 'User::assign-task');
});

$routes->group("", ['filter' => 'adminAuth'], function ($routes) {
    $routes->get('admin/dashboard', 'User::adminDashboard');
    $routes->get('admin/users', 'User::users');
    $routes->get('admin/assign-task', 'User::assign_task');
});

$routes->get('/logout', 'User::logout');
