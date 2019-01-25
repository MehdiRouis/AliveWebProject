<?php
/**
 * Created by PhpStorm.
 * User: esska
 * Date: 23/01/19
 * Time: 07:59
 */

namespace Controllers;

use Models\Articles\Article;
use Models\Users\Rank;

/**
 * Class IndexController
 * @package Controllers
 */
class IndexController extends Controller {

    public function getHomepage() {
        $this->security->restrict(false);
        $news = new Article();
        $staffs = new Rank();
        $this->render('index', ['scripts' => ['js/index.js'], 'news' => $news->getAllNews(5), 'staffs' => $staffs->getRankedUsers('ORDER BY `rank` DESC', 3)]);
    }

    public function getNotice() {
        $this->render('terms/service');
    }

    public function getPrivacyPolicy() {
        $this->render('terms/privacy-policy');
    }

    public function getNotFound() {
        $this->render('errors/404', []);
    }

}
