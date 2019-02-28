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
$router->get('/account/forgot/password', 'Authentication#getForgotPassword', 'forgotPassword');
$router->get('/account/forgot/password/:id/validation', 'Authentication#getValidationChangePassword', 'lostPasswordValidation')->with('id', '[\d]+');

// USER \\
$router->get('/account/dashboard', 'User#getDashboard', 'dashboard');
$router->get('/user/:id/profile', 'User#getProfile', 'profile');
$router->get('/user/validate/email/generation', 'User#getEmailValidationKey', 'emailKeyGenValidation');
$router->get('/user/validate/phonenumber/generation', 'User#getPhoneNumberValidationKey', 'phoneNumberKeyGenValidation');

// PROJECTS \\
$router->get('/project/create', 'Projects#getCreateProject', 'createProject');
$router->get('/project/profile/:id', 'Projects#getProfile', 'profileProject')->with('id', '[\d]+');
$router->get('/project/edit/:id', 'Projects#getEditProfile', 'editProject')->with('id', '[\d]+');
$router->get('/project/delete/:id', 'Projects#deleteProject', 'deleteProject')->with('id', '[\d]+');
$router->get('/project/undodelete/:id', 'Projects#undoDeleteProject', 'undoDeleteProject')->with('id', '[\d]+');
/* -[{POST}]- */

// AUTH \\
$router->post('/account/login', 'Authentication#postLogin', 'plogin');
$router->post('/account/register', 'Authentication#postRegister', 'pregister');
$router->post('/account/forgot/password', 'Authentication#postForgotPassword', 'pForgotPassword');
$router->post('/account/validate/passwordchange', 'Authentication#postValidateNewPassword', 'pValidationLostPassword');

// USER \\
$router->post('/user/edit/email', 'User#postEmailChange', 'pEmailChange');
$router->post('/user/edit/password', 'User#postPasswordChange', 'pPasswordChange');
$router->post('/user/edit/phonenumber', 'User#postPhoneNumberChange', 'pPhoneNumberChange');
$router->post('/user/validate/email', 'User#postValidateEmail', 'pEmailValidation');
$router->post('/user/validate/phonenumber', 'User#postValidatePhoneNumber', 'pPhoneNumberValidation');
$router->post('/user/edit/banner', 'User#postBannerChange', 'pBannerChange');
$router->post('/user/edit/confidentiality', 'User#postConfidentialityChange', 'pConfidentialityChange');
// PROJECTS \\
$router->post('/project/create', 'Projects#postCreateProject', 'pcreateproject');
$router->post('/project/edit', 'Projects#postEditProject', 'peditproject');