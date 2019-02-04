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


use Models\Database\PDOConnect;
use Models\Projects\Project;

class ProjectsController extends Controller {

    public function getCreateProject() {
        $this->security->restrict();
        $captcha = $this->security->generateCaptcha(154, 34, 179,229,252);
        $this->render('projects/create', ['pageName' => 'Créer un projet', 'captcha' => $captcha]);
    }

    public function getProfile($id) {
        $db = new PDOConnect();
        if($db->existContent('alive_projects', 'id', $id)) {
            $project = new Project($id);
            $this->render('projects/profile', ['pageName' => $project->getTitle(), 'project' => $project]);
        } else {
            $this->security->safeLocalRedirect('default');
        }
    }

    public function postCreateProject() {
        $this->security->restrict();
        $project = new Project();
        $errors = $project->add('projectTitle', 'projectDescription', 'projectCaptcha', 'CSRFToken', $this->user->getId());
        $captcha = $this->security->generateCaptcha(154, 34, 179,229,252);
        if(count($errors) === 0) {
            $this->security->safeLocalRedirect('dashboard');
        }
        $this->render('projects/create', ['pageName' => 'Créer un projet', 'captcha' => $captcha, 'errors' => $errors]);
    }

}