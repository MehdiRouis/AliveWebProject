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


use App\Protections\Security;
use App\Validators\Validator;
use Models\Database\PDOConnect;
use App\Date\Parser;
use Models\Globals\Post;
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
     * @param string $title
     * @param string $description
     * @param string $captcha
     * @param string $token
     * @param int $userId
     * @return array|bool
     */
    public function add($title, $description, $captcha, $token, $userId): array {
        $validator = new Validator([
            'title' => [$title],
            'description' => [$description],
            'captcha' => [$captcha],
            'token' => [$token]
        ], 'alive_projects');
        $req = $this->db->query('SELECT id FROM alive_projects WHERE createdBy = ? AND statusId = ?', [$userId, 3]);
        $validator->validate();
        if($req->rowCount() > 0) {
            $validator->addError($token, 'Vous avez déjà un projet en attente de modération.');
        }
        $security = new Security();
        $post = new Post();
        if(!$validator->isThereErrors()) {
            $req = $this->db->query('INSERT INTO alive_projects (name, description, statusId, createdBy, createdAt) VALUES (?,?,?,?,?)', [$security->secureValue($post->getValue($title)), $security->secureValue($post->getValue($description)), 3, $userId, time()]);
            if($req) {
                return true;
            } else {
                $validator->addError($title, 'Erreur lors de la requête... Merci de réessayer plus tard.');
            }
        }
        return $validator->getErrors();
    }

    /**
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string {
        return (string) $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): string {
        return $this->description;
    }

    /**
     * @return Status
     */
    public function getStatus(): Status {
        return $this->status;
    }

    /**
     * @return User
     */
    public function getCreatedBy(): User {
        return $this->createdBy;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string {
        $date = new Parser($this->createdAt);
        return $date->format();
    }

    /**
     * @return string
     */
    public function getEditedAt(): string {
        $date = new Parser($this->editedAt);
        return $date->format();
    }

}