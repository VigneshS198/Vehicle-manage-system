<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'DashboardController::index');

# Install Routes - InstallController

$routes->get('/install', 'InstallController::index');
$routes->post('/install/migrate', 'InstallController::migrate');
$routes->post('/install/setupEnv', 'InstallController::setupEnv');

# No Access

$routes->get('/no-access', 'Home::noAccess');
$routes->post('/no-access', 'Home::noAccess');

# Auth Routes - AuthController

$routes->get('/login', 'AuthController::index');
$routes->post('/login', 'AuthController::index');
$routes->get('/logout', 'AuthController::logout');
$routes->post('/logout', 'AuthController::logout');


# Admin Routes - DashboardController
$routes->get('/dashboard', 'DashboardController::index');


# Vehicles Routes - VehiclesController
$routes->get('/vehicles/checkin/create', 'VehiclesController::create');
$routes->post('vehicle/checkin', 'VehiclesController::checkin');
$routes->get('vehicles/check-out', 'VehiclesController::index');
$routes->get('vehicles/checkin_list', 'VehiclesController::checkin_list');
$routes->post('vehicle/changestatus/(:num)', 'VehiclesController::changeStatus/$1');


# vendor Routes - VehiclesController
$routes->get('vendors/add', 'VendorsController::create');


# Purchase Routes - VehiclesController
$routes->get('purchase/add', 'ProductController::create');
$routes->get('purchase/orders', 'ProductController::index');
$routes->get('purchase/list', 'ProductController::list');
$routes->post('purchase_order/save', 'ProductController::save');

# users Routes - usersController

$routes->get('/users', 'UserController::index');
$routes->get('/users/list', 'UserController::list');
// $routes->post('/users', 'UserController::save');

# Role Routes - RoleController

$routes->get('/roles', 'RoleController::index');
$routes->get('/roles/list', 'RoleController::list');
$routes->get('/roles/(:num)', 'RoleController::rolecontrol/$1');
$routes->post('/roles/(:num)/permissions', 'RoleController::savePermissions/$1');

# ComingSoon

$routes->get('/settings', 'Home::noAccess');
$routes->get('/logs', 'Home::noAccess');
