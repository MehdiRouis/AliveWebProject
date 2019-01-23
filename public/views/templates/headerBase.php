<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <title><?= PROJECT_NAME; ?> - Accueil</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,300,600,800,900" rel="stylesheet" type="text/css" />
    <link rel="icon" type="image/ico" href="<?= PROJECT_LINK; ?>/public/assets/img/cloud-2.png" />
    <link type="text/css" rel="stylesheet" href="<?= PROJECT_LINK; ?>/public/assets/import/Materialize/css/materialize.min.css"  media="screen" />
    <link type="text/css" rel="stylesheet" href="<?= PROJECT_LINK; ?>/public/assets/css/style.css" />
</head>
<body class="grey lighten-2">
<div id="home">
    <div class="parallax-container hoverable">
        <div class="parallax"><img src="<?= PROJECT_LINK; ?>/public/assets/img/parallax/bureau.jpg" alt="Background parallax 2" /></div>
    </div>
</div>
<header>
    <nav id="navbar">
        <div class="nav-wrapper dark-blue">
            <i class="fas fa-cloud"></i>
            <a href="#" class="brand-logo"><?= PROJECT_INITIALS; ?></a>
            <ul class="right center-align">
                <li><a id="menuSideNav" data-target="slide-out" class="right sidenav-trigger"><i class="material-icons">menu</i></a></li>
            </ul>
        </div>
    </nav>
</header>
<ul id="slide-out" class="sidenav">
    <?php if($router->getActualRoute() !== 'home') {
        echo $navbar->add('home', 'ACCUEIL', 'fas fa-home');

    } else {
        echo $navbar->add('login', 'CONNEXION', 'fas fa-sign-in-alt');
        echo $navbar->add('register', 'INSCRIPTION', 'far fa-plus-square');
        echo $navbar->addWithLink('#home', 'ACCUEIL', 'fas fa-home');
        echo $navbar->addWithLink('#infos', 'PRÉSENTATION', 'fas fa-info');
        if(count($news) > 0) {
            echo $navbar->addWithLink('#news', 'ARTICLES', 'fas fa-newspaper');
        }
        echo $navbar->addWithLink('#sources', 'RESSOURCES', 'fas fa-search-plus');
        echo $navbar->addWithLink('#team', 'NOTRE ÉQUIPE', 'fas fa-users');
    } ?>

</ul>
