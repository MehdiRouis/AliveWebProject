<?php
/**
 * Copyright (c) 2019. Tous droit réservé.
 */

/**
 * Created by PhpStorm.
 * User: esska
 * Date: 28/01/19
 * Time: 15:31
 */

namespace Models\Projects;


use Models\Database\PDOConnect;

class Status {

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
     * Status constructor.
     * @param int $projectId
     */
    public function __construct($projectId) {
        $this->db = new PDOConnect();
        $req = $this->db->query('SELECT * FROM alive_projects_status WHERE id = ?', [$projectId]);
        if($req->rowCount() > 0) {
            $status = $req->fetch();
            $this->id = $status->id;
            $this->name = $status->name;
        }
    }

    /**
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }
}