<?php
/**
 * Copyright (c) 2019. Tous droit réservé.
 */

/**
 * Created by PhpStorm.
 * User: esska
 * Date: 01/02/19
 * Time: 16:28
 */

namespace Controllers;


class AdministrationController extends Controller {

    public function getDashboard() {
        $this->user->restrict('admin-access');
        $this->render('admin/dashboard', ['pageName' => 'Administration']);
    }

}