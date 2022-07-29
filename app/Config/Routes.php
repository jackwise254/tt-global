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
$routes->get('login', 'Login::index');
$routes->get('/', 'Home::index',['filter' => 'auth']);
// CRUD RESTful Routes
$routes->get('users-list', 'UserCrud::index',['filter' => 'auth']);
$routes->get('user-form', 'UserCrud::create',['filter' => 'auth']);
$routes->get('vendor-form', 'Vendor::index',['filter' => 'auth']);
$routes->get('customer-form', 'Vendor::customer',['filter' => 'auth']);
$routes->post('submit-form', 'UserCrud::store',['filter' => 'auth']);
$routes->get('edit-view/(:num)', 'UserCrud::singleUser/$1',['filter' => 'auth']);
$routes->post('update', 'UserCrud::update',['filter' => 'auth']);
$routes->post('updatevendor', 'Vendor::update',['filter' => 'auth']);
$routes->post('updatecustomer', 'Vendor::updatec',['filter' => 'auth']);

$routes->get('delete/(:num)', 'UserCrud::delete/$1',['filter' => 'auth']);
$routes->get('/', 'SignupController::index',['filter' => 'auth']);
$routes->get('/signup', 'SignupController::index',['filter' => 'auth']);
$routes->get('/signin', 'SigninController::index',['filter' => 'auth']);
$routes->get('/scanning', 'SigninController::scanning',['filter' => 'auth']);
$routes->post('/barcodesimport', 'SigninController::barcodesimport',['filter' => 'auth']);
$routes->get('/dashboard', 'Dashboard::index',['filter' => 'auth']);
$routes->get('products-list', 'ProductsCrud::index',['filter' => 'auth']);
$routes->get('product-list', 'ProductsCrud::more',['filter' => 'auth']);
$routes->get('products-form', 'ProductsCrud::create',['filter' => 'auth']);
$routes->get('wproducts-form', 'Warranty::wcreate',['filter' => 'auth']);
$routes->post('submit-products', 'ProductsCrud::store',['filter' => 'auth']);
$routes->post('submit-faulty', 'Warranty::store',['filter' => 'auth']);
$routes->post('submit-wproducts', 'Warranty::wstore',['filter' => 'auth']);
$routes->post('submit-invoice', 'ProductsCrud::storei',['filter' => 'auth']);
$routes->post('submit-delivery', 'ProductsCrud::deliverr',['filter' => 'auth']);
$routes->get('edit-products/(:num)', 'ProductsCrud::singleProduct/$1',['filter' => 'auth']);
$routes->post('update-products', 'ProductsCrud::update',['filter' => 'auth']);
$routes->post('update-fproducts', 'ProductsCrud::updatef',['filter' => 'auth']);

// 
$routes->get('delete-products/(:num)', 'ProductsCrud::delete/$1',['filter' => 'auth']);
$routes->get('/home-view', 'SigninController::home',['filter' => 'auth']); 
$routes->get('/stock-view', 'ProductsCrud::stock',['filter' => 'auth']);
$routes->get('/stockt-view', 'ProductsCrud::stockt',['filter' => 'auth']);
$routes->get('/invoice-view', 'ProductsCrud::invoiceView',['filter' => 'auth']);
$routes->get('/verify', 'ProductsCrud::verify',['filter' => 'auth']);
$routes->get('/warranty', 'ProductsCrud::warranty',['filter' => 'auth']);
$routes->get('/warrantyout', 'Warranty::warrantyout',['filter' => 'auth']);
$routes->get('/warranty-in', 'ProductsCrud::warrantyIn',['filter' => 'auth']);
$routes->get("list-student", "Student::listStudent");
$routes->get("generate-pdf", "ProductsCrud::generatePDF");
$routes->get('/delivery-note', 'ProductsCrud::deliver',['filter' => 'auth']);
$routes->get('/inventory-view', 'ProductsCrud::inventoryView',['filter' => 'auth']);
$routes->get('/actions', 'ProductsCrud::actions',['filter' => 'auth']);

$routes->get('/reports', 'ProductsCrud::reports',['filter' => 'auth']);
$routes->get('/inventory-more', 'ProductsCrud::moreList',['filter' => 'auth']);
$routes->get('recieve-goods', 'ProductsCrud::input',['filter' => 'auth']);
$routes->get('/code-view', 'Qrcontroller::qrcodeGenerator',['filter' => 'auth']);
$routes->get('invoice-list', 'ProductsCrud::ajaxList',['filter' => 'auth']);
$routes->get('invoice-page', 'ProductsCrud::invoicePage',['filter' => 'auth']);
$routes->get('invoice-viewed', 'ProductsCrud::invoiceViewid',['filter' => 'auth']);
$routes->post('/import-csv-to-database', 'ProductsCrud::import',['filter' => 'auth']);
$routes->get('/pdf-print', 'ProductsCrud::indexpdf',['filter' => 'auth']);
$routes->get('/bar-test', 'ProductsCrud::barTest',['filter' => 'auth']);
$routes->get('/delivery-create', 'ProductsCrud::deliveryCreate',['filter' => 'auth']);
$routes->get('/job-create', 'ProductsCrud::jobCreate',['filter' => 'auth']);
$routes->get('/clear', 'ProductsCrud::clear',['filter' => 'auth']);


$routes->get('/debit-create', 'ProductsCrud::debitcreate',['filter' => 'auth']);
$routes->get('/faulty-create', 'ProductsCrud::faultycreate',['filter' => 'auth']);


$routes->get('/debit-note', 'ProductsCrud::debitnote',['filter' => 'auth']);
$routes->get('/fualty-note', 'ProductsCrud::fualtynote',['filter' => 'auth']);

$routes->get('/warranty-create', 'ProductsCrud::warrantyadd',['filter' => 'auth']);
$routes->get('/credit-create', 'ProductsCrud::creditadd',['filter' => 'auth']);
$routes->get('/warrant', 'ProductsCrud::warrant',['filter' => 'auth']);
$routes->get('/credit', 'ProductsCrud::credit',['filter' => 'auth']);
$routes->get('/verify-create', 'ProductsCrud::verifyCreate',['filter' => 'auth']);
$routes->get('/spreadsheet-create', 'ProductsCrud::SpreCreate',['filter' => 'auth']);
$routes->get('/multiple', 'ProductsCrud::multiple',['filter' => 'auth']);
$routes->get('/submit-multiples', 'ProductsCrud::multiples',['filter' => 'auth']);
$routes->get('/techpanel', 'ProductsCrud::regular',['filter' => 'auth']);
$routes->get('/load', 'ProductsCrud::load',['filter' => 'auth']);
$routes->get('/fualty-stock', 'ProductsCrud::faulty',['filter' => 'auth']);
$routes->get('/load', 'ProductsCrud::Settings',['filter' => 'auth']);
$routes->get('vendors-list', 'UserCrud::vendor',['filter' => 'auth']);
$routes->get('customer-list', 'UserCrud::customer',['filter' => 'auth']);
$routes->get('spreadsheet', 'Settings::spreadsheet',['filter' => 'auth']);
$routes->get('spreadsheetc', 'Settings::spreadsheetc',['filter' => 'auth']);
$routes->get('spreadsheetd', 'Settings::spreadsheetd',['filter' => 'auth']);
$routes->get('spreadsheetfo', 'Settings::spreadsheetfo',['filter' => 'auth']);
$routes->get('spreadsheets', 'Settings::spreadsheets',['filter' => 'auth']);
$routes->get('spreadsheetw', 'Settings::spreadsheetw',['filter' => 'auth']);
$routes->get('spreadsheetp', 'Settings::spreadsheetp',['filter' => 'auth']);
$routes->get('spreadsheetpwi', 'Settings::spreadsheetpwi',['filter' => 'auth']);
$routes->get('spreadsheetpfi', 'Settings::spreadsheetpfi',['filter' => 'auth']);
$routes->get('spreadsheetv', 'Settings::spreadsheetv',['filter' => 'auth']);
$routes->get('spreadsheetf', 'Settings::spreadsheetf',['filter' => 'auth']);
$routes->get('spreadsheetfd', 'Settings::spreadsheetfd',['filter' => 'auth']);
$routes->get('spreadsheetr', 'Settings::spreadsheetr',['filter' => 'auth']);
$routes->get('spreadsheetwi', 'Settings::spreadsheetwi',['filter' => 'auth']);
$routes->get('spreadsheetsto', 'Settings::spreadsheetsto',['filter' => 'auth']);
$routes->get('fetchwarrantyspre', 'Settings::fetchwarrantyspre',['filter' => 'auth']);

$routes->get('spreadsheetna', 'Product::spreadsheetfna',['filter' => 'auth']);
$routes->get('spreadsheetua', 'Product::spreadsheetua',['filter' => 'auth']);
$routes->get('spreadsheetra', 'Product::spreadsheetra',['filter' => 'auth']);
$routes->get('spreadsheetnl', 'Product::spreadsheetnl',['filter' => 'auth']);
$routes->get('spreadsheetul', 'Product::spreadsheetul',['filter' => 'auth']);
$routes->get('spreadsheetrl', 'Product::spreadsheetrl',['filter' => 'auth']);
$routes->get('spreadsheetnd', 'Product::spreadsheetnd',['filter' => 'auth']);
$routes->get('spreadsheetud', 'Product::spreadsheetud',['filter' => 'auth']);
$routes->get('spreadsheetrd', 'Product::spreadsheetrd',['filter' => 'auth']);
$routes->get('spreadsheetfs', 'Product::spreadsheetfs',['filter' => 'auth']);
$routes->get('spreadsheetfp', 'Product::spreadsheetfp',['filter' => 'auth']);
$routes->get('printerssp', 'Product::printerssp',['filter' => 'auth']);

$routes->post('faultyimport', 'Settings::importCsvToDb',['filter' => 'auth']);
$routes->post('masterimport', 'Settings::importCsvToM',['filter' => 'auth']);
$routes->post('warrantyimport', 'Settings::importCsvToW',['filter' => 'auth']);

$routes->get('/Ndesktop', 'Warranty::Ndesktop',['filter' => 'auth']);
$routes->get('/Odesktop', 'Warranty::Odesktop',['filter' => 'auth']);
$routes->get('/Rdesktop', 'Warranty::Rdesktop',['filter' => 'auth']);
$routes->get('/Nlcd', 'Warranty::Nlcd',['filter' => 'auth']);
$routes->get('/Ulcd', 'Warranty::Ulcd',['filter' => 'auth']);
$routes->get('/Rlcd', 'Warranty::Rlcd',['filter' => 'auth']);
$routes->get('/Nlaptop', 'Warranty::Nlaptop',['filter' => 'auth']);
$routes->get('/Olaptop', 'Warranty::Olaptop',['filter' => 'auth']);
$routes->get('/Rlaptop', 'Warranty::Rlaptop',['filter' => 'auth']);
$routes->get('/Nallinone', 'Warranty::Nallinone',['filter' => 'auth']);
$routes->get('/smartphone', 'Warranty::smartphone',['filter' => 'auth']);
$routes->get('/tablet', 'Warranty::tablet',['filter' => 'auth']);
$routes->get('/others', 'Warranty::others',['filter' => 'auth']);

$routes->get('/Rmacbook', 'Warranty::Rmacbook',['filter' => 'auth']);
$routes->get('/Umacbook', 'Warranty::Umacbook',['filter' => 'auth']);
$routes->get('/Nmacbook', 'Warranty::Nmacbook',['filter' => 'auth']);
$routes->get('/Rworkstation', 'Warranty::Rworkstation',['filter' => 'auth']);
$routes->get('/Uworkstation', 'Warranty::Uworkstation',['filter' => 'auth']);
$routes->get('/Nworkstation', 'Warranty::Nworkstation',['filter' => 'auth']);
$routes->get('/Userver', 'Warranty::Userver',['filter' => 'auth']);
$routes->get('/Nserver', 'Warranty::Nserver',['filter' => 'auth']);
$routes->get('/Rserver', 'Warranty::Rserver',['filter' => 'auth']);
$routes->get('/Rimac', 'Warranty::Rimac',['filter' => 'auth']);
$routes->get('/Uimac', 'Warranty::Uimac',['filter' => 'auth']);
$routes->get('/Nimac', 'Warranty::Nimac',['filter' => 'auth']);

// stock out
$routes->get('/Rmacbooks', 'Warranty::Rmacbooks',['filter' => 'auth']);
$routes->get('/Umacbooks', 'Warranty::Umacbooks',['filter' => 'auth']);
$routes->get('/Nmacbooks', 'Warranty::Nmacbooks',['filter' => 'auth']);
$routes->get('/Rworkstations', 'Warranty::Rworkstations',['filter' => 'auth']);
$routes->get('/Uworkstations', 'Warranty::Uworkstations',['filter' => 'auth']);
$routes->get('/Nworkstations', 'Warranty::Nworkstations',['filter' => 'auth']);
$routes->get('/Uservers', 'Warranty::Uservers',['filter' => 'auth']);
$routes->get('/Nservers', 'Warranty::Nservers',['filter' => 'auth']);
$routes->get('/Rservers', 'Warranty::Rservers',['filter' => 'auth']);
$routes->get('/Rimacs', 'Warranty::Rimacs',['filter' => 'auth']);
$routes->get('/Uimacs', 'Warranty::Uimacs',['filter' => 'auth']);
$routes->get('/Nimacs', 'Warranty::Nimacs',['filter' => 'auth']);
// end

// faulty
$routes->get('/Rmacbookf', 'Warranty::Rmacbookf',['filter' => 'auth']);
$routes->get('/Umacbookf', 'Warranty::Umacbookf',['filter' => 'auth']);
$routes->get('/Nmacbookf', 'Warranty::Nmacbookf',['filter' => 'auth']);
$routes->get('/Rworkstationf', 'Warranty::Rworkstationf',['filter' => 'auth']);
$routes->get('/Uworkstationf', 'Warranty::Uworkstationf',['filter' => 'auth']);
$routes->get('/Nworkstationf', 'Warranty::Nworkstationf',['filter' => 'auth']);
$routes->get('/Userverf', 'Warranty::Userverf',['filter' => 'auth']);
$routes->get('/Nserverf', 'Warranty::Nserverf',['filter' => 'auth']);
$routes->get('/Rserverf', 'Warranty::Rserverf',['filter' => 'auth']);
$routes->get('/Rimacf', 'Warranty::Rimacf',['filter' => 'auth']);
$routes->get('/Uimacf', 'Warranty::Uimacf',['filter' => 'auth']);
$routes->get('/Nimacf', 'Warranty::Nimacf',['filter' => 'auth']);
// end

// warranty
$routes->get('/Rmacbookw', 'Warranty::Rmacbookw',['filter' => 'auth']);
$routes->get('/Umacbookw', 'Warranty::Umacbookw',['filter' => 'auth']);
$routes->get('/Nmacbookw', 'Warranty::Nmacbookw',['filter' => 'auth']);
$routes->get('/Rworkstationw', 'Warranty::Rworkstationw',['filter' => 'auth']);
$routes->get('/Uworkstationw', 'Warranty::Uworkstationw',['filter' => 'auth']);
$routes->get('/Nworkstationw', 'Warranty::Nworkstationw',['filter' => 'auth']);
$routes->get('/Userverw', 'Warranty::Userverw',['filter' => 'auth']);
$routes->get('/Nserverw', 'Warranty::Nserverw',['filter' => 'auth']);
$routes->get('/Rserverw', 'Warranty::Rserverw',['filter' => 'auth']);
$routes->get('/Rimacw', 'Warranty::Rimacw',['filter' => 'auth']);
$routes->get('/Uimacw', 'Warranty::Uimacw',['filter' => 'auth']);
$routes->get('/Nimacw', 'Warranty::Nimacw',['filter' => 'auth']);
// end

// warrantyout
$routes->get('/Rmacbookwo', 'Warranty::Rmacbookwo',['filter' => 'auth']);
$routes->get('/Umacbookwo', 'Warranty::Umacbookwo',['filter' => 'auth']);
$routes->get('/Nmacbookwo', 'Warranty::Nmacbookwo',['filter' => 'auth']);
$routes->get('/Rworkstationwo', 'Warranty::Rworkstationwo',['filter' => 'auth']);
$routes->get('/Uworkstationwo', 'Warranty::Uworkstationwo',['filter' => 'auth']);
$routes->get('/Nworkstationwo', 'Warranty::Nworkstationwo',['filter' => 'auth']);
$routes->get('/Userverwo', 'Warranty::Userverwo',['filter' => 'auth']);
$routes->get('/Nserverwo', 'Warranty::Nserverwo',['filter' => 'auth']);
$routes->get('/Rserverwo', 'Warranty::Rserverwo',['filter' => 'auth']);
$routes->get('/Rimacwo', 'Warranty::Rimacwo',['filter' => 'auth']);
$routes->get('/Uimacwo', 'Warranty::Uimacwo',['filter' => 'auth']);
$routes->get('/Nimacwo', 'Warranty::Nimacwo',['filter' => 'auth']);
// end

$routes->get('/Oallinone', 'Warranty::Oallinone',['filter' => 'auth']);
$routes->get('/Rallinone', 'Warranty::Rallinone',['filter' => 'auth']);
$routes->get('/ssd', 'Warranty::ssd',['filter' => 'auth']);
$routes->get('/hdd', 'Warranty::hdd',['filter' => 'auth']);
$routes->get('/ram', 'Warranty::ram',['filter' => 'auth']);
$routes->get('/debit', 'Warranty::debit',['filter' => 'auth']);
$routes->get('/tload', 'Warranty::tload',['filter' => 'auth']);


$routes->get('/Ndesktopsp', 'Warranty::Ndesktopsp',['filter' => 'auth']);
$routes->get('/Odesktopsp', 'Warranty::Odesktopsp',['filter' => 'auth']);
$routes->get('/Rdesktopsp', 'Warranty::Rdesktopsp',['filter' => 'auth']);
$routes->get('/Nlaptopsp', 'Warranty::Nlaptopsp',['filter' => 'auth']);
$routes->get('/Olaptopsp', 'Warranty::Olaptopsp',['filter' => 'auth']);
$routes->get('/Rlaptopsp', 'Warranty::Rlaptopsp',['filter' => 'auth']);
$routes->get('/Nallinonesp', 'Warranty::Nallinonesp',['filter' => 'auth']);
$routes->get('/Oallinonesp', 'Warranty::Oallinonesp',['filter' => 'auth']);
$routes->get('/Rallinonesp', 'Warranty::Rallinonesp',['filter' => 'auth']);
$routes->get('/ssdsp', 'Warranty::ssdsp',['filter' => 'auth']);
$routes->get('/hddsp', 'Warranty::hddsp',['filter' => 'auth']);
$routes->get('/ramsp', 'Warranty::ramsp',['filter' => 'auth']);
$routes->get('/debitsp', 'Warranty::debitsp',['filter' => 'auth']);
$routes->get('/tloadsp', 'Warranty::tloadsp',['filter' => 'auth']);

// spreadsheet for stockout
$routes->get('/Ndesktopspot', 'Warranty::Ndesktopspot',['filter' => 'auth']);
$routes->get('/Odesktopspot', 'Warranty::Odesktopspot',['filter' => 'auth']);
$routes->get('/Rdesktopspot', 'Warranty::Rdesktopspot',['filter' => 'auth']);
$routes->get('/Nlaptopspot', 'Warranty::Nlaptopspot',['filter' => 'auth']);
$routes->get('/Olaptopspot', 'Warranty::Olaptopspot',['filter' => 'auth']);
$routes->get('/Rlaptopspot', 'Warranty::Rlaptopspot',['filter' => 'auth']);
$routes->get('/Nallinonespot', 'Warranty::Nallinonespot',['filter' => 'auth']);
$routes->get('/Oallinonespot', 'Warranty::Oallinonespot',['filter' => 'auth']);
$routes->get('/Rallinonespot', 'Warranty::Rallinonespot',['filter' => 'auth']);
$routes->get('/ssdspot', 'Warranty::ssdspot',['filter' => 'auth']);
$routes->get('/hddspot', 'Warranty::hddspot',['filter' => 'auth']);
$routes->get('/ramspot', 'Warranty::ramspot',['filter' => 'auth']);
$routes->get('/debitspot', 'Warranty::debitspot',['filter' => 'auth']);
$routes->get('/tloadspot', 'Warranty::tloadspot',['filter' => 'auth']);
// ---//


$routes->get('/Ndesktopfo', 'Login::Ndesktop',['filter' => 'auth']);
$routes->get('/test', 'Login::test',['filter' => 'auth']);

$routes->get('/Odesktopfo', 'Login::Odesktop',['filter' => 'auth']);
$routes->get('/Rdesktopfo', 'Login::Rdesktop',['filter' => 'auth']);
$routes->get('/Nlaptopfo', 'Login::Nlaptop',['filter' => 'auth']);
$routes->get('/Olaptopfo', 'Login::Olaptop',['filter' => 'auth']);
$routes->get('/Rlaptopfo', 'Login::Rlaptop',['filter' => 'auth']);
$routes->get('/Nallinonefo', 'Login::Nallinone',['filter' => 'auth']);
$routes->get('/smartphonefo', 'Login::smartphonefo',['filter' => 'auth']);
$routes->get('/tabletfo', 'Login::tabletfo',['filter' => 'auth']);
$routes->get('/othersfo', 'Login::othersfo',['filter' => 'auth']);
$routes->get('/rlcdfo', 'Login::rlcdfo',['filter' => 'auth']);
$routes->get('/nlcdfo', 'Login::nlcdfo',['filter' => 'auth']);
$routes->get('/ulcdfo', 'Login::ulcdfo',['filter' => 'auth']);


$routes->get('/Oallinonefo', 'Login::Oallinone',['filter' => 'auth']);
$routes->get('/Rallinonefo', 'Login::Rallinone',['filter' => 'auth']);
$routes->get('/ssdfo', 'Login::ssd',['filter' => 'auth']);
$routes->get('/hddfo', 'Login::hdd',['filter' => 'auth']);
$routes->get('/ramfo', 'Login::ram',['filter' => 'auth']);
$routes->get('/printerfo', 'Login::printerfo',['filter' => 'auth']);
$routes->get('/debitfo', 'Login::debit',['filter' => 'auth']);
$routes->get('/tloadfo', 'Login::tload',['filter' => 'auth']);
$routes->get('/totalfo', 'Login::totalfo',['filter' => 'auth']);
$routes->post('recyclebin', 'Login::recyclebin',['filter' => 'auth']);

$routes->get('/Ndesktopwo', 'Register::Ndesktop',['filter' => 'auth']);
$routes->get('/Odesktopwo', 'Register::Odesktop',['filter' => 'auth']);
$routes->get('/Rdesktopwo', 'Register::Rdesktop',['filter' => 'auth']);
$routes->get('/Nlaptopwo', 'Register::Nlaptop',['filter' => 'auth']);
$routes->get('/Olaptopwo', 'Register::Olaptop',['filter' => 'auth']);
$routes->get('/Rlaptopwo', 'Register::Rlaptop',['filter' => 'auth']);
$routes->get('/Nallinonewo', 'Register::Nallinone',['filter' => 'auth']);

$routes->get('/ulcdwo', 'Register::ulcdwo',['filter' => 'auth']);
$routes->get('/rlcdwo', 'Register::rlcdwo',['filter' => 'auth']);
$routes->get('/nlcdwo', 'Register::nlcdwo',['filter' => 'auth']);


$routes->get('/smartphonewo', 'Register::smartphonewo',['filter' => 'auth']);
$routes->get('/tabletwo', 'Register::tabletwo',['filter' => 'auth']);
$routes->get('/otherswo', 'Register::otherswo',['filter' => 'auth']);

$routes->get('/Oallinonewo', 'Register::Oallinone',['filter' => 'auth']);
$routes->get('/Rallinonewo', 'Register::Rallinone',['filter' => 'auth']);
$routes->get('/ssdwo', 'Register::ssd',['filter' => 'auth']);
$routes->get('/hddwo', 'Register::hdd',['filter' => 'auth']);
$routes->get('/ramwo', 'Register::ram',['filter' => 'auth']);
$routes->get('/warrantyoutv', 'Register::warrantyoutv',['filter' => 'auth']);

$routes->get('/Ndesktopf', 'Product::Ndesktop',['filter' => 'auth']);
$routes->get('/Odesktopf', 'Product::Odesktop',['filter' => 'auth']);
$routes->get('/Rdesktopf', 'Product::Rdesktop',['filter' => 'auth']);
$routes->get('/Nlaptopf', 'Product::Nlaptop',['filter' => 'auth']);
$routes->get('/Olaptopf', 'Product::Olaptop',['filter' => 'auth']);
$routes->get('/Rlaptopf', 'Product::Rlaptop',['filter' => 'auth']);
$routes->get('/Nallinonef', 'Product::Nallinone',['filter' => 'auth']);
$routes->get('/smartphonef', 'Product::smartphonef',['filter' => 'auth']);
$routes->get('/tabletf', 'Product::tabletf',['filter' => 'auth']);
$routes->get('/othersf', 'Product::othersf',['filter' => 'auth']);

$routes->get('/Oallinonef', 'Product::Oallinone',['filter' => 'auth']);
$routes->get('/Rallinonef', 'Product::Rallinone',['filter' => 'auth']);
$routes->get('/printerf', 'Product::printerf',['filter' => 'auth']);
$routes->get('/nlcdf', 'Product::nlcdf',['filter' => 'auth']);
$routes->get('/ulcdf', 'Product::ulcdf',['filter' => 'auth']);
$routes->get('/rlcdf', 'Product::rlcdf',['filter' => 'auth']);

$routes->get('/ssdf', 'Product::ssd',['filter' => 'auth']);
$routes->get('/hddf', 'Product::hdd',['filter' => 'auth']);
$routes->get('/ramf', 'Product::ram',['filter' => 'auth']);
$routes->get('/debitf', 'Product::debit',['filter' => 'auth']);
$routes->get('/faulty-view', 'Product::faultyv',['filter' => 'auth']);

$routes->get('/fualty-out', 'ProductsCrud::faultyout',['filter' => 'auth']);
$routes->get('/Ndesktops', 'Settings::Ndesktop',['filter' => 'auth']);
$routes->get('/Odesktops', 'Settings::Odesktop',['filter' => 'auth']);
$routes->get('/Rdesktops', 'Settings::Rdesktop',['filter' => 'auth']);
$routes->get('/Nlaptops', 'Settings::Nlaptop',['filter' => 'auth']);
$routes->get('/Olaptops', 'Settings::Olaptop',['filter' => 'auth']);
$routes->get('/Rlaptops', 'Settings::Rlaptop',['filter' => 'auth']);
$routes->get('/Nallinones', 'Settings::Nallinone',['filter' => 'auth']);
$routes->get('/smartphones', 'Settings::smartphones',['filter' => 'auth']);
$routes->get('/tablets', 'Settings::tablets',['filter' => 'auth']);
$routes->get('/otherss', 'Settings::otherss',['filter' => 'auth']);

$routes->get('/Oallinones', 'Settings::Oallinone',['filter' => 'auth']);
$routes->get('/Rallinones', 'Settings::Rallinone',['filter' => 'auth']);
$routes->get('/ssds', 'Settings::ssd',['filter' => 'auth']);
$routes->get('/hdds', 'Settings::hdds',['filter' => 'auth']);
$routes->get('/rams', 'Settings::rams',['filter' => 'auth']);

$routes->get('/nlcdw', 'Settings::nlcdw',['filter' => 'auth']);
$routes->get('/ulcdw', 'Settings::ulcdw',['filter' => 'auth']);
$routes->get('/rlcdw', 'Settings::rlcdw',['filter' => 'auth']);

$routes->get('/ok', 'Settings::ok',['filter' => 'auth']);
$routes->get('/duplicate', 'Settings::duplicate',['filter' => 'auth']);
$routes->get('/wip', 'Settings::wip',['filter' => 'auth']);
$routes->get('/fixed', 'Settings::fixed',['filter' => 'auth']);
// test

// stock out routes
$routes->get('/Ndesktopss',  'vendor::Ndesktop',['filter' => 'auth']);
$routes->get('/Odesktopss', 'vendor::Odesktop',['filter' => 'auth']);
$routes->get('/Rdesktopss', 'vendor::Rdesktop',['filter' => 'auth']);
$routes->get('/Nlaptopss', 'vendor::Nlaptop',['filter' => 'auth']);
$routes->get('/Olaptopss', 'vendor::Olaptop',['filter' => 'auth']);
$routes->get('/Rlaptopss', 'vendor::Rlaptop',['filter' => 'auth']);
$routes->get('/Nallinoness', 'vendor::Nallinone',['filter' => 'auth']);
$routes->get('/smartphoness', 'vendor::smartphoness',['filter' => 'auth']);
$routes->get('/tabletss', 'vendor::tabletss',['filter' => 'auth']);
$routes->get('/othersss', 'vendor::othersss',['filter' => 'auth']);

$routes->get('/nlcds', 'vendor::nlcds',['filter' => 'auth']);
$routes->get('/rlcds', 'vendor::rlcds',['filter' => 'auth']);
$routes->get('/ulcds', 'vendor::ulcds',['filter' => 'auth']);


$routes->get('/Oallinoness', 'vendor::Oallinone',['filter' => 'auth']);
$routes->get('/Rallinoness', 'vendor::Rallinone',['filter' => 'auth']);
$routes->get('/ssdss', 'vendor::ssd',['filter' => 'auth']);
$routes->get('/hddss', 'vendor::hdds',['filter' => 'auth']);
$routes->get('/ramss', 'vendor::rams',['filter' => 'auth']);
$routes->get('/printerss', 'vendor::printerss',['filter' => 'auth']);
$routes->get('/Warrantys', 'vendor::Warrantys',['filter' => 'auth']);
$routes->get('/printers', 'vendor::printers',['filter' => 'auth']);
$routes->get('/credits', 'vendor::credit',['filter' => 'auth']);
$routes->get('/stocktt-view', 'vendor::stockt',['filter' => 'auth']);


$routes->get('/printer', 'Warranty::printer',['filter' => 'auth']);
$routes->get('faulty-load', 'Settings::fload',['filter' => 'auth']);
$routes->get('faulty-summary', 'Settings::fsummary',['filter' => 'auth']);


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
