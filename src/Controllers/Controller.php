<?php

    namespace Controllers;

    use App\Views\View;
    
    use App\Protections\Security;

    /**
     * Controller principal contenant des variables globales des enfants
     * @author esska
     */
    class Controller {

	/**
	 * @var Security
	 */
	protected $security;

	public function __construct() {
	    $this->security = new Security();
	}

	protected function getRouter() {
	    return $GLOBALS['router'];
	}

	/**
	 * Permet de rendre une vue ( Chemin : [/public/views/]...[.php]
	 * @param string $path
	 * @param array $args
	 */
	protected function render($path, $args = []) {
	    $view = new View($path);
	    $args['router'] = $this->getRouter();
	    $view->assign($args);
	}

	public function __destruct() {
	    
	}

    }
    