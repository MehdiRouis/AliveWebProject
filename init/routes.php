<?php

    /* -[{GET}]- */
    $router->get('/404', 'Index#getNotFound', 'default');
    $router->get('/', 'Index#getHomepage', 'home');