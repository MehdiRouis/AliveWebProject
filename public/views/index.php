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
        <?php if(count($news) > 0) { ?>
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
                                <?php foreach($news as $new) { ?>
                                <li class="open-new" data-open="<?= $new->getId(); ?>"><a><?= $new->getTitle(); ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col s12 m8">
                    <?php foreach($news as $new) { ?>
                    <div id="article1" class="card card-news">
                        <div class="card-content center-align">
                            <p class="card-title"><?= $new->getTitle(); ?></p>
                            <div class="divider"></div>
                            <?= $new->getContent(); ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php } ?>
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
                                        <a class="right mr-10 mt-10 mb-10 waves-effect waves-light btn pulse"><i class="material-icons">add</i></a>
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
                                        <a class="right mr-10 mt-10 mb-10 waves-effect waves-light btn pulse"><i class="material-icons">add</i></a>
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
                                        <a class="right mr-10 mt-10 mb-10 waves-effect waves-light btn pulse"><i class="material-icons">add</i></a>
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
                                        <a class="right mr-10 mt-10 mb-10 waves-effect waves-light btn pulse"><i class="material-icons">add</i></a>
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
                                        <a class="right mr-10 mt-10 mb-10 waves-effect waves-light btn pulse"><i class="material-icons">add</i></a>
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
                                        <a class="right mr-10 mt-10 mb-10 waves-effect waves-light btn pulse"><i class="material-icons">add</i></a>
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
                                        <a class="right mr-10 mt-10 mb-10 waves-effect waves-light btn pulse"><i class="material-icons">add</i></a>
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
                                        <a class="right mr-10 mt-10 mb-10 waves-effect waves-light btn pulse"><i class="material-icons">add</i></a>
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
                                        <a class="right mr-10 mt-10 mb-10 waves-effect waves-light btn pulse"><i class="material-icons">add</i></a>
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
                                        <a class="right mr-10 mt-10 mb-10 waves-effect waves-light btn pulse"><i class="material-icons">add</i></a>
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
                                        <a class="right mr-10 mt-10 mb-10 waves-effect waves-light btn pulse"><i class="material-icons">add</i></a>
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
                                        <a class="right mr-10 mt-10 mb-10 waves-effect waves-light btn pulse"><i class="material-icons">add</i></a>
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
