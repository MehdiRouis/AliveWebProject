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

    public function __construct() {
        $this->router = $GLOBALS['router'];
    }

    public function getRouter() {
        return $this->router;
    }

    /**
     * @param string $routeName
     * @param string $label
     * @param bool $icon
     * @return string
     * @throws \Exception \App\Routes\RouterExceptions
     */
    public function add($routeName, $label, $icon = false) {
        $icon = $icon ? '<i class="' . $icon . '"></i> ' : '';
        $active = $this->getRouter()->getActualRoute() === $routeName ? ' class="active"' : '';
        $content = '<li' . $active . '><a href="' . $this->getRouter()->getFullUrl($routeName) . '">' . $icon . $label . '</a></li>';
        return $content;
    }

    /**
     * @param string $link
     * @param string $label
     * @param bool $icon
     * @return string
     */
    public function addWithLink($link, $label, $icon = false) {
        $icon = $icon ? '<i class="' . $icon . '"></i> ' : '';
        $content = '<li><a href="' . $link . '">' . $icon . $label . '</a></li>';
        return $content;
    }

    public function __destruct() {

    }
}