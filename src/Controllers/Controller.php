<?php
/**
 * Created by PhpStorm.
 * User: esska
 * Date: 23/01/19
 * Time: 07:59
 */

namespace Controllers;

use App\Routes\Router;
use App\Views\View;
use App\Protections\Security;
use App\Views\ViewsExceptions;

/**
 * Class Controller
 * @package Controllers
 */
class Controller {

    /**
     * @var Security
     */
    protected $security;

    /**
     * Controller constructor.
     */
    public function __construct() {
        $this->security = new Security();
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
     * @throws \Exception ViewsExceptions
     */
    protected function render($path, $args = []) {
        $args['scripts'] = isset($args['scripts']) ? $args['scripts'] : [];
        $args['router'] = $this->getRouter();
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
