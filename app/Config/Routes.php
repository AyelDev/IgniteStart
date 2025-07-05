<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// login pages

// user login page (default)
$routes->get('/', 'Home::user_login');

// end login page

$routes->post('/login', 'Login::authenticate');

// admin login page

// $routes->get('/user','UserController::getstudents');

// $routes->post('user/register', 'UserRegister::register');

$routes->get('user/register', 'User::index');   

$routes->post('user/register', 'User::register');

$routes->get('user/dashboard', 'User::dashboard', ['filter' => 'authGuard']);

