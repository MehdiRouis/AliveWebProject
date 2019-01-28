<?php
/**
 * Copyright (c) 2019. Tous droit réservé.
 */

/**
 * Created by PhpStorm.
 * User: esska
 * Date: 28/01/19
 * Time: 15:23
 */

namespace Models\Projects;


use Models\Database\PDOConnect;
use Models\Users\User;

class Project {

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
    private $description;

    /**
     * @var
     */
    private $status;

    /**
     * @var User
     */
    private $createdBy;

    /**
     * @var int
     */
    private $createdAt;

    /**
     * @var int
     */
    private $editedAt;

    /**
     * Project constructor.
     * @param bool|int $projectId
     */
    public function __construct($projectId = false) {
        $this->db = new PDOConnect();
        if($projectId) {
            $req = $this->db->query('SELECT * FROM alive_projects WHERE id = ?', [$projectId]);
            if($req->rowCount() > 0) {
                $project = $req->fetch();
                $this->id = $project->id;
                $this->name = $project->name;
                $this->description = $project->description;
                $this->status = new Status($project->statusId);
                $this->createdBy = new User($project->id);
                $this->createdAt = $project->createdAt;
                $this->editedAt = $project->editedAt;
            }
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

    /**
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * @return Status
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * @return User
     */
    public function getCreatedBy() {
        return $this->createdBy;
    }

    /**
     * @return int
     */
    public function getCreatedAt() {
        return $this->createdAt;
    }

    /**
     * @return int
     */
    public function getEditedAt() {
        return $this->editedAt;
    }

}