<?php

    namespace App\Routes;

    /**
     * @author esska
     */
    class RouterExceptions extends \Exception {

	/**
	 * Affichage des erreurs liés aux routes
	 * @param string $message
	 * @throws \Exception
	 */
	public function __construct($message) {
	    parent::__construct($message);
	}
	
	public function __destruct() {
	    
	}

    }
    