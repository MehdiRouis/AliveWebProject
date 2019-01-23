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
    <li><a href="#home"><i class="fas fa-home"></i> ACCUEIL</a></li>
    <li><a href="#infos"><i class="fas fa-info"></i> PRÉSENTATION</a></li>
    <li><a href="#news"><i class="fas fa-newspaper"></i> ARTICLES</a></li>
    <li><a href="#sources"><i class="fas fa-search-plus"></i> RESSOURCES</a></li>
    <li><a href="#team"><i class="fas fa-users"></i> NOTRE EQUIPE</a></li>
</ul>