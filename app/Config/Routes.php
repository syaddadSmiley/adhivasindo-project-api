<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/register', 'RegisterController::index');
$routes->post('/register', 'RegisterController::register');

$routes->get('/login', 'LoginController::index');
$routes->post('/login', 'LoginController::login');

$routes->get('/dashboard', 'DashboardController::index', ["filter" => "auth"]);

$routes->group('auth', ["filter" => "auth"], function ($routes) {
    $routes->get('/dashboard', 'DashboardController::index');
    $routes->get('/logout', 'LogoutController::index');
});

