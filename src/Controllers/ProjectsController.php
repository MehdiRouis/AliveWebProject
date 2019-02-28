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


use App\Validators\Validator;
use Models\Database\PDOConnect;
use Models\Globals\Post;
use Models\Projects\Project;

class ProjectsController extends Controller {

    public function getCreateProject() {
        $this->security->restrict();
        $this->render('projects/create', ['pageName' => 'Créer un projet']);
    }


    public function getProfile($id) {
        $this->security->restrict();
        $db = new PDOConnect();
        if($db->existContent('alive_projects', 'id', $id)) {
            $project = new Project($id);
            $this->render('projects/profile', ['pageName' => $project->getTitle(), 'project' => $project]);
        } else {
            $this->security->safeLocalRedirect('default');
        }
    }

    public function getEditProfile($id) {
        $this->security->restrict();
        $project = new Project($id);
        $return = false;
        if($project->getId() && $project->getStatus()->getId() !== 3 ||$project->getStatus()->getId() !== 5) {
            if($project->getCreatedBy()->getId() === $this->user->getId()) {
                $return = true;
                $this->render('projects/edit', ['pagename' => 'Édition', 'project' => $project]);
            }
        }
        if(!$return) {
            $this->security->safeLocalRedirect('default');
        }
    }

    public function deleteProject($id) {
        $this->security->restrict();
        $return = false;
        $project = new Project($id);
        if($project->getId()) {
            if($project->getCreatedBy()->getId() === $this->user->getId()) {
                if($project->getStatus()->getId() !== 5) {
                    $project->setStatus(5);
                    $this->security->safeLocalRedirect('dashboard|?action=success');
                    $return = true;
                }
            }
        }
        if(!$return) {
            $this->security->safeLocalRedirect('default');
        }
    }

    public function undoDeleteProject($id) {
        $this->security->restrict();
        $return = false;
        $project = new Project($id);
        if($project->getId()) {
            if($project->getCreatedBy()->getId() === $this->user->getId()) {
                if($project->getStatus()->getId() === 5) {
                    $project->setStatus(3);
                    $this->security->safeLocalRedirect('dashboard|?action=success');
                    $return = true;
                }
            }
        }
        if(!$return) {
            $this->security->safeLocalRedirect('default');
        }
    }

    public function postCreateProject() {
        $this->security->restrict();
        $project = new Project();
        $errors = $project->add('projectTitle', 'projectDescription', $this->user->getId());
        if(count($errors) === 0) {
            $this->security->safeLocalRedirect('dashboard');
        }
        $this->render('projects/create', ['pageName' => 'Créer un projet', 'errors' => $errors]);
    }

    public function postEditProject() {
        $post = new Post();
        $return = false;
        $this->security->restrict();
        $validator = new Validator([
            'id_project' => ['projectId'],
            'title' => ['projectTitle'],
            'description' => ['projectDescription']
        ], 'alive_projects');
        $validator->validate();
        if (!$validator->isThereErrors()) {
            $project = new Project($post->getValue('projectId'));
            $project->editAll($post->getValue('projectTitle'), $post->getValue('projectDescription'));
            $this->security->safeLocalRedirect('dashboard|?action=success');
        }
        if($post->getValue('projectId')) {
            $project = new Project($post->getValue('projectId'));
            if ($project->getId()) {
                $return = true;
                $this->render('projects/edit', ['pageName' => 'Édition', 'project' => $project, 'errors' => $validator->getErrors()]);
            }
        }
        if(!$return) {
            $this->security->safeLocalRedirect('default');
        }
    }

}