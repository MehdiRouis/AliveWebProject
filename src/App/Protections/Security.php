<?php
/**
 * Created by PhpStorm.
 * User: esska
 * Date: 23/01/19
 * Time: 07:59
 */

namespace App\Protections;

/**
 * Class Security
 * @package App\Protections
 */
class Security {

    /**
     * Vérifier les injections SQL dans les paramètres de l'URL ( $_GET )
     */
    public function __construct() {
        $injection = 'INSERT|UNION|SELECT|NULL|COUNT|FROM|LIKE|DROP|TABLE|WHERE|COUNT|COLUMN|TABLES|INFORMATION_SCHEMA|OR';
        foreach ($_GET as $getSearchs) {
            $getSearch = explode(' ', $getSearchs);
            foreach ($getSearch as $k => $v) {
                if (in_array(strtoupper(trim($v)), explode('|', $injection))) {
                    exit;
                }
            }
        }
    }

    /**
     * Rediriger via le nom d'une route.
     * @param string $routeName
     * @param array $params
     * @param bool $exit
     */
    public function safeLocalRedirect($routeName, $params = [], $exit = true) {
        $updatedLink = $GLOBALS['router']->getFullUrl($routeName, $params);
        $this->safeExternalRedirect($updatedLink, $exit);
    }

    /**
     * Redirection sécurisée
     * @param string $link
     * @param bool $exit
     */
    public function safeExternalRedirect($link, $exit = true) {
        if (!headers_sent()) {
            header('HTTP/1.1 301 Moved Permanently');
            header('Location: ' . $link);
            header('Connection: close');
        }
        print '<html>';
        print '<head><title>Redirection...</title>';
        print "<meta http-equiv='Refresh' content='0;url='{$link}' />";
        print '</head>';
        print "<body onload='location.replace('{$link}')'>";
        print 'Vous rencontrez peut-être un problème.<br />';
        print "<a href='{$link}'>Se faire rediriger</a><br />";
        print 'Si ceci est une erreur, merci de cliquer sur le lien.<br />';
        print '</body>';
        print '</html>';
        if ($exit) {
            exit;
        }
    }

    /**
     * Afficher des variables à sécuriser
     * @param string $text
     * @return string
     */
    public function parse($text) {
        return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
    }

    public function __destruct() {

    }

}
