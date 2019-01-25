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

class UserController extends Controller {

    public function getDashboard() {
        $this->security->restrict();
        $this->render('user/dashboard', ['pageName' => 'Dashboard']);
    }

    public function getProfile($id) {

    }

}