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
        $this->render('user/login');
    }

    /**
     * @throws \Exception \App\Views\ViewsExceptions
     */
    public function getRegister() {
        $captcha = $this->security->generateCaptcha();
        $this->render('user/register', ['captcha' => $captcha, 'scripts' => ['js/register.js']]);
    }

    /**
     * @throws \Exception \App\Views\ViewsExceptions
     */
    public function postLogin() {
        $auth = new DBAuth();
        $errors = $auth->logIn('logUsername', 'logPassword');
        $this->render('user/login', ['errors' => $errors]);
    }

    /**
     * @throws \Exception \App\Views\ViewsExceptions
     */
    public function postRegister() {
        $auth = new DBAuth();
        $errors = $auth->register('regUsername', 'regAccountType', 'regLastName', 'regFirstName', 'regEmail', 'regConfirmEmail', 'regPhoneNumber', 'regBirthDay', 'regPassword', 'regConfirmPassword', 'regCaptcha');
        $captcha = $this->security->generateCaptcha();
        $this->render('user/register', ['errors' => $errors, 'scripts' => ['js/register.js'], 'captcha' => $captcha]);
    }

}