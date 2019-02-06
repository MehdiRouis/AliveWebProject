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
use Models\Globals\Post;
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
        $email = 'email';
        $reMail = 'reEmail';
        $password = 'password';
        $token = 'CSRFToken';
        $validator = new Validator([
            'email' => [$email]
        ], 'alive_users');
        $validator->validate();
        $post = new Post();
        if($post->getValue($email) !== $post->getValue($reMail)) {
            $validator->addError($email, 'Les 2 adresses email ne correspondent pas.');
        }
        if(!$this->user->matchPassword($post->getValue($password))) {
            $validator->addError($password, 'Le mot de passe est incorrect.');
        }
        if(!$validator->isThereErrors()) {
            $this->user->setEmail($post->getValue($email));
            $this->security->safeLocalRedirect('profile', ['id' => $this->user->getId()]);
        }
        $this->render('user/profile', ['pageName' => $this->user->getUserName(), 'userProfile' => $this->user, 'scripts' => ['js/userProfile.js'], 'errors' => $validator->getErrors()]);
    }

    public function postPasswordChange() {
        $this->security->restrict();
        $oldPassword = 'oldPassword';
        $newPassword = 'newPassword';
        $reNewPassword = 'reNewPassword';
        $validator = new Validator(['password' => [$newPassword]]);
        $validator->validate();
        $post = new Post();
        if($post->getValue($newPassword) !== $post->getValue($reNewPassword)) {
            $validator->addError($newPassword, 'Les mots de passes ne correspondent pas.');
        }
        if(!$this->user->matchPassword($post->getValue($oldPassword))) {
            $validator->addError($oldPassword, 'Le mot de passe est incorrect.');
        }
        if(!$validator->isThereErrors()) {
            $this->user->setPassword($post->getValue($newPassword));
            $this->security->safeLocalRedirect('profile', ['id' => $this->user->getId()]);
        }
        $this->render('user/profile', ['pageName' => $this->user->getUserName(), 'userProfile' => $this->user, 'scripts' => ['js/userProfile.js'], 'errors' => $validator->getErrors()]);
    }

    public function postPhoneNumberChange() {
        $this->security->restrict();
        $phoneNumber = 'phoneNumber';
        $password = 'password';
        $validator = new Validator(['phoneNumber' => [$phoneNumber]]);
        $validator->validate();
        $post = new Post();
        if(!$validator->isThereErrors()) {
            $this->user->setPhoneNumber($post->getValue($phoneNumber));
            $this->security->safeLocalRedirect('profile', ['id' => $this->user->getId()]);
        }
        $this->render('user/profile', ['pageName' => $this->user->getUserName(), 'userProfile' => $this->user, 'scripts' => ['js/userProfile.js'], 'errors' => $validator->getErrors()]);
    }

}