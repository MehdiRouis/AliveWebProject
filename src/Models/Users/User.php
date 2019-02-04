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

    public function restrict($permissionName) {
        $this->security->restrict();
        if(!$this->hasRight($permissionName)) {
            $this->security->safeLocalRedirect('default');
        }
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param $value
     * @return string
     */
    private function getInitial($value): string {
        return $value[0] === '&' ? substr($value, 0, strpos($value, ';')+strlen(';')) : $value[0];
    }

    /**
     * @return string
     */
    public function getInitialUserName(): string {
        return $this->getInitial($this->getUserName());
    }

    /**
     * @return string
     */
    public function getInitialFirstName(): string {
        return $this->getInitial($this->getFirstName());
    }

    /**
     * @return string
     */
    public function getInitialLastName(): string {
        return $this->getInitial($this->getLastName());
    }

    /**
     * @return string
     */
    public function getInitialFullName(): string {
        return $this->getInitial($this->getFirstName()) . ' ' . $this->getInitial($this->getLastName());
    }

    /**
     * @return string
     */
    public function getFullName(): string {
        return strtoupper($this->getLastName()) . ' ' . $this->getFirstName();
    }

    /**
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    /**
     * @return string
     */
    public function getBirthDay(): string
    {
        return date('d/m/Y', strtotime($this->birthDay));
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

    /**
     * @return string
     */
    public function getProfileLink() {
        return $GLOBALS['router']->getFullUrl('profile', ['id' => $this->getId()]);
    }

    /**
     * @return int
     */
    public function countCreatedProjects() {
        $projects = new Projects($this->getId());
        return $projects->countCreatedProjects();
    }

    public function countAllProjects() {
        $projects = new Projects($this->getId());
        return $projects->countAllProjects();
    }

    public function countFinishedProjects() {
        $projects = new Projects($this->getId());
        return $projects->countFinishedProjects();
    }

    public function getAllCreatedProjects() {
        $projects = new Projects($this->getId());
        return $projects->getAllCreatedProjects();
    }

    public function getCSRFToken() {
        $token = $this->security->getValue('token');
        return isset($token) ? $token : false;
    }

}