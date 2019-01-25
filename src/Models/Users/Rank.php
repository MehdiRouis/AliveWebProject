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
            $req = $this->db->query('SELECT * FROM alive_users_ranks WHERE id = ?', [$id]);
            if ($req->rowCount() > 0) {
                $rank = $req->fetch();
                $this->id = $rank->id;
                $this->name = $rank->name;
            }
        }
    }

    public function getRankedUsers($order = 'ORDER BY id DESC', $limit = false) {
        $permission = new Permission('admin-access');
        $limit = $limit ? ' LIMIT ' . $limit : '';
        $req = $this->db->query('SELECT id FROM alive_users WHERE `rank` >= ? ' . $order . $limit, [$permission->getMinRank()]);
        $users = [];
        if($req->rowCount() > 0) {
            while($user = $req->fetch()) {
                $users[] = new User($user->id);
            }
        }
        return $users;
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