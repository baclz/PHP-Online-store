<?php

const MIDDLEWARE = [
    'auth' => myfrx\middleware\Auth::class,
    'guest' => \myfrx\middleware\Guest::class,
];
//Pages
$router->get('', 'index.php');
$router->get('about', 'about.php');
$router->get('product', 'product.php');
$router->get('product/laptops', 'product/laptops.php');
$router->get('product/tablets', 'product/tablets.php');
$router->get('product/phones', 'product/phones.php');
$router->get('cart', 'cart.php');
$router->get('payment', 'payment.php');
// Auth/Reg
$router->get('register', 'users/register.php')->only('guest');
$router->post('register/form', 'users/check/registerF.php')->only('guest');
$router->get('login', 'users/login.php')->only('guest');
$router->post('login/form', 'users/check/loginF.php')->only('guest');
$router->get('logout', 'users/logout.php')->only('auth');
// Admin
$router->get('admin', 'admin/admin.php')->only('auth');
$router->get('admin/create', 'admin/createProduct.php')->only('auth');
$router->post('admin/product', 'admin/check/createProductF.php')->only('auth');
$router->get('admin/delete', 'admin/check/delete.php')->only('auth');
