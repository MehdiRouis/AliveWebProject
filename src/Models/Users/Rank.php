<?php
/**
 * Copyright (c) 2019. Tous droit réservé.
 */

/**
 * Created by PhpStorm.
 * User: esska
 * Date: 23/01/19
 * Time: 14:18
 */

namespace Models\Users;


use Models\Database\PDOConnect;

class Rank {

    /**
     * @var PDOConnect
     */
    private $db;

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * Rank constructor.
     * @param bool|int $id
     */
    public function __construct($id = false) {
        $this->db = new PDOConnect();
        if ($id) {
            $rank = $this->db->fetch('alive_ranks', 'id', $id);
            if ($rank) {
                $this->id = $rank->id;
                $this->name = $rank->name;
            }
        }
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

}