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
        <div class="card dark-blue">
            <div class="card-content">
                <ul class="tabs tabs-transparent dark">
                    <li class="tab"><a href="#infos">Informations</a></li>
                    <li class="tab"><a href="#parameters"<?= isset($_GET['post']) ? ' class="active"' : ''; ?>>Paramètres</a></li>
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
                <p>Inscription : <?= $userProfile->getCreatedAt(); ?></p>
            </div>
        </div>
        <div id="parameters">
            <ul class="collapsible popout">
                <li<?= isset($_GET['post']) && $_GET['post'] === 'emailChange' ? ' class="active"' : ''; ?>>
                    <div class="collapsible-header">Modifier votre adresse email</div>
                    <div class="collapsible-body white">
                        <?php
                        $formEmail = new \App\Views\Form($errors, $router->getFullUrl('pEmailChange') . '?post=emailChange#parameters', 'POST', true);
                        $formEmail->addField('email', 'Nouvelle adresse email', 'col s12 m6', 'email');
                        $formEmail->addField('reEmail', 'Retapez votre adresse email', 'col s12 m6', 'email');
                        $formEmail->addField('password', 'Tapez votre mot de passe', 'col s12', 'password');
                        $formEmail->addSubmit();
                        $formEmail->parse();
                        ?>
                    </div>
                </li>
                <li<?= isset($_GET['post']) && $_GET['post'] === 'passwordChange' ? ' class="active"' : ''; ?>>
                    <div class="collapsible-header">Modifier son mot de passe</div>
                    <div class="collapsible-body white">
                        <?php
                        $formEmail = new \App\Views\Form($errors, $router->getFullUrl('pPasswordChange') . '?post=passwordChange#parameters', 'POST', true);
                        $formEmail->addField('oldPassword', 'Ancien mot de passe', 'col s12', 'password');
                        $formEmail->addField('newPassword', 'Choisissez un nouveau mot de passe', 'col s12 m6', 'password');
                        $formEmail->addField('reNewPassword', 'Retapez votre nouveau mot de passe', 'col s12 m6', 'password');
                        $formEmail->addSubmit();
                        $formEmail->parse();
                        ?>
                    </div>
                </li>
                <li<?= isset($_GET['post']) && $_GET['post'] === 'phoneNumberChange' ? ' class="active"' : ''; ?>>
                    <div class="collapsible-header">Modifier son numéro de téléphone</div>
                    <div class="collapsible-body white">
                        <?php
                        $formPhoneNumber = new \App\Views\Form($errors, $router->getFullUrl('pPhoneNumberChange') . '?post=phoneNumberChange#parameters', 'POST', true);
                        $formPhoneNumber->addField('phoneNumber', 'Nouveau numéro de téléphone (+33601010101)', 'col s12 m6', 'text', '(\+33)[1-9]([0-9]{2}){4}');
                        $formPhoneNumber->addField('password', 'Entrez votre mot de passe', 'col s12 m6', 'password');
                        $formPhoneNumber->addSubmit();
                        $formPhoneNumber->parse();
                        ?>
                    </div>
                </li>
            </ul>
        </div>
    <?php } ?>
</main>