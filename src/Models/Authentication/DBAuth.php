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
use App\Validators\Validator;
use Models\Database\PDOConnect;
use Models\Globals\Post;
use Models\Globals\Session;
use Models\Users\User;

class DBAuth extends Session {

    /**
     * @var array
     */
    private $errors = [];

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
        parent::__construct();
        $this->db = new PDOConnect();
        $this->post = new Post();
        $this->security = new Security();
    }

    public function getErrors() {
        return $this->errors;
    }

    public function createSession() {
        $this->setValue('auth', $session->serialize());
        $this->setValue('token', $this->security->getUniqueToken());
    }

    public function logIn($username, $password) {
        $valueUsername = $this->post->getValue($username);
        $valuePassword = $this->post->getValue($password);
        if($valueUsername && $valuePassword) {
            $req = $this->db->query('SELECT id FROM alive_users WHERE userName = ? OR email = ?', [$valueUsername, $valueUsername]);
            if($req->rowCount() > 0) {
                $user = $req->fetch();
                $user = new User($user->id);
                if($user->matchPassword($valuePassword)) {
                    $this->createSession();
                    $this->security->safeLocalRedirect('dashboard');
                }
            }
        }
        return $this->getErrors();
    }

    public function isLogged() {
        return $this->existValue('auth');
    }

}