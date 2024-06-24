<?php

// registration
$router->get('/', 'index.php');
$router->get('/register', 'registration/create.php');
$router->post('/register', 'registration/store.php');

// orders
$router->get('/order', 'order/create.php');
$router->post('/order', 'order/store.php');

// search
$router->get('/search', 'live_search.php');
