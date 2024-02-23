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
$routes->get('/logout', 'LogoutController::index', ["filter" => "auth"]);
$routes->post('/search', 'DashboardController::search', ["filter" => "auth"]);
$routes->get('/user/delete/(:num)', 'DashboardController::delete/$1', ["filter" => "auth"]);
$routes->get('/user/update/(:num)', 'DashboardController::update/$1', ["filter" => "auth"]);
$routes->post('/user/update', 'DashboardController::updatePost', ["filter" => "auth"]);
$routes->get('/user/create', 'DashboardController::create', ["filter" => "auth"]);
$routes->post('/user/create', 'DashboardController::createPost', ["filter" => "auth"]);
