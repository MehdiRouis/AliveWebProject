<?php
/**
 * Copyright (c) 2019. Tous droit réservé.
 */

/**
 * Created by PhpStorm.
 * User: esska
 * Date: 07/02/19
 * Time: 08:17
 */

namespace Models\Keys;

use App\Date\Parser;
use Models\Database\PDOConnect;
use Models\Users\User;

/**
 * Class Key
 * @package Models\Keys
 */
class Key {

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
    private $code;

    /**
     * @var Type
     */
    private $type;

    /**
     * @var User
     */
    private $user;

    /**
     * @var string
     */
    private $value;

    /**
     * @var Status
     */
    private $status;

    /**
     * @var int
     */
    private $createdAt;

    /**
     * Key constructor.
     * @param bool|string $key
     */
    public function __construct($key = false) {
        $this->db = new PDOConnect();
        if($key) {
            $req = $this->db->query('SELECT * FROM alive_keys WHERE code = ?', [$key]);
            if($req->rowCount() > 0) {
                $key = $req->fetch();
                $this->id = $key->id;
                $this->code = $key->code;
                $this->type = new Type($key->type);
                $this->user = new User($key->userId);
                $this->value = $key->value;
                $this->status = new Status($key->status);
                $this->createdAt = $key->createdAt;
            }
        }
    }

    /**
     * @return int|null
     */
    public function getId(): ?int {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getKey(): ?string {
        return $this->code;
    }

    /**
     * @return Type|null
     */
    public function getType(): ?Type {
        return $this->type;
    }

    /**
     * @return User|null
     */
    public function getUser(): ?User {
        return $this->user;
    }

    /**
     * @return string|null
     */
    public function getValue(): ?string {
        return $this->value;
    }

    /**
     * @return Status|null
     */
    public function getStatus(): ?Status {
        return $this->status;
    }

    /**
     * @return string|null
     */
    public function getCreatedAt(): ?string {
        $date = new Parser($this->createdAt);
        return $date->format();
    }
}