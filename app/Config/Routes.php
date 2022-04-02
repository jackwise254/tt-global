<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
// CRUD RESTful Routes
$routes->get('users-list', 'UserCrud::index');
$routes->get('user-form', 'UserCrud::create');
$routes->post('submit-form', 'UserCrud::store');
$routes->get('edit-view/(:num)', 'UserCrud::singleUser/$1');
$routes->post('update', 'UserCrud::update');
$routes->get('delete/(:num)', 'UserCrud::delete/$1');
$routes->get('/', 'SignupController::index');
$routes->get('/signup', 'SignupController::index');
$routes->get('/signin', 'SigninController::index');
$routes->get('/dashboard', 'Dashboard::index',['filter' => 'auth']);
$routes->get('products-list', 'ProductsCrud::index');
$routes->get('product-list', 'ProductsCrud::more');
$routes->get('products-form', 'ProductsCrud::create');
$routes->post('submit-products', 'ProductsCrud::store');
$routes->post('submit-invoice', 'ProductsCrud::storei');
$routes->get('edit-products/(:num)', 'ProductsCrud::singleProduct/$1');
$routes->post('update-products', 'ProductsCrud::update');
$routes->get('delete-products/(:num)', 'ProductsCrud::delete/$1');
$routes->get('/home-view', 'SigninController::home');
$routes->get('/stock-view', 'ProductsCrud::stock');
$routes->get('/stockt-view', 'ProductsCrud::stockt');
$routes->get('/invoice-view', 'ProductsCrud::invoiceView');
$routes->get('/warranty', 'ProductsCrud::warranty');
$routes->get('/warranty-in', 'ProductsCrud::warrantyIn');
$routes->get("list-student", "Student::listStudent");
$routes->get("generate-pdf", "ProductsCrud::generatePDF");
$routes->get('/delivery-note', 'ProductsCrud::deliver');
$routes->get('/inventory-view', 'ProductsCrud::inventoryView');
$routes->get('/inventory-more', 'ProductsCrud::moreList');
$routes->get('recieve-goods', 'ProductsCrud::input');
$routes->get('/code-view', 'Qrcontroller::qrcodeGenerator');
$routes->get('invoice-list', 'ProductsCrud::ajaxList');
$routes->get('invoice-page', 'ProductsCrud::invoicePage');
$routes->get('invoice-viewed', 'ProductsCrud::invoiceViewid');
$routes->post('/import-csv-to-database', 'ProductsCrud::import');
$routes->get('/pdf-print', 'ProductsCrud::indexpdf');
$routes->get('/bar-test', 'ProductsCrud::barTest');
$routes->get('/delivery-create', 'ProductsCrud::deliveryCreate');
$routes->get('/multiple', 'ProductsCrud::multiple');
$routes->get('/submit-multiples', 'ProductsCrud::multiples');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
