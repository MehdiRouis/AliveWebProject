<?php
/**
 * @var \Models\Users\User $userProfile
 * @var \Models\Users\User $user
 * @var array $errors
 */
?>
<main class="container">
    <div id="profile-page-header" class="card">
        <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="<?= PROJECT_LINK; ?>/public/assets/img/carousel/sky.jpg" alt="user background">
            <a class="btn-floating halfway-fab2 waves-effect waves-teal white"><i class="fas fa-camera-retro black-text"></i></a>
        </div>
        <div class="card-content card-avatar center-align">
            <div class="row">
                <div class="circle white darken-1 black-text hoverable avatar">
                    <p><?= $userProfile->getInitialUserName(); ?></p>
                </div>
                <div class="col s12">
                    <h4 class="card-title grey-text text-darken-4"><?= $userProfile->getFullName(); ?></h4>
                    <p class="medium-small grey-text">@<?= $userProfile->getUserName(); ?></p>
                </div>
            </div>
        </div>
    </div>
    <?php if($userProfile->getId() === $user->getId()) { ?>
        <div class="card">
            <div class="card-content">
                <p class="card-title">Paramètres</p>
                <div class="divider"></div>
                <p>Il est possible de modifier vos informations personnelles à partir de ces onglets.</p>
            </div>
        </div>
        <div class="card dark-blue">
            <div class="card-content">
                <ul class="tabs tabs-transparent dark">
                    <li class="tab"><a href="#infos">Informations</a></li>
                    <li class="tab"><a href="#parameters">Paramètres</a></li>
                </ul>
            </div>
        </div>
        <div id="infos" class="card">
            <div class="card-content">
                <p class="card-title">Informations</p>
                <div class="divider"></div>
                <p>Nom d'utilisateur : <?= $userProfile->getUserName(); ?></p>
                <p>Prénom : <?= $userProfile->getFirstName(); ?></p>
                <p>Nom de famille : <?= $userProfile->getLastName(); ?></p>
                <p>Adresse email : <?= $userProfile->getEmail(); ?></p>
                <p>Date de naissance : <?= $userProfile->getBirthDay(); ?></p>
                <p>Numéro de téléphone : <?= $userProfile->getPhoneNumber(); ?></p>
            </div>
        </div>
        <div id="parameters" class="card dark-blue">
            <div class="card-content">
                <ul class="tabs tabs-transparent dark">
                    <li class="tab"><a href="#emailChange">Modifier son adresse email</a></li>
                    <li class="tab"><a href="#passwordChange">Modifier son mot de passe</a></li>
                </ul>
            </div>
        </div>
        <div id="emailChange" class="card<?= isset($_GET['post']) && $_GET['post'] === 'emailChange' ? '' : ' dnone'; ?>">
            <div class="card-content">
                <p class="card-title">Modifier votre adresse email</p>
                <div class="divider"></div>
                <?php
                $formEmail = new \App\Views\Form($errors, $router->getFullUrl('pEmailChange') . '?post=emailChange', 'POST', true);
                $formEmail->addField('email', 'Nouvelle adresse email', 'col s12 m6', 'email');
                $formEmail->addField('reEmail', 'Retapez votre adresse email', 'col s12 m6', 'email');
                $formEmail->addField('password', 'Tapez votre mot de passe', 'col s12', 'password');
                $formEmail->addSubmit();
                $formEmail->parse();
                ?>
            </div>
        </div>
        <div id="passwordChange" class="card<?= isset($_GET['post']) && $_GET['post'] === 'passwordChange' ? '' : ' dnone'; ?>">
            <div class="card-content">
                <p class="card-title">Modifier votre mot de passe</p>
                <div class="divider"></div>
                <?php
                $formEmail = new \App\Views\Form($errors, $router->getFullUrl('pPasswordChange') . '?post=passwordChange', 'POST', true);
                $formEmail->addField('oldPassword', 'Ancien mot de passe', 'col s12', 'password');
                $formEmail->addField('newPassword', 'Choisissez un nouveau mot de passe', 'col s12 m6', 'password');
                $formEmail->addField('reNewPassword', 'Retapez votre nouveau mot de passe', 'col s12 m6', 'password');
                $formEmail->addSubmit();
                $formEmail->parse();
                ?>
            </div>
        </div>
    <?php } ?>
</main>