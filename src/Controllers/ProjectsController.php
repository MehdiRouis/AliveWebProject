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


use Models\Projects\Project;

class ProjectsController extends Controller {

    public function getCreateProject() {
        $this->security->restrict();
        $captcha = $this->security->generateCaptcha();
        $this->render('projects/create', ['pageName' => 'Créer un projet', 'captcha' => $captcha]);
    }

    public function postCreateProject() {
        $this->security->restrict();
        $project = new Project();
        $errors = $project->add('projectTitle', 'projectDescription', 'projectCaptcha', 'CSRFToken', $this->user->getId());
        $captcha = $this->security->generateCaptcha(154, 34, 255, 255, 255);
        if(!is_array($errors)) {
            $this->security->safeLocalRedirect('dashboard');
        }
        $this->render('projects/create', ['pageName' => 'Créer un projet', 'captcha' => $captcha, 'errors' => $errors]);
    }

}