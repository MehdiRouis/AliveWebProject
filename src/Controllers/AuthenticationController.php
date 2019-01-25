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

    /**
     * @throws \Exception \App\Views\ViewsExceptions
     */
    public function getLogin() {
        $this->security->restrict(false);
        $this->render('user/login', ['pageName' => 'Connexion']);
    }

    /**
     * @throws \Exception \App\Views\ViewsExceptions
     */
    public function getRegister() {
        $this->security->restrict(false);
        $captcha = $this->security->generateCaptcha();
        $this->render('user/register', ['pageName' => 'Inscription', 'captcha' => $captcha, 'scripts' => ['js/register.js']]);
    }

    public function getLogout() {
        $this->security->restrict();
        $this->dbauth->logOut();
    }

    /**
     * @throws \Exception \App\Views\ViewsExceptions
     */
    public function postLogin() {
        $this->security->restrict(false);
        $auth = new DBAuth();
        $errors = $auth->logIn('logUsername', 'logPassword');
        $this->render('user/login', ['pageName' => 'Connexion', 'errors' => $errors]);
    }

    /**
     * @throws \Exception \App\Views\ViewsExceptions
     */
    public function postRegister() {
        $this->security->restrict(false);
        $auth = new DBAuth();
        $errors = $auth->register('regUsername', 'regAccountType', 'regLastName', 'regFirstName', 'regEmail', 'regConfirmEmail', 'regPhoneNumber', 'regBirthDay', 'regPassword', 'regConfirmPassword', 'regCaptcha');
        $captcha = $this->security->generateCaptcha();
        $this->render('user/register', ['pageName' => 'Inscription', 'errors' => $errors, 'scripts' => ['js/register.js'], 'captcha' => $captcha]);
    }
}