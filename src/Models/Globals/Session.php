<?php
/**
 * Copyright (c) 2019. Tous droit réservé.
 */

/**
 * Created by PhpStorm.
 * User: esska
 * Date: 23/01/19
 * Time: 17:59
 */

namespace Models\Globals;


class Session {

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function getValue($key) {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : false;
    }

    public function setValue($key, $value) {
        $_SESSION[$key] = $value;
        return $_SESSION[$key];
    }

    public function existValue($key) {
        return isset($_SESSION[$key]);
    }

    public function deleteValue($key = false)
    {
        if ($key) {
            unset($_SESSION[$key]);
        } else {
            unset($_SESSION);
        }
    }
}