<?php
/**
 * Created by PhpStorm.
 * User: esska
 * Date: 23/01/19
 * Time: 07:59
 */

namespace Controllers;

use App\Routes\Router;
use App\Views\Form;
use App\Views\Navbar;
use App\Views\View;
use App\Protections\Security;
use Models\Authentication\DBAuth;
use Models\Database\PDOConnect;
use Models\Globals\Session;
use Models\Users\User;

/**
 * Class Controller
 * @package Controllers
 */
class Controller {

    /**
     * @var Session
     */
    protected $session;

    /**
     * @var Security
     */
    protected $security;

    /**
     * @var DBAuth
     */
    protected $dbauth;

    /**
     * @var User
     */
    protected $user;

    /**
     * Controller constructor.
     */
    public function __construct() {
        $this->session = new Session();
        $this->security = new Security();
        $this->dbauth = new DBAuth();
        $this->user = new User();
        $this->user->updateSession();
    }

    /**
     * @return Router
     */
    protected function getRouter() {
        return $GLOBALS['router'];
    }

    /**
     * Permet de rendre une vue ( Chemin : [/public/views/]...[.php]
     * @param string $path
     * @param array $args
     * @throws \Exception \App\Views\ViewsExceptions
     */
    protected function render($path, $args = []) {
        $args['scripts'] = isset($args['scripts']) ? $args['scripts'] : [];
        $args['router'] = $this->getRouter();
        $args['navbar'] = new Navbar();
        $args['errors'] = isset($args['errors']) ? $args['errors'] : [];
        $args['auth'] = $this->dbauth;
        if($this->dbauth->isLogged()) {
            $args['user'] = $this->user;
        }
        $headerTpl = isset($args['headerTpl']) ? $args['headerTpl'] : 'templates/headerBase';
        $footerTpl = isset($args['footerTpl']) ? $args['footerTpl'] : 'templates/footerBase';
        $header = new View($headerTpl);
        $header->assign($args);
        $view = new View($path);
        $view->assign($args);
        $footer = new View($footerTpl);
        $footer->assign($args);
    }

    public function __destruct() {

    }

}
