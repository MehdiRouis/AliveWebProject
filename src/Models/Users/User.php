<?php
/**
 * Created by PhpStorm.
 * User: esska
 * Date: 23/01/19
 * Time: 07:59
 */

namespace Models\Users;

use App\Protections\Security;
use Models\Authentication\DBAuth;
use Models\Database\PDOConnect;
use Models\Globals\Session;

/**
 * Class User
 * @package Models\Users
 */
class User extends Session {

    /**
     * @var PDOConnect
     */
    private $db;

    /**
     * @var Security
     */
    private $security;

    /**
     * @var DBAuth
     */
    private $dbauth;

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
    private $shopPoints;

    /**
     * User constructor.
     * @param false|string $value
     * @param string $searchType
     */
    public function __construct($value = false, $searchType = 'id') {
        parent::__construct();
        $this->db = new PDOConnect();
        $this->security = new Security();
        $this->dbauth = new DBAuth();
        if($value) {
            $req = $this->db->query("SELECT * FROM alive_users WHERE {$searchType} = ?", [$value]);
            if ($req->rowCount() > 0) {
                $user = $req->fetch();
            }
        } else {
            if($this->dbauth->isLogged()) {
                $user = $this->getValue('auth');
            }
        }
        if(isset($user)) {
            $this->id = $user->id;
            $this->userName = $user->userName;
            $this->lastName = $user->lastName;
            $this->firstName = $user->firstName;
            $this->phoneNumber = $user->phoneNumber;
            $this->birthDay = $user->birthDay;
            $this->password = $user->password;
            $this->rank = $user->rank;
            $this->email = $user->email;
            $this->shopPoints = $user->shopPoints;
        }
    }

    /**
     * Création de la session à partir de l'instance.
     */
    public function createSession(){
        $this->setValue('auth', $this->serialize());
        $this->setValue('token', $this->security->getUniqueToken());
    }

    public function updateSession() {
        $req = $this->db->query('SELECT * FROM alive_users WHERE id = ?', [$this->getId()]);
        if ($req->rowCount() > 0) {
            $user = $req->fetch();
            $this->id = $user->id;
            $this->userName = $user->userName;
            $this->lastName = $user->lastName;
            $this->firstName = $user->firstName;
            $this->phoneNumber = $user->phoneNumber;
            $this->birthDay = $user->birthDay;
            $this->password = $user->password;
            $this->rank = $user->rank;
            $this->email = $user->email;
            $this->shopPoints = $user->shopPoints;
        }
    }

    /**
     * Retourne toutes les valeurs d'un utilisateur à partir de l'id sous la form fetch
     * @return mixed
     */
    private function serialize() {
        $req = $this->db->query('SELECT * FROM alive_users WHERE id = ?', [$this->getId()]);
        return $req->fetch();
    }

    /**
     * @param string $userName
     * @param string $accountType
     * @param string $lastName
     * @param string $firstName
     * @param string $email
     * @param string $phoneNumber
     * @param string $birthDay
     * @param string $password
     * @param bool $session
     */
    public function add($userName, $accountType, $lastName, $firstName, $email, $phoneNumber, $birthDay, $password, $session = false) {
        $password = $this->security->hash($password);
        $req = $this->db->query('INSERT INTO alive_users (userName, lastName, firstName, phoneNumber, birthDay, password, `rank`, email, shopPoints) VALUES (?,?,?,?,?,?,?,?,?)', [
            $userName, $lastName, $firstName, $phoneNumber, $birthDay, $password, $accountType, $email, 0
        ]);
        if($session) {
            $req = $this->db->query('SELECT id FROM alive_users WHERE userName = ? AND email = ? AND password = ?', [$userName, $email, $password]);
            if($req->rowCount() > 0) {
                $fetch = $req->fetch();
                $user = new User($fetch->id);
                $user->createSession();
                $this->security->safeLocalRedirect('dashboard');
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

    public function getInitialUserName() {
        return strtoupper($this->getUserName()[0]);
    }

    public function getInitialFirstName() {
        return strtoupper($this->getFirstName()[0]);
    }

    public function getInitialLastName() {
        return strtoupper($this->getLastName()[0]);
    }

    public function getInitialFullName() {
        return strtoupper($this->getFirstName()[0]) . ' ' . strtoupper($this->getLastName()[0]);
    }

    /**
     * @return string
     */
    public function getFullName() {
        return strtoupper($this->getLastName()) . ' ' . $this->getFirstName();
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
     * @param string $password
     * @return bool
     */
    public function matchPassword($password) {
        return password_verify($password, $this->getPassword());
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return Rank
     */
    public function getRank()
    {
        return new Rank($this->rank);
    }

    /**
     * @return int
     */
    public function getShopPoints()
    {
        return $this->shopPoints;
    }

    /**
     * @param string $permission
     * @param string $searchType
     * @return bool
     */
    public function hasRight($permission, $searchType = 'name')
    {
        $permission = new Permission($permission, $searchType);
        return $permission->hasRight($this->getRank()->getId());
    }

}