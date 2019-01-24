<?php

/* -[{GET}]- */
$router->get('/404', 'Index#getNotFound', 'default');
$router->get('/', 'Index#getHomepage', 'home');
$router->get('/terms/terms-of-service', 'Index#getMentions', 'terms');

// AUTH \\
$router->get('/account/login', 'User#getLogin', 'login');
$router->get('/account/register', 'User#getRegister', 'register');

/* -[{POST}]- */

// AUTH \\
$router->post('/account/login', 'User#postLogin', 'plogin');
$router->post('/account/register', 'User#postRegister', 'pregister');