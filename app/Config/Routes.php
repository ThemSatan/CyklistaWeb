<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('home', 'Home::index');

$routes->get('rider', 'Home::riders');
$routes->get('rider/(:num)', 'Home::riderInfo/$1');

$routes->get('dev', 'Home::devPage');

$routes->get('race/new', 'Home::addNew');
$routes->post('race/create', 'Home::createForm');

$routes->get('race/update/(:num)', 'Home::updateRace/$1');
$routes->put('race/update', 'Home::updateForm/update');

$routes->get('race/delete/(:num)', 'Home::confirmDelete/$1');
$routes->delete('race/delete', 'Home::deleteForm/delete');

$routes->get('login','Auth::login');
$routes->get('register','Auth::register');

$routes->post('login-complete','Auth::loginComplete');
$routes->post('register-complete','Auth::registerComplete');
$routes->get('logout','Auth::logoutComplete');

$routes->group('admin', ['filter' => 'auth'], static function ($routes) {
    $routes->get('dash','Home::index');
});