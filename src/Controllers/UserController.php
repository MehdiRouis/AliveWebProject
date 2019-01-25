<?php
/**
 * Copyright (c) 2019. Tous droit réservé.
 */

/**
 * Created by PhpStorm.
 * User: esska
 * Date: 23/01/19
 * Time: 18:31
 */

namespace Controllers;


use Models\Authentication\DBAuth;

class UserController extends Controller {

    /**
     * @throws \Exception \App\Views\ViewsExceptions
     */
    public function getLogin() {
        $this->render('user/login', ['pageName' => 'Connexion']);
    }

    /**
     * @throws \Exception \App\Views\ViewsExceptions
     */
    public function getRegister() {
        $captcha = $this->security->generateCaptcha();
        $this->render('user/register', ['pageName' => 'Inscription', 'captcha' => $captcha, 'scripts' => ['js/register.js']]);
    }

    public function getDashboard() {
        $this->render('user/dashboard', ['pageName' => 'Dashboard']);
    }

    /**
     * @throws \Exception \App\Views\ViewsExceptions
     */
    public function postLogin() {
        $auth = new DBAuth();
        $errors = $auth->logIn('logUsername', 'logPassword');
        $this->render('user/login', ['pageName' => 'Connexion', 'errors' => $errors]);
    }

    /**
     * @throws \Exception \App\Views\ViewsExceptions
     */
    public function postRegister() {
        $auth = new DBAuth();
        $errors = $auth->register('regUsername', 'regAccountType', 'regLastName', 'regFirstName', 'regEmail', 'regConfirmEmail', 'regPhoneNumber', 'regBirthDay', 'regPassword', 'regConfirmPassword', 'regCaptcha');
        $captcha = $this->security->generateCaptcha();
        $this->render('user/register', ['pageName' => 'Inscription', 'errors' => $errors, 'scripts' => ['js/register.js'], 'captcha' => $captcha]);
    }

}