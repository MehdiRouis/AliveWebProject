<?php
/**
 * Copyright (c) 2019. Tous droit réservé.
 */

/**
 * Created by PhpStorm.
 * User: esska
 * Date: 28/01/19
 * Time: 15:19
 */

namespace Models\Users;


use Models\Database\PDOConnect;
use Models\Projects\Project;

class Projects {

    /**
     * @var PDOConnect
     */
    private $db;

    /**
     * @var array
     */
    private $projects = [];

    /**
     * Projects constructor.
     * @param bool|int $userId
     */
    public function __construct($userId = false) {
        $this->db = new PDOConnect();
        if($userId) {
            $req = $this->db->query('SELECT * FROM alive_projects WHERE createdBy = ?', [$userId]);
            if($req->rowCount() > 0) {
                while($project = $req->fetch()) {
                    $this->projects[] = new Project($project->id);
                }
            }
        }
    }

    public function countCreatedProjects() {
        return count($this->projects);
    }

    public function getAllCreatedProjects() {
        return $this->projects;
    }
}