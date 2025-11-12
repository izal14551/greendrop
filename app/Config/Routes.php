<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Dashboard::index');

$routes->get('/slide1', 'Onboarding::slide1');
$routes->get('/slide2', 'Onboarding::slide2');

//login
$routes->get('/auth/login', 'Auth::login');
$routes->post('/auth/doLogin', 'Auth::doLogin');

//register
$routes->get('/auth/register', 'Auth::register');
$routes->post('/auth/doRegister', 'Auth::doRegister');

//logout
$routes->get('/auth/logout', 'auth::logout');

// Peserta
$routes->get('/peserta', 'Peserta::index');
$routes->get('/peserta/tambah', 'Peserta::create');
$routes->post('/peserta/store', 'Peserta::store');

$routes->get('/peserta/edit/(:num)', 'Peserta::edit/$1');
$routes->post('/peserta/update/(:num)', 'Peserta::update/$1');

$routes->get('/peserta/delete/(:num)', 'Peserta::delete/$1');

//Timbang
$routes->get('/timbang', 'Timbang::index');
$routes->get('/timbang/getPeserta', 'Timbang::getPeserta');
$routes->post('/timbang/store', 'Timbang::store');

//rekap
$routes->get('/rekap', 'Rekap::index');
