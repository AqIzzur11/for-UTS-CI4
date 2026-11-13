<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
// $routes->get('/', 'Home::index');
$routes->get('/', 'Dashboard::index');
$routes->group('product', static function ($routes) {
    $routes->get('/', 'Product::index');
    $routes->get('create', 'Product::create');
    $routes->post('store', 'Product::store');
    $routes->get('edit/(:num)', 'Product::edit/$1');
    $routes->post('update', 'Product::update');
    $routes->get('delete/(:num)', 'Product::delete/$1');
});