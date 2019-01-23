<?php
/**
 * Created by PhpStorm.
 * User: esska
 * Date: 23/01/19
 * Time: 07:59
 */

namespace Controllers;

use Models\Articles\Article;

/**
 * Class IndexController
 * @package Controllers
 */
class IndexController extends Controller {
    /**
     * @throws \Exception \App\Views\ViewsExceptions
     */
    public function getHomepage() {
        $news = new Article();
        $this->render('index', ['scripts' => ['js/index.js'], 'news' => $news->getAllNews(5)]);
    }

    /**
     * @throws \Exception \App\Views\ViewsExceptions
     */
    public function getNotFound() {
        $this->render('errors/404', []);
    }

}
