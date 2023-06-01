<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
* --------------------------------------------------------------------
* Route Definitions
* --------------------------------------------------------------------
*/

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->group('/admin', ['filter' => 'auth'], function($routes) {
    $routes->get('(:any)', 'Login::index');
});

$routes->group('/user', ['filter' => 'userFilter'], function($routes) {
    $routes->get('(:any)', 'Login::index');
});

$routes->get('/', 'Admin\Home::index', ['filter' => 'homeFilter']);

$routes->group('/dashboard', ['filter' => 'homeFilter'], function($routes) {
    $routes->get('', 'Admin\Home::index');
    $routes->get('home', 'Admin\Home::index');
});
$routes->get('/home', 'Admin\Home::index', ['filter' => 'auth']);

$routes->get('/profile', 'User\Profile::index', ['filter' => 'userFilter']);

$routes->group('/departemen', ['filter' => 'auth'], function($routes) {
    $routes->get('', 'Admin\Departemen::index');
    $routes->get('add_departemen', 'Admin\Departemen::add_departemen');
    $routes->post('save_departemen', 'Admin\Departemen::save_departemen');
    $routes->get('edit_departemen/(:num)', 'Admin\Departemen::edit_departemen/$1');
    $routes->post('update_departemen/(:num)', 'Admin\Departemen::update_departemen/$1');
    $routes->post('delete_departemen', 'Admin\Departemen::delete_departemen');
});

$routes->group('/tingkatan', ['filter' => 'auth'], function($routes) {
    $routes->get('', 'Admin\Tingkatan::index');
    $routes->get('(:num)', 'Admin\Tingkatan::view_tingkatan/$1');
    $routes->get('add_tingkatan', 'Admin\Tingkatan::add_tingkatan');
    $routes->post('save_tingkatan', 'Admin\Tingkatan::save_tingkatan');
    $routes->get('edit_tingkatan/(:num)', 'Admin\Tingkatan::edit_tingkatan/$1');
    $routes->post('update_tingkatan/(:num)', 'Admin\Tingkatan::update_tingkatan/$1');
    $routes->post('delete_tingkatan', 'Admin\Tingkatan::delete_tingkatan');
});

$routes->group('/karyawan', ['filter' => 'auth'], function($routes) {
    $routes->get('', 'Admin\Karyawan::index');
    $routes->get('view_karyawan', 'Admin\Karyawan::index');
    $routes->get('view_karyawan/(:num)', 'Admin\Karyawan::view_karyawan/$1');
    $routes->get('add_karyawan', 'Admin\Karyawan::add_karyawan');
    $routes->post('save_karyawan', 'Admin\Karyawan::save_karyawan');
    $routes->get('edit_karyawan/(:num)', 'Admin\Karyawan::edit_karyawan/$1');
    $routes->post('update_karyawan/(:num)', 'Admin\Karyawan::update_karyawan/$1');
    $routes->post('delete_karyawan', 'Admin\Karyawan::delete_karyawan');
});

$routes->group('/payroll', ['filter' => 'auth'], function($routes) {
    $routes->get('', 'Admin\Payroll::index');
    $routes->get('add_payroll', 'Admin\Payroll::add_payroll');
    $routes->post('save_payroll', 'Admin\Payroll::save_payroll');
    $routes->get('edit_payroll/(:num)', 'Admin\Payroll::edit_payroll/$1');
    $routes->post('update_payroll/(:num)', 'Admin\Payroll::update_payroll/$1');
    $routes->post('delete_payroll', 'Admin\Payroll::delete_payroll');
});

$routes->group('/payslip', ['filter' => 'auth'], function($routes) {
    $routes->get('', 'Admin\Payslip::index');
    $routes->get('view_payslip', 'Admin\Payslip::index');
    $routes->get('view_payslip/(:num)', 'Admin\Payslip::view_payslip/$1');
    $routes->get('add_payslip', 'Admin\Payslip::add_payslip');
    $routes->post('save_payslip', 'Admin\Payslip::save_payslip');
    $routes->get('edit_payslip/(:num)', 'Admin\Payslip::edit_payslip/$1');
    $routes->post('update_payslip/(:num)', 'Admin\Payslip::update_payslip/$1');
    $routes->post('delete_payslip', 'Admin\Payslip::delete_payslip');
});

$routes->group('/payslipkaryawan', ['filter' => 'userFilter'], function($routes) {
    $routes->get('', 'User\PayslipKaryawan::index');
    $routes->get('view_payslipkaryawan', 'User\PayslipKaryawan::view_payslip');
    $routes->get('view_payslipkaryawan/(:num)', 'User\PayslipKaryawan::view_payslipkaryawan/$1');

});


// $routes->group('/kehadiran', ['filter' => 'auth'], function($routes) {
//     $routes->get('', 'Admin\Kehadiran::index');
//     $routes->get('kehadiran_karyawan/(:num)', 'Admin\Kehadiran::kehadiran_karyawan/$1');
//     $routes->get('add_kehadiran/(:num)', 'Admin\Kehadiran::add_kehadiran/$1');
//     $routes->post('save_kehadiran', 'Admin\Kehadiran::save_kehadiran');
//     $routes->get('kehadiran_karyawan/edit_kehadiran/(:num)', 'Admin\Kehadiran::edit_kehadiran/$1');
//     $routes->post('kehadiran_karyawan/update_kehadiran/(:num)', 'Admin\Kehadiran::update_kehadiran/$1');
//     $routes->post('kehadiran_karyawan/delete_kehadiran', 'Admin\Kehadiran::delete_kehadiran');
// });

$routes->group('/login', function($routes) {
    $routes->get('', 'Login::index');
    $routes->get('login', ' Login::login');
    $routes->get('logout', 'Login::logout');
    $routes->get('(:any)', 'Login::index');
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
