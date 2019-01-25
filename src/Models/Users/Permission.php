<?php
/**
 * Copyright (c) 2019. Tous droit réservé.
 */

/**
 * Created by PhpStorm.
 * User: esska
 * Date: 23/01/19
 * Time: 14:46
 */

namespace Models\Users;

use Models\Database\PDOConnect;

class Permission {

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
     * @var string
     */
    private $parseName;

    /**
     * @var string
     */
    private $parseDescription;

    /**
     * @var int
     */
    private $minRank;

    /**
     * Permission constructor.
     * @param bool $value
     * @param string $searchType
     */
    public function __construct($value = false, $searchType = 'name') {
        $this->db = new PDOConnect();
        if($value) {
            $req = $this->db->query("SELECT * FROM alive_users_permissions WHERE {$searchType} = ?", [$value]);
            if($req->rowCount() > 0) {
                $permission = $req->fetch();
                $this->id = $permission->id;
                $this->name = $permission->name;
                $this->parseName = $permission->parseName;
                $this->parseDescription = $permission->parseDescription;
                $this->minRank = $permission->minRank;
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

    /**
     * @return string
     */
    public function getParseName()
    {
        return $this->parseName;
    }

    /**
     * @return string
     */
    public function getParseDescription()
    {
        return $this->parseDescription;
    }

    /**
     * @return int
     */
    public function getMinRank()
    {
        return $this->minRank;
    }

    public function hasRight($rankId) {
        if($this->getMinRank() <= $rankId) {
            return true;
        }
        return false;
    }

}