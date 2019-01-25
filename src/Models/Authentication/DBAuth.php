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

use App\Protections\Security;
use App\Validators\Errors;
use App\Validators\Validator;
use Models\Database\PDOConnect;
use Models\Globals\Post;
use Models\Globals\Session;
use Models\Users\User;

class DBAuth {

    /**
     * @var array
     */
    private $errors;

    /**
     * @var PDOConnect
     */
    private $db;

    /**
     * @var Security
     */
    private $security;

    /**
     * @var Post
     */
    private $post;

    public function __construct() {
        $this->db = new PDOConnect();
        $this->security = new Security();
        $this->post = new Post();
        $this->errors = new Errors();
    }

    /**
     * @return Post
     */
    public function getPost() {
        return $this->post;
    }

    /**
     * @return Errors|array
     */
    public function getErrors() {
        return $this->errors;
    }

    /**
     * @param string $username
     * @param string $password
     * @return array
     */
    public function logIn($username, $password) {
        $valueUsername = $this->security->secureValue($this->getPost()->getValue($username));
        $valuePassword = $this->security->secureValue($this->getPost()->getValue($password));
        if($valueUsername && $valuePassword) {
            $req = $this->db->query('SELECT id FROM alive_users WHERE userName = ? OR email = ?', [$valueUsername, $valueUsername]);
            if($req->rowCount() > 0) {
                $user = $req->fetch();
                $user = new User($user->id);
                if($user->matchPassword($valuePassword)) {
                    $user->createSession();
                    $this->security->safeLocalRedirect('dashboard');
                } else {
                    $this->getErrors()->setError($password, 'Mot de passe incorrect.');
                }
            } else {
                $this->getErrors()->setError($username, 'Compte introuvable.');
            }
        } else {
            $this->getErrors()->setError($password, 'Champs non remplit.');
            $this->getErrors()->setError($username, 'Champs non remplit.');
        }
        return $this->getErrors()->getErrors();
    }

    /**
     * @param string $userName
     * @param string $accountType
     * @param string $lastName
     * @param string $firstName
     * @param string $email
     * @param string $confirmEmail
     * @param string $phoneNumber
     * @param string $birthDay
     * @param string $password
     * @param string $confirmPassword
     * @param string $captcha
     * @return array
     */
    public function register($userName, $accountType, $lastName, $firstName, $email, $confirmEmail, $phoneNumber, $birthDay, $password, $confirmPassword, $captcha) {
        $validator = new Validator([
            'username' => [$userName],
            'name' => [$lastName, $firstName],
            'email' => [$email],
            'phoneNumber' => [$phoneNumber],
            'adultBirthDay' => [$birthDay],
            'password' => [$password],
            'captcha' => [$captcha]
        ], 'alive_users');
        $validator->validate();
        $pUserName = $this->getPost()->getValue($userName);
        $pAccountType = $this->getPost()->getValue($accountType);
        $pLastName = $this->getPost()->getValue($lastName);
        $pFirstName = $this->getPost()->getValue($firstName);
        $pEmail = $this->getPost()->getValue($email);
        $pConfirmEmail = $this->getPost()->getValue($confirmEmail);
        $pPhoneNumber = $this->getPost()->getValue($phoneNumber);
        $pBirthDay = $this->getPost()->getValue($birthDay);
        $pPassword = $this->getPost()->getValue($password);
        $pConfirmPassword = $this->getPost()->getValue($confirmPassword);
        if($pEmail !== $pConfirmEmail) {
            $validator->addError($confirmEmail, 'Ce champs ne correspond pas avec l\'adresse email.');
        }
        if($pPassword !== $pConfirmPassword) {
            $validator->addError($confirmPassword, 'Ce champs ne correspond pas avec le mot de passe.');
        }
        if((int) $pAccountType > 3 || (int) $pAccountType <= 0) {
            $validator->addError($accountType, 'Erreur interne...');
        }
        if(!$validator->isThereErrors()) {
            $user = new User();
            $user->add($this->security->secureValue($pUserName), $this->security->secureValue($pAccountType), $this->security->secureValue($pLastName), $this->security->secureValue($pFirstName), $this->security->secureValue($pEmail), $this->security->secureValue($pPhoneNumber), $this->security->secureValue($pBirthDay), $this->security->secureValue($pPassword), true);

        }
        return $validator->getErrors();
    }

    public function isLogged() {
        return $this->security->existValue('auth');
    }

    public function logOut() {
        if($this->isLogged()) {
            $this->security->deleteValue('auth');
            $this->security->deleteValue('token');
            $this->security->safeLocalRedirect('home');
        }
    }

}