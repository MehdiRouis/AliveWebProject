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
<!-- MODALS CONTENU DU DL ( BOUCLE À FAIRE ) -->
<div id="download-content-1" class="modal">
    <div class="modal-content">
        <img class="responsive-img" src="<?= PROJECT_LINK; ?>/public/assets/img/parallax/poing-bureau.jpg" alt="poing-bureau.jpg" />
        <p class="rem20 center-align">Titre du téléchargement 1</p>
        <div class="divider"></div>
        <p>Description du téléchargement 1</p>
        <p class="right-align">Crée par {Pseudo}, il y a x temps.</p>
    </div>
    <div class="modal-footer">
        <a target='_blank' href="./" class="modal-close waves-effect waves-green btn-flat green white-text">Télécharger</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat red white-text">Fermer</a>
    </div>
</div>
<div id="download-content-2" class="modal">
    <div class="modal-content">
        <img class="responsive-img" src="<?= PROJECT_LINK; ?>/public/assets/img/parallax/poing-bureau.jpg" alt="poing-bureau.jpg" />
        <p class="rem20 center-align">Titre du téléchargement 2</p>
        <div class="divider"></div>
        <p>Description du téléchargement 2</p>
        <p class="right-align">Crée par {Pseudo}, il y a x temps.</p>
    </div>
    <div class="modal-footer">
        <a target='_blank' href="./" class="modal-close waves-effect waves-green btn-flat green white-text">Télécharger</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat red white-text">Fermer</a>
    </div>
</div>
<div id="download-content-3" class="modal">
    <div class="modal-content">
        <img class="responsive-img" src="<?= PROJECT_LINK; ?>/public/assets/img/parallax/poing-bureau.jpg" alt="poing-bureau.jpg" />
        <p class="rem20 center-align">Titre du téléchargement 3</p>
        <div class="divider"></div>
        <p>Description du téléchargement 3</p>
        <p class="right-align">Crée par {Pseudo}, il y a x temps.</p>
    </div>
    <div class="modal-footer">
        <a target='_blank' href="./" class="modal-close waves-effect waves-green btn-flat green white-text">Télécharger</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat red white-text">Fermer</a>
    </div>
</div>
<div id="download-content-4" class="modal">
    <div class="modal-content">
        <img class="responsive-img" src="<?= PROJECT_LINK; ?>/public/assets/img/parallax/poing-bureau.jpg" alt="poing-bureau.jpg" />
        <p class="rem20 center-align">Titre du téléchargement 4</p>
        <div class="divider"></div>
        <p>Description du téléchargement 4</p>
        <p class="right-align">Crée par {Pseudo}, il y a x temps.</p>
    </div>
    <div class="modal-footer">
        <a target='_blank' href="./" class="modal-close waves-effect waves-green btn-flat green white-text">Télécharger</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat red white-text">Fermer</a>
    </div>
</div>
<div id="download-content-5" class="modal">
    <div class="modal-content">
        <img class="responsive-img" src="<?= PROJECT_LINK; ?>/public/assets/img/parallax/poing-bureau.jpg" alt="poing-bureau.jpg" />
        <p class="rem20 center-align">Titre du téléchargement 5</p>
        <div class="divider"></div>
        <p>Description du téléchargement 5</p>
        <p class="right-align">Crée par {Pseudo}, il y a x temps.</p>
    </div>
    <div class="modal-footer">
        <a target='_blank' href="./" class="modal-close waves-effect waves-green btn-flat green white-text">Télécharger</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat red white-text">Fermer</a>
    </div>
</div>
<div id="download-content-6" class="modal">
    <div class="modal-content">
        <img class="responsive-img" src="<?= PROJECT_LINK; ?>/public/assets/img/parallax/poing-bureau.jpg" alt="poing-bureau.jpg" />
        <p class="rem20 center-align">Titre du téléchargement 6</p>
        <div class="divider"></div>
        <p>Description du téléchargement 6</p>
        <p class="right-align">Crée par {Pseudo}, il y a x temps.</p>
    </div>
    <div class="modal-footer">
        <a target='_blank' href="./" class="modal-close waves-effect waves-green btn-flat green white-text">Télécharger</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat red white-text">Fermer</a>
    </div>
</div>
<div id="download-content-7" class="modal">
    <div class="modal-content">
        <img class="responsive-img" src="<?= PROJECT_LINK; ?>/public/assets/img/parallax/poing-bureau.jpg" alt="poing-bureau.jpg" />
        <p class="rem20 center-align">Titre du téléchargement 7</p>
        <div class="divider"></div>
        <p>Description du téléchargement 7</p>
        <p class="right-align">Crée par {Pseudo}, il y a x temps.</p>
    </div>
    <div class="modal-footer">
        <a target='_blank' href="./" class="modal-close waves-effect waves-green btn-flat green white-text">Télécharger</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat red white-text">Fermer</a>
    </div>
</div>
<div id="download-content-8" class="modal">
    <div class="modal-content">
        <img class="responsive-img" src="<?= PROJECT_LINK; ?>/public/assets/img/parallax/poing-bureau.jpg" alt="poing-bureau.jpg" />
        <p class="rem20 center-align">Titre du téléchargement 8</p>
        <div class="divider"></div>
        <p>Description du téléchargement 8</p>
        <p class="right-align">Crée par {Pseudo}, il y a x temps.</p>
    </div>
    <div class="modal-footer">
        <a target='_blank' href="./" class="modal-close waves-effect waves-green btn-flat green white-text">Télécharger</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat red white-text">Fermer</a>
    </div>
</div>
<div id="download-content-9" class="modal">
    <div class="modal-content">
        <img class="responsive-img" src="<?= PROJECT_LINK; ?>/public/assets/img/parallax/poing-bureau.jpg" alt="poing-bureau.jpg" />
        <p class="rem20 center-align">Titre du téléchargement 9</p>
        <div class="divider"></div>
        <p>Description du téléchargement 9</p>
        <p class="right-align">Crée par {Pseudo}, il y a x temps.</p>
    </div>
    <div class="modal-footer">
        <a target='_blank' href="./" class="modal-close waves-effect waves-green btn-flat green white-text">Télécharger</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat red white-text">Fermer</a>
    </div>
</div>
<main>
    <div class="container">
        <div id="infos" class="row">
            <div class="col s12">
                <div class="card">
                    <div class="card-content">
                        <p class="card-title center-align">Présentation</p>
                        <div class="divider mb-10"></div>
                        <div class="row center-align">
                            <div class="col s12 m6 l4">
                                <i class="large material-icons hoverscale">flash_on</i>
                                <h5 class="soft-blue-text">Efficacité</h5>
                                <p class="soft-white">Notre équipe ainsi reste efficace en modérant de façon optimale le contenu présent sur le site.</p>
                            </div>
                            <div class="col s12 m6 l4">
                                <i class="large material-icons hoverscale">people</i>
                                <h5 class="soft-blue-text">Collaboration</h5>
                                <p class="soft-white">Nous facturons avec transparence<br/>et livrons vos projets en un temps optimal.</p>
                            </div>
                            <div class="col s12 l4">
                                <i class="large material-icons hoverscale">phonelink_ring</i>
                                <h5 class="soft-blue-text">Qualitatif</h5>
                                <p class="soft-white">Notre équipe s'occupe de mettre en avant les ressources qualitatifs pour une meilleur visibilité des meilleurs projets.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="parallax-container hoverable">
        <div class="parallax"><img src="<?= PROJECT_LINK; ?>/public/assets/img/parallax/ordi-travail.jpg" alt="Background parallax 1" /></div>
    </div>
    <div class="container">
        <div id="news" class="row">
            <div class="col s12 m4 pos-sticky-top">
                <div class="card">
                    <div class="card-content center-align">
                        <p class="card-title">ARTICLES</p>
                        <div class="divider"></div>
                        <ul class="tab">
                            <li class="open-new" data-open="article1"><a>TITRE ARTICLE 1</a></li>
                            <li class="open-new" data-open="article2"><a>TITRE ARTICLE 2</a></li>
                            <li class="open-new" data-open="article3"><a>TITRE ARTICLE 3</a></li>
                            <li class="open-new" data-open="article4"><a>TITRE ARTICLE 4</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col s12 m8">
                <div id="article1" class="card card-news">
                    <div class="card-content center-align">
                        <p class="card-title">TITRE 1</p>
                        <div class="divider"></div>
                        <p>CONTENU 1</p>
                        <p>CONTENU 1</p>
                        <p>CONTENU 1</p>
                        <p>CONTENU 1</p>
                        <p>CONTENU 1</p>
                        <p>CONTENU 1</p>
                        <p>CONTENU 1</p>
                        <p>CONTENU 1</p>
                        <p>CONTENU 1</p>
                        <p>CONTENU 1</p>
                        <p>CONTENU 1</p>
                        <p>CONTENU 1</p>
                        <p>CONTENU 1</p>
                        <p>CONTENU 1</p>
                        <p>CONTENU 1</p>
                        <p>CONTENU 1</p>
                        <p>CONTENU 1</p>
                        <p>CONTENU 1</p>
                        <p>CONTENU 1</p>
                        <p>CONTENU 1</p>
                        <p>CONTENU 1</p>
                        <p>CONTENU 1</p>
                        <p>CONTENU 1</p>
                        <p>CONTENU 1</p>
                        <p>CONTENU 1</p>
                        <p>CONTENU 1</p>
                        <p>CONTENU 1</p>
                        <p>CONTENU 1</p>
                        <p>CONTENU 1</p>
                        <p>CONTENU 1</p>
                        <p>CONTENU 1</p>
                        <p>CONTENU 1</p>
                        <p>CONTENU 1</p>
                        <p>CONTENU 1</p>
                        <p>CONTENU 1</p>
                        <p>CONTENU 1</p>
                        <p>CONTENU 1</p>
                        <p>CONTENU 1</p>
                        <p>CONTENU 1</p>
                        <p>CONTENU 1</p>
                    </div>
                </div>
                <div id="article2" class="card card-news dnone">
                    <div class="card-content center-align">
                        <p class="card-title">TITRE 2</p>
                        <div class="divider"></div>
                        <p>CONTENU 2</p>
                    </div>
                </div>
                <div id="article3" class="card card-news dnone">
                    <div class="card-content center-align">
                        <p class="card-title">TITRE 3</p>
                        <div class="divider"></div>
                        <p>CONTENU 3</p>
                    </div>
                </div>
                <div id="article4" class="card card-news dnone">
                    <div class="card-content center-align">
                        <p class="card-title">TITRE 4</p>
                        <div class="divider"></div>
                        <p>CONTENU 4</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="parallax-container hoverable">
        <div class="parallax"><img src="<?= PROJECT_LINK; ?>/public/assets/img/parallax/ordi.jpg" alt="Background parallax 2" /></div>
    </div>
    <div class="container mt-10">
        <div id="sources" class="row">
            <div class="col s12">
                <div class="card">
                    <div class="card-content center-align">
                        <p class="card-title">Quelques sources partagées</p>
                        <div class="divider"></div>
                        <div id="threeSources" class="row">
                            <div class="col s12 m4">
                                <div class="card">
                                    <div class="card-image">
                                        <img class="responsive-img-perso himg" src="<?= PROJECT_LINK; ?>/public/assets/img/parallax/poing-bureau.jpg" alt="poing-bureau.jpg" />
                                    </div>
                                    <span class="card-title truncate">Source 1</span>
                                    <div class="divider"></div>
                                    <p>Description légère pour une source.</p>
                                    <div class="divider"></div>
                                    <a class="right mr-10 mt-10 mb-10 waves-effect waves-light btn modal-trigger pulse tooltipped" data-position="top" data-tooltip="Télécharger" href="#download-content-1" ><i class="material-icons">add</i></a>
                                </div>
                            </div>
                            <div class="col s12 m4">
                                <div class="card">
                                    <div class="card-image">
                                        <img class="responsive-img-perso himg" src="<?= PROJECT_LINK; ?>/public/assets/img/parallax/poing-bureau.jpg" alt="poing-bureau.jpg" />
                                    </div>
                                    <span class="card-title truncate">Source 2</span>
                                    <div class="divider"></div>
                                    <p>Description légère pour une source.</p>
                                    <div class="divider"></div>
                                    <a class="right mr-10 mt-10 mb-10 waves-effect waves-light btn modal-trigger pulse tooltipped" data-position="top" data-tooltip="Télécharger" href="#download-content-2" ><i class="material-icons">add</i></a>
                                </div>
                            </div>
                            <div class="col s12 m4">
                                <div class="card">
                                    <div class="card-image">
                                        <img class="responsive-img-perso himg" src="<?= PROJECT_LINK; ?>/public/assets/img/parallax/poing-bureau.jpg" alt="poing-bureau.jpg" />
                                    </div>
                                    <span class="card-title truncate">Source 3</span>
                                    <div class="divider"></div>
                                    <p>Description légère pour une source.</p>
                                    <div class="divider"></div>
                                    <a class="right mr-10 mt-10 mb-10 waves-effect waves-light btn modal-trigger pulse tooltipped" data-position="top" data-tooltip="Télécharger" href="#download-content-3" ><i class="material-icons">add</i></a>
                                </div>
                            </div>
                            <div class="col s12">
                                <div class="divider"></div>
                                <a id="showAllSources" class="btn waves-effect waves-light mt-10">Tout voir</a>
                            </div>
                        </div>
                        <div id="allSources" class="dnone row">
                            <div class="col s12 m4">
                                <div class="card">
                                    <div class="card-image">
                                        <img class="responsive-img-perso himg" src="<?= PROJECT_LINK; ?>/public/assets/img/parallax/poing-bureau.jpg" alt="poing-bureau.jpg" />
                                    </div>
                                    <span class="card-title truncate">Source 1</span>
                                    <div class="divider"></div>
                                    <p>Description légère pour une source.</p>
                                    <div class="divider"></div>
                                    <a class="right mr-10 mt-10 mb-10 waves-effect waves-light btn modal-trigger pulse tooltipped" data-position="top" data-tooltip="Télécharger" href="#download-content-1" ><i class="material-icons">add</i></a>
                                </div>
                            </div>
                            <div class="col s12 m4">
                                <div class="card">
                                    <div class="card-image">
                                        <img class="responsive-img-perso himg" src="<?= PROJECT_LINK; ?>/public/assets/img/parallax/poing-bureau.jpg" alt="poing-bureau.jpg" />
                                    </div>
                                    <span class="card-title truncate">Source 2</span>
                                    <div class="divider"></div>
                                    <p>Description légère pour une source.</p>
                                    <div class="divider"></div>
                                    <a class="right mr-10 mt-10 mb-10 waves-effect waves-light btn modal-trigger pulse tooltipped" data-position="top" data-tooltip="Télécharger" href="#download-content-2" ><i class="material-icons">add</i></a>
                                </div>
                            </div>
                            <div class="col s12 m4">
                                <div class="card">
                                    <div class="card-image">
                                        <img class="responsive-img-perso himg" src="<?= PROJECT_LINK; ?>/public/assets/img/parallax/poing-bureau.jpg" alt="poing-bureau.jpg" />
                                    </div>
                                    <span class="card-title truncate">Source 3</span>
                                    <div class="divider"></div>
                                    <p>Description légère pour une source.</p>
                                    <div class="divider"></div>
                                    <a class="right mr-10 mt-10 mb-10 waves-effect waves-light btn modal-trigger pulse tooltipped" data-position="top" data-tooltip="Télécharger" href="#download-content-3" ><i class="material-icons">add</i></a>
                                </div>
                            </div>
                            <div class="col s12 m4">
                                <div class="card">
                                    <div class="card-image">
                                        <img class="responsive-img-perso himg" src="<?= PROJECT_LINK; ?>/public/assets/img/parallax/poing-bureau.jpg" alt="poing-bureau.jpg" />
                                    </div>
                                    <span class="card-title truncate">Source 4</span>
                                    <div class="divider"></div>
                                    <p>Description légère pour une source.</p>
                                    <div class="divider"></div>
                                    <a class="right mr-10 mt-10 mb-10 waves-effect waves-light btn modal-trigger pulse tooltipped" data-position="top" data-tooltip="Télécharger" href="#download-content-4" ><i class="material-icons">add</i></a>
                                </div>
                            </div>
                            <div class="col s12 m4">
                                <div class="card">
                                    <div class="card-image">
                                        <img class="responsive-img-perso himg" src="<?= PROJECT_LINK; ?>/public/assets/img/parallax/poing-bureau.jpg" alt="poing-bureau.jpg" />
                                    </div>
                                    <span class="card-title truncate">Source 5</span>
                                    <div class="divider"></div>
                                    <p>Description légère pour une source.</p>
                                    <div class="divider"></div>
                                    <a class="right mr-10 mt-10 mb-10 waves-effect waves-light btn modal-trigger pulse tooltipped" data-position="top" data-tooltip="Télécharger" href="#download-content-5" ><i class="material-icons">add</i></a>
                                </div>
                            </div>
                            <div class="col s12 m4">
                                <div class="card">
                                    <div class="card-image">
                                        <img class="responsive-img-perso himg" src="<?= PROJECT_LINK; ?>/public/assets/img/parallax/poing-bureau.jpg" alt="poing-bureau.jpg" />
                                    </div>
                                    <span class="card-title truncate">Source 6</span>
                                    <div class="divider"></div>
                                    <p>Description légère pour une source.</p>
                                    <div class="divider"></div>
                                    <a class="right mr-10 mt-10 mb-10 waves-effect waves-light btn modal-trigger pulse tooltipped" data-position="top" data-tooltip="Télécharger" href="#download-content-6" ><i class="material-icons">add</i></a>
                                </div>
                            </div>
                            <div class="col s12 m4">
                                <div class="card">
                                    <div class="card-image">
                                        <img class="responsive-img-perso himg" src="<?= PROJECT_LINK; ?>/public/assets/img/parallax/poing-bureau.jpg" alt="poing-bureau.jpg" />
                                    </div>
                                    <span class="card-title truncate">Source 7</span>
                                    <div class="divider"></div>
                                    <p>Description légère pour une source.</p>
                                    <div class="divider"></div>
                                    <a class="right mr-10 mt-10 mb-10 waves-effect waves-light btn modal-trigger pulse tooltipped" data-position="top" data-tooltip="Télécharger" href="#download-content-7" ><i class="material-icons">add</i></a>
                                </div>
                            </div>
                            <div class="col s12 m4">
                                <div class="card">
                                    <div class="card-image">
                                        <img class="responsive-img-perso himg" src="<?= PROJECT_LINK; ?>/public/assets/img/parallax/poing-bureau.jpg" alt="poing-bureau.jpg" />
                                    </div>
                                    <span class="card-title truncate">Source 8</span>
                                    <div class="divider"></div>
                                    <p>Description légère pour une source.</p>
                                    <div class="divider"></div>
                                    <a class="right mr-10 mt-10 mb-10 waves-effect waves-light btn modal-trigger pulse tooltipped" data-position="top" data-tooltip="Télécharger" href="#download-content-8" ><i class="material-icons">add</i></a>
                                </div>
                            </div>
                            <div class="col s12 m4">
                                <div class="card">
                                    <div class="card-image">
                                        <img class="responsive-img-perso himg" src="<?= PROJECT_LINK; ?>/public/assets/img/parallax/poing-bureau.jpg" alt="poing-bureau.jpg" />
                                    </div>
                                    <span class="card-title truncate">Source 9</span>
                                    <div class="divider"></div>
                                    <p>Description légère pour une source.</p>
                                    <div class="divider"></div>
                                    <a class="right mr-10 mt-10 mb-10 waves-effect waves-light btn modal-trigger pulse tooltipped" data-position="top" data-tooltip="Télécharger" href="#download-content-9" ><i class="material-icons">add</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="parallax-container">
        <div class="parallax"><img src="<?= PROJECT_LINK; ?>/public/assets/img/parallax/poing-bureau.jpg" alt="Background parallax 3" /></div>
    </div>
    <div class="container">
        <div id="team" class="row">
            <div class="col s12">
                <div class="card">
                    <div class="card-content center-align">
                        <p class="card-title">Équipe</p>
                        <div class="divider"></div>
                        <div class="col s12 m4">
                            <div class="card">
                                <div class="card-image">
                                    <img class="responsive-img-perso himg" src="<?= PROJECT_LINK; ?>/public/assets/img/parallax/poing-bureau.jpg" alt="poing-bureau.jpg" />
                                </div>
                                <span class="card-title mt-10 truncate">Èsska</span>
                                <div class="divider mb-10"></div>
                                <p>Développeur</p>
                                <div class="divider mt-10"></div>
                                <a class="btn right mr-10 mt-10 mb-10 waves-effect waves-light pulse tooltipped" data-position="top" data-tooltip="Voir son profil" target="_blank" href="./" ><i class="material-icons">account_circle</i></a>
                            </div>
                        </div>
                        <div class="col s12 m4">
                            <div class="card">
                                <div class="card-image">
                                    <img class="responsive-img-perso himg" src="<?= PROJECT_LINK; ?>/public/assets/img/parallax/poing-bureau.jpg" alt="poing-bureau.jpg" />
                                </div>
                                <span class="card-title mt-10 truncate">AliveWebProject</span>
                                <div class="divider mb-10"></div>
                                <p>Support</p>
                                <div class="divider mt-10"></div>
                                <a class="btn right mr-10 mt-10 mb-10 waves-effect waves-light pulse tooltipped" data-position="top" data-tooltip="Voir son profil" target="_blank" href="./" ><i class="material-icons">account_circle</i></a>
                            </div>
                        </div>
                        <div class="col s12 m4">
                            <div class="card">
                                <div class="card-image">
                                    <img class="responsive-img-perso himg" src="<?= PROJECT_LINK; ?>/public/assets/img/parallax/poing-bureau.jpg" alt="poing-bureau.jpg" />
                                </div>
                                <span class="card-title mt-10 truncate">Membre 3</span>
                                <div class="divider mb-10"></div>
                                <p>Modérateur</p>
                                <div class="divider mt-10"></div>
                                <a class="btn right mr-10 mt-10 mb-10 waves-effect waves-light pulse tooltipped" data-position="top" data-tooltip="Voir son profil" target="_blank" href="./" ><i class="material-icons">account_circle</i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<footer class="page-footer dark-blue">
    <div id="contact" class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col s12 m8">
                    <p>2018 - Nom du site - Design by Èsska with <i class="fas fa-heart red-text rem10"></i></p>
                </div>
                <div class="col s12 m4">
                    <p><a class="rem13 right" target="_blank" href="https://www.facebook.com/AliveWebProject/"><i class="fab fa-facebook-square white-text footerIcon"></i></a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="<?= PROJECT_LINK; ?>/public/assets/import/jQuery/jquery-3.3.1.min.js"></script>
<script src="<?= PROJECT_LINK; ?>/public/assets/import/Materialize/js/materialize.min.js"></script>
<script src="<?= PROJECT_LINK; ?>/public/assets/import/SweetAlert/sweetalert.min.js"></script>
<script src="<?= PROJECT_LINK; ?>/public/assets/js/core.js"></script>
<script src="<?= PROJECT_LINK; ?>/public/assets/js/ressources.js"></script>
</body>
</html>