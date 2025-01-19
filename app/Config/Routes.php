
<?php

use Config\Services;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes = Services::routes();

$routes->get('/', 'DashboardController::index');

$routes->get('/pengaduan/belum', 'PengaduanController::belumDitanggapi');
$routes->get('/pengaduan/sudah', 'PengaduanController::sudahDitanggapi');
$routes->post('/pengaduan/simpan', 'PengaduanController::simpan');

$routes->group('admin/auth', function ($routes) {
    $routes->get('register', 'Admin\AuthController::register');
    $routes->post('register', 'Admin\AuthController::storeRegister');
    $routes->get('login', 'Admin\AuthController::login');
    $routes->post('login', 'Admin\AuthController::attemptLogin');
    $routes->get('logout', 'Admin\AuthController::logout');
    $routes->post('admin/toggle_status', 'AdminController::toggle_status');
});

$routes->get('admin/login', 'AdminController::login');
$routes->post('admin/login', 'AdminController::doLogin');
$routes->get('admin/logout', 'AdminController::logout');
$routes->get('admin/register', 'AdminController::register');
$routes->post('admin/register', 'AdminController::doRegister');
$routes->get('admin/dashboard', 'AdminController::dashboard');
$routes->get('/admin/pengaduan/belum-ditanggapi', 'AdminController::belumDitanggapi');
$routes->get('/admin/pengaduan/sudah-ditanggapi', 'AdminController::sudahDitanggapi');
$routes->post('/pengaduan/update/(:num)', 'AdminController::updateStatus/$1');
$routes->delete('/pengaduan/delete/(:num)', 'AdminController::deletePengaduan/$1');
$routes->get('/admin/user-management', 'AdminController::userManagement');
$routes->post('admin/toggle_status', 'AdminController::toggle_status');
