<?php
/**
 * Created by PhpStorm.
 * User: esska
 * Date: 23/01/19
 * Time: 07:59
 */

namespace Controllers;

/**
 * Class IndexController
 * @package Controllers
 */
class IndexController extends Controller {
    /**
     * @throws \Exception \App\Views\ViewsExceptions
     */
    public function getHomepage() {
        $this->render('index', ['scripts' => ['js/index.js']]);
    }

    /**
     * @throws \Exception \App\Views\ViewsExceptions
     */
    public function getNotFound() {
        $this->render('errors/404');
    }

}
