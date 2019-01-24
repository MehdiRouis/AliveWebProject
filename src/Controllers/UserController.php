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
        $this->render('user/register');
    }

    /**
     * @throws \Exception \App\Views\ViewsExceptions
     */
    public function postLogin() {
        $auth = new DBAuth();
        $auth->logIn('logUsername', 'logPassword');
        $this->render('user/login');
    }

    /**
     * @throws \Exception \App\Views\ViewsExceptions
     */
    public function postRegister() {
        var_dump($_POST);
        $this->render('user/register');
    }

}