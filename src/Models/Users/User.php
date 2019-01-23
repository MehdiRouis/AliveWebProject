<?php
/**
 * Created by PhpStorm.
 * User: esska
 * Date: 23/01/19
 * Time: 07:59
 */

namespace Models\Users;

use Models\Database\PDOConnect;

/**
 * Class User
 * @package Models\Users
 */
class User {

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
    private $userName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var int
     */
    private $phoneNumber;

    /**
     * @var string
     */
    private $birthDay;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $email;

    /**
     * @var int
     */
    private $rank;

    /**
     * @var int
     */
    private $bPoints;

    /**
     * User constructor.
     * @param string
     * @param mixed
     */
    public function __construct($value, $searchType = 'id') {
        $this->db = new PDOConnect();
        $user = $this->db->fetch('alive_users', $searchType, $value);
        if($user) {
            $this->id = $user->id;
            $this->userName = $user->userName;
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
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return int
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @return string
     */
    public function getBirthDay()
    {
        return $this->birthDay;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return int
     */
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * @return int
     */
    public function getBPoints()
    {
        return $this->bPoints;
    }

}