<?php
/**
 * Copyright (c) 2019. Tous droit réservé.
 */

/**
 * Created by PhpStorm.
 * User: esska
 * Date: 25/01/19
 * Time: 13:34
 */

namespace Controllers;

use Models\Authentication\DBAuth;

class AuthenticationController extends Controller {

    public function getLogin() {
        $this->security->restrict(false);
        $this->render('auth/login', ['pageName' => 'Connexion']);
    }

    public function getRegister() {
        $this->security->restrict(false);
        $captcha = $this->security->generateCaptcha();
        $this->render('auth/register', ['pageName' => 'Inscription', 'captcha' => $captcha, 'scripts' => ['js/register.js']]);
    }

    public function getLogout() {
        $this->security->restrict();
        $this->dbauth->logOut();
    }

    public function postLogin() {
        $this->security->restrict(false);
        $auth = new DBAuth();
        $errors = $auth->logIn('logUsername', 'logPassword');
        $this->render('auth/login', ['pageName' => 'Connexion', 'errors' => $errors]);
    }

    public function postRegister() {
        $this->security->restrict(false);
        $auth = new DBAuth();
        $errors = $auth->register('regUsername', 'regAccountType', 'regLastName', 'regFirstName', 'regEmail', 'regConfirmEmail', 'regPhoneNumber', 'regBirthDay', 'regPassword', 'regConfirmPassword', 'regCaptcha');
        $captcha = $this->security->generateCaptcha();
        $this->render('auth/register', ['pageName' => 'Inscription', 'errors' => $errors, 'scripts' => ['js/register.js'], 'captcha' => $captcha]);
    }
}