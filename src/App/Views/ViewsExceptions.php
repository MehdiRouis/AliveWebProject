<?php

    namespace App\Views;

    /**
     * @author esska
     */
    class ViewsExceptions extends \Exception {

	/**
	 * Affichage de l'exception
	 * @param string $message
	 * @throws \Exception
	 */
	public function __construct($message) {
	    parent::__construct($message);
	}

    }
    