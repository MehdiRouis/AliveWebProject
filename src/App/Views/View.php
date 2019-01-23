<?php

    namespace App\Views;

    /**
     * Render views in PHP
     *
     * @author esska
     */
    class View {

	/**
	 * Variables à extraires dans les vues
	 * @var array
	 */
	private $data = [];
	
	/**
	 * Chemin de la vue
	 * @var bool|string
	 */
	private $render = false;

	/**
	 * @param string $templateFile Nom du fichier à rendre
	 * @throws ViewsExceptions
	 */
	public function __construct($templateFile) {
	    $file = PROJECT_LIBS . '/public/views/' . $templateFile . '.php';
	    if (file_exists($file)) {
		$this->render = $file;
	    } else {
		throw new ViewsExceptions('Erreur... La template : ' . $file . ' est introuvable.');
	    }
	}

	/**
	 * Assigner les variables à extraire dans la vue
	 * @param array $dataArray
	 */
	public function assign($dataArray = []) {
	    $this->data = $dataArray;
	}

	/**
	 * Extraction des variables de la vue ainsi que des requires pour les templates et rendues des vues
	 * @throws ViewsExceptions
	 */
	public function __destruct() {
	    extract($this->data);
	    if ($this->render) {
		require $this->render;
	    }
	}

    }