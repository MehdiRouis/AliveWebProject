<?php
/**
 * Copyright (c) 2019. Tous droit réservé.
 */

/**
 * Created by PhpStorm.
 * User: esska
 * Date: 23/01/19
 * Time: 17:58
 */

namespace Models\Authentication;


use Models\Globals\Session;

class DBAuth extends Session {

    public function __construct() {
        parent::__construct();
    }

    public function logIn($username, $password) {
    }

    public function isLogged() {
        return $this->existValue('auth');
    }

}