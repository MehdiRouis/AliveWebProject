<?php
/**
 * Copyright (c) 2019. Tous droit réservé.
 */

/**
 * Created by PhpStorm.
 * User: esska
 * Date: 07/02/19
 * Time: 08:32
 */

namespace Models\Users;

use Models\Database\PDOConnect;

/**
 * Class Keys
 * @package Models\Users
 */
class Keys {

    /**
     * @var PDOConnect
     */
    private $db;

    public function __construct($userId) {
        $this->db = new PDOConnect();
    }

}