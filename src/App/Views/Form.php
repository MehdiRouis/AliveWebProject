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

use Models\Globals\Post;

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
     * Form constructor.
     * @param string $routeName
     * @param string $method
     * @throws \Exception \App\Routes\RouterExceptions
     */
    public function __construct($routeName, $method = 'POST') {
        $this->post = new Post();
        $this->router = $GLOBALS['router'];
        $this->method = $method;
        $this->route = $this->getRouter()->getFullUrl($routeName);
        $this->html = '<form class="row" method="' . $method . '" action="' . $this->route . '">';
    }

    /**
     * @return \App\Routes\Router
     */
    private function getRouter() {
        return $this->router;
    }

    /**
     * @return Post
     */
    private function getPost() {
        return $this->post;
    }

    /**
     * @param string $html
     */
    private function addHTML($html) {
        $this->html .= "{$html}\n";
    }

    /**
     * @param array $errors
     * @param string $id
     * @param string $label
     * @param string $fieldClass
     * @param string $type
     * @param string $pattern
     * @param string $inputClass
     */
    public function addField($errors, $id, $label, $fieldClass = 'col s12', $type = 'text', $pattern = '', $inputClass = 'validate') {
        $fieldClass = 'input-field ' . $fieldClass;
        $inputClass = $inputClass === 'validate' ? $inputClass : 'validate '.$inputClass;
        $pattern = !empty($pattern) ? ' pattern="' . $pattern . '"' : '';
        $placeHolder = $type === 'date' || $type === 'time' ? ' placeholder=""' : '';
        $value = $this->getPost()->getValue($id) ? $this->getPost()->getValue($id) : '';
        $error = isset($errors[$id]) ? $errors[$id] : '';
        $this->addHTML('<div class="' . $fieldClass . '">');
        $this->addHTML('<input id="' . $id . '" name="' . $id . '" type="' . $type . '" value="' . $value . '"' . $placeHolder . ' class="' . $inputClass . '"' . $pattern . ' />');
        $this->addHTML('<label for="' . $id . '">' . $label . '</label>');
        $this->addHTML('<span class="helper-text red-text">' . $error . '</span>');
        $this->addHTML('</div>');
    }

    /**
     * @param array $errors
     * @param string $id
     * @param string $label
     * @param array $content
     * @param string $fieldClass
     */
    public function addSelect($errors, $id, $label, $content = [], $fieldClass = 'col s12') {
        $selected = $this->getPost()->getValue($id) ? 'selected' : '';
        $fieldClass = 'input-field ' . $fieldClass;
        $error = isset($errors[$id]) ? $errors[$id] : '';
        $this->addHTML('<div class="' . $fieldClass . '">');
        $this->addHTML('<select id="' . $id . '" name="' . $id . '">');
        $this->addHTML('<option value="" disabled selected>Choisissez une option</option>');
        foreach($content as $value => $name) {
            $this->addHTML('<option value="' . $value . '" ' . $selected . '>' . $name . '</option>');
        }
        $this->addHTML('</select>');
        $this->addHTML('<label for="' . $id . '">' . $label . '</label>');
        $this->addHTML('<span class="helper-text red-text">' . $error . '</span>');
        $this->addHTML('</div>');
    }

    /**
     * @param array $errors
     * @param string $captcha
     * @param string $id
     * @param string $label
     */
    public function addCaptcha($errors, $captcha, $id, $label) {
        $value = $this->getPost()->getValue($id) ? $this->getPost()->getValue($id) : '';
        $error = isset($errors[$id]) ? $errors[$id] : '';
        $this->addHTML('<div class="input-field col s4">');
        $this->addHTML($captcha);
        $this->addHTML('</div>');
        $this->addHTML('<div class="input-field col s8">');
        $this->addHTML('<input id="' . $id . '" name="' . $id . '" type="text" value="' . $value . '" class="validate" />');
        $this->addHTML('<label for="' . $id . '">' . $label . '</label>');
        $this->addHTML('<span class="helper-text red-text">' . $error . '</span>');
        $this->addHTML('</div>');
    }
    //<textarea id="projectDescription" name="projectDescription" class="materialize-textarea white-text"></textarea>
    public function addTextarea($errors, $id, $label, $class = false) {
        $value = $this->getPost()->getValue($id) ? $this->getPost()->getValue($id) : $label;
        $error = isset($errors[$id]) ? $errors[$id] : '';
        $class = $class ? 'materialize-textarea ' . $class : 'materialize-textarea';
        $this->addHTML('<textarea id="' . $id . '" name="' . $id . '" class="' . $class . '">' . $value . '</textarea>');
        $this->addHTML('<p class="helper-text red-text">' . $error . '</p>');
    }

    public function addSecurityToken($id, $value) {
        $this->addHTML('<input id="' . $id . '" name="' . $id . '" type="hidden" value="' . $value . '" />');
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