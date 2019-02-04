<?php
/**
 * Copyright (c) 2019. Tous droit réservé.
 */

/**
 * Created by PhpStorm.
 * User: esska
 * Date: 24/01/19
 * Time: 16:38
 */

namespace App\Views;

use App\Routes\Router;
use Models\Globals\Post;
use Models\Users\User;

class Form {

    /**
     * @var \App\Routes\Router
     */
    private $router;

    /**
     * @var Post
     */
    private $post;

    /**
     * @var string
     */
    private $method;

    /**
     * @var string
     */
    private $route;

    /**
     * @var string
     */
    private $html;

    /**
     * @var array
     */
    private $errors;

    /**
     * Form constructor.
     * @param array $errors
     * @param string $routeName
     * @param string $method
     * @param bool $csrf
     * @throws \Exception \App\Routes\RouterExceptions
     */
    public function __construct($errors, $routeName, $method = 'POST', $csrf = false) {
        $this->errors = $errors;
        $this->post = new Post();
        $this->router = $GLOBALS['router'];
        $this->method = $method;
        if(filter_var($routeName, FILTER_VALIDATE_URL)) {
            $this->route = $routeName;
        } else {
            $this->route = $this->getRouter()->getFullUrl($routeName);
        }
        $this->html = '<form class="row" method="' . $method . '" action="' . $this->route . '">';
        $user = new User();
        if($csrf) {
            $this->addSecurityToken('CSRFToken', $user->getCSRFToken());
        }
    }

    /**
     * @return \App\Routes\Router
     */
    private function getRouter(): Router {
        return $this->router;
    }

    /**
     * @return Post
     */
    private function getPost(): Post {
        return $this->post;
    }

    /**
     * @param string $html
     */
    private function addHTML($html) {
        $this->html .= "{$html}\n";
    }

    /**
     * @param string $id
     * @param string $label
     * @param string $fieldClass
     * @param string $type
     * @param string $pattern
     * @param string $inputClass
     */
    public function addField($id, $label, $fieldClass = 'col s12', $type = 'text', $pattern = '', $inputClass = 'validate') {
        $fieldClass = 'input-field ' . $fieldClass;
        $inputClass = $inputClass === 'validate' ? $inputClass : 'validate '.$inputClass;
        $pattern = !empty($pattern) ? ' pattern="' . $pattern . '"' : '';
        $placeHolder = $type === 'date' || $type === 'time' ? ' placeholder=""' : '';
        $value = $this->getPost()->getValue($id) ? $this->getPost()->getValue($id) : '';
        $error = isset($this->errors[$id]) ? $this->errors[$id] : '';
        $this->addHTML('<div class="' . $fieldClass . '">');
        $this->addHTML('<input id="' . $id . '" name="' . $id . '" type="' . $type . '" value="' . $value . '"' . $placeHolder . ' class="' . $inputClass . '"' . $pattern . ' />');
        $this->addHTML('<label for="' . $id . '">' . $label . '</label>');
        $this->addHTML('<span class="helper-text red-text">' . $error . '</span>');
        $this->addHTML('</div>');
    }

    /**
     * @param string $id
     * @param string $label
     * @param array $content
     * @param string $fieldClass
     */
    public function addSelect($id, $label, $content = [], $fieldClass = 'col s12') {
        $fieldClass = 'input-field ' . $fieldClass;
        $error = isset($this->errors[$id]) ? $this->errors[$id] : '';
        $this->addHTML('<div class="' . $fieldClass . '">');
        $this->addHTML('<select id="' . $id . '" name="' . $id . '">');
        $this->addHTML('<option value="" disabled selected>Choisissez une option</option>');
        foreach($content as $value => $name) {
            $selected = $this->getPost()->getValue($id) == $value ? ' selected' : '';
            $this->addHTML('<option value="' . $value . '"' . $selected . '>' . $name . '</option>');
        }
        $this->addHTML('</select>');
        $this->addHTML('<label for="' . $id . '">' . $label . '</label>');
        $this->addHTML('<span class="helper-text red-text">' . $error . '</span>');
        $this->addHTML('</div>');
    }

    /**
     * @param string $captcha
     * @param string $id
     * @param string $label
     */
    public function addCaptcha($captcha, $id, $label) {
        $value = $this->getPost()->getValue($id) ? $this->getPost()->getValue($id) : '';
        $error = isset($this->errors[$id]) ? $this->errors[$id] : '';
        $this->addHTML('<div class="input-field col s4">');
        $this->addHTML($captcha);
        $this->addHTML('</div>');
        $this->addHTML('<div class="input-field col s8">');
        $this->addHTML('<input id="' . $id . '" name="' . $id . '" type="text" value="' . $value . '" class="validate" />');
        $this->addHTML('<label for="' . $id . '">' . $label . '</label>');
        $this->addHTML('<span class="helper-text red-text">' . $error . '</span>');
        $this->addHTML('</div>');
    }

    /**
     * @param string $id
     * @param string $label
     * @param bool $class
     */
    public function addTextarea($id, $label, $class = false, $pattern = false) {
        $value = $this->getPost()->getValue($id) ? $this->getPost()->getValue($id) : $label;
        $error = isset($this->errors[$id]) ? $this->errors[$id] : '';
        $pattern = $pattern ? 'pattern="' . $pattern . '"' : '';
        $class = $class ? 'materialize-textarea validate ' . $class : 'materialize-textarea validate';
        $this->addHTML('<textarea id="' . $id . '" name="' . $id . '" class="' . $class . '" ' . $pattern . '>' . $value . '</textarea>');
        $this->addHTML('<p class="helper-text red-text">' . $error . '</p>');
    }

    /**
     * @param string $id
     * @param string $value
     */
    public function addSecurityToken($id, $value) {
        $error = isset($this->errors[$id]) ? $this->errors[$id] : '';
        $this->addHTML('<input id="' . $id . '" name="' . $id . '" type="hidden" value="' . $value . '" />');
        $this->addHTML('<p class="red-text">' . $error . '</p>');
    }
    /**
     * @param string $label
     * @param string $class
     */
    public function addSubmit($label = 'Envoyer', $class = 'btn btn-large') {
        $class = $class === 'btn btn-large' ? $class : 'btn ' . $class;
        $this->addHTML('<button type="submit" class="' . $class . '">' . $label . '</button>');
    }

    /**
     * @echo string
     */
    public function parse() {
        echo $this->html;
        echo '</form>';
    }

    public function __destruct() {

    }

}