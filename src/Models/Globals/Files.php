<?php
/**
 * Copyright (c) 2019. Tous droit réservé.
 */

/**
 * Created by PhpStorm.
 * User: esska
 * Date: 24/01/19
 * Time: 07:57
 */

namespace Models\Globals;

/**
 * Class Post
 * @package Models\Globals
 */
class Files {

    /**
     * Post constructor.
     */
    public function __construct() {

    }

    /**
     * @param string $key
     * @return false|mixed
     */
    public function getValue($key) {
        return isset($_FILES[$key]) && !empty($_FILES[$key]) ? $_FILES[$key] : false;
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return mixed
     */
    public function setValue($key, $value) {
        $_FILES[$key] = $value;
        return $_FILES[$key];
    }

    /**
     * @param false|string $key
     */
    public function deleteValue($key = false) {
        if ($key) {
            unset($_FILES[$key]);
        } else {
            unset($_FILES);
        }
    }

    public function __destruct() {

    }

}