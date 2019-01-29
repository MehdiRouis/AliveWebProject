<?php
/**
 * Copyright (c) 2019. Tous droit réservé.
 */

/**
 * Created by PhpStorm.
 * User: esska
 * Date: 29/01/19
 * Time: 07:40
 */

namespace Controllers;


class ProjectsController extends Controller {

    public function getCreateProject() {
        $this->render('projects/create', ['pageName' => 'Créer un projet']);
    }

    public function postCreateProject() {
        var_dump($_POST);
        $this->render('projects/create', ['pageName' => 'Créer un projet']);
    }

}