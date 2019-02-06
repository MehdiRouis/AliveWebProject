<?php

/* -[{GET}]- */
$router->get('/404', 'Index#getNotFound', 'default');
$router->get('/', 'Index#getHomepage', 'home');
$router->get('/terms/terms-of-service', 'Index#getNotice', 'legalNotice');
$router->get('/terms/privacy-policy', 'Index#getPrivacyPolicy', 'privacyPolicy');

// AUTH \\
$router->get('/account/login', 'Authentication#getLogin', 'login');
$router->get('/account/register', 'Authentication#getRegister', 'register');
$router->get('/account/logout', 'Authentication#getLogout', 'logout');

// USER \\
$router->get('/account/dashboard', 'User#getDashboard', 'dashboard');
$router->get('/user/:id/profile', 'User#getProfile', 'profile');

// PROJECTS \\
$router->get('/project/create', 'Projects#getCreateProject', 'createProject');
$router->get('/project/profile/:id', 'Projects#getProfile', 'profileProject')->with('id', '[\d]+');

/* -[{POST}]- */

// AUTH \\
$router->post('/account/login', 'Authentication#postLogin', 'plogin');
$router->post('/account/register', 'Authentication#postRegister', 'pregister');

// USER \\
$router->post('/user/edit/email', 'User#postEmailChange', 'pEmailChange');
$router->post('/user/edit/password', 'User#postPasswordChange', 'pPasswordChange');
$router->post('/user/edit/phonenumber', 'User#postPhoneNumberChange', 'pPhoneNumberChange');

// PROJECTS \\
$router->post('/project/create', 'Projects#postCreateProject', 'pcreateproject');




// ----- ADMINISTRATION  ----- \\
/* -[{GET}]- */
$router->get('/administration/dashboard', 'Administration#getDashboard', 'padmindashboard');

/* -[{POST}]- */