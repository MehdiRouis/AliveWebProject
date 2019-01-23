<?php

namespace Controllers;

/**
 * @author esska
 */
class IndexController extends Controller {

    public function getHomepage() {
        $this->render('index');
    }

    public function getNotFound() {
        echo 'Erreur, page introuvable.';
    }

}
