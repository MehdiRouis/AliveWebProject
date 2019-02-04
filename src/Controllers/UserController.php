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

use App\Validators\Validator;
use Models\Users\User;

class UserController extends Controller {

    public function getDashboard() {
        $this->security->restrict();
        $this->render('user/dashboard', ['pageName' => 'Dashboard']);
    }

    public function getProfile($id) {
        $this->security->restrict();
        if($this->security->idVerification($id, 'alive_users')) {
            $user = new User($id);
            $this->render('user/profile', ['pageName' => $user->getUserName(), 'userProfile' => $user, 'scripts' => ['js/userProfile.js']]);
        } else {
            $this->security->safeLocalRedirect('default');
        }
    }

    public function postEmailChange() {
        $this->security->restrict();
        var_dump($_POST);
        $validator = new Validator([
            'email' => ['email']
        ], 'alive_users');
        $validator->validate();
        $user = new User();
        $this->render('user/profile', ['pageName' => $user->getUserName(), 'userProfile' => $user, 'scripts' => ['js/userProfile.js']]);
    }

    public function postPasswordChange() {
        var_dump($_POST);
        $this->security->restrict();
        $user = new User();
        $this->render('user/profile', ['pageName' => $user->getUserName(), 'userProfile' => $user, 'scripts' => ['js/userProfile.js']]);
    }

}