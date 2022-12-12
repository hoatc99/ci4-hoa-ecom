<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->resource('/admin/orders', ['websafe' => 1, 'controller' => 'Admin\OrderController', 'placeholder' => '(:num)']);
$routes->post('/admin/products/(:num)/disable', 'Admin\ProductController::disable/$1');
$routes->post('/admin/products/(:num)/enable', 'Admin\ProductController::enable/$1');
$routes->resource('/admin/products', ['websafe' => 1, 'controller' => 'Admin\ProductController', 'placeholder' => '(:num)']);
$routes->resource('/admin/categories', ['websafe' => 1, 'controller' => 'Admin\CategoryController', 'placeholder' => '(:num)', 'excepts' => ['new, edit']]);
$routes->resource('/admin/brands', ['websafe' => 1, 'controller' => 'Admin\BrandController', 'placeholder' => '(:num)', 'excepts' => ['new, edit']]);
$routes->resource('/admin/users', ['websafe' => 1, 'controller' => 'Admin\UserController', 'placeholder' => '(:num)', 'excepts' => ['new, edit']]);
$routes->get('/admin/logout', 'Admin\HomeController::logout');
$routes->post('/admin/login', 'Admin\HomeController::auth');
$routes->get('/admin/login', 'Admin\HomeController::login');
$routes->get('/admin', 'Admin\HomeController::index');

$routes->get('/contact', 'ClientController::contact');
$routes->get('/about', 'ClientController::about');
$routes->get('/blog', 'ClientController::blog');
$routes->post('/order/success', 'ClientController::order_placed');
$routes->post('/order/create', 'ClientController::place_order');
$routes->get('/order/checkout', 'ClientController::checkout');
$routes->get('/cart/remove/(:num)', 'ClientController::remove_from_cart/$1');
$routes->post('/cart/update', 'ClientController::update_cart');
$routes->post('/cart/add/(:num)', 'ClientController::add_to_cart/$1');
$routes->get('/cart', 'ClientController::cart');
$routes->get('/product/(:any)', 'ClientController::single/$1');
$routes->get('/product', 'ClientController::product');
$routes->get('/', 'ClientController::index');

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
