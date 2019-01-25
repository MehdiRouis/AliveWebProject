<?php
/**
 * Copyright (c) 2019. Tous droit réservé.
 */

/**
 * Created by PhpStorm.
 * User: esska
 * Date: 23/01/19
 * Time: 16:33
 */

namespace App\Views;

class Navbar
{
    /**
     * @var \App\Routes\Router
     */
    private $router;

    /**
     * @var string
     */
    private $html;

    public function __construct() {
        $this->router = $GLOBALS['router'];
        $this->html = '<ul id="slide-out" class="sidenav">';
    }

    public function getRouter() {
        return $this->router;
    }

    private function addHTML($html) {
        $this->html .= "{$html}\n";
    }

    /**
     * @param string $routeName
     * @param string $label
     * @param bool $icon
     * @throws \Exception \App\Routes\RouterExceptions
     */
    public function add($routeName, $label, $icon = false, $classLi = false) {
        $icon = $icon ? '<i class="' . $icon . '"></i> ' : '';
        $classActiveLi = $classLi ? 'active ' . $classLi : 'active';
        $classLi = $classLi ? ' class="' . $classLi . '"' : '';
        $active = $this->getRouter()->getActualRoute() === $routeName ? ' class="' . $classActiveLi . '"' : $classLi;
        $this->addHTML('<li' . $active . '><a href="' . $this->getRouter()->getFullUrl($routeName) . '">' . $icon . $label . '</a></li>');
    }

    /**
     * @param string $link
     * @param string $label
     * @param bool $icon
     */
    public function addWithLink($link, $label, $icon = false, $classLi = false) {
        $icon = $icon ? '<i class="' . $icon . '"></i> ' : '';
        $classLi = $classLi ? ' class="' . $classLi . '"' : '';
        $this->addHTML('<li' . $classLi . '><a href="' . $link . '">' . $icon . $label . '</a></li>');
    }

    public function parse() {
        $this->addHTML('</ul>');
        echo $this->html;
    }

    public function __destruct() {

    }
}