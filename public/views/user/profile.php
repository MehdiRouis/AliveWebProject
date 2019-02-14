<?php
/**
 * @var \Models\Users\User $userProfile
 * @var \Models\Users\User $user
 * @var array $errors
 */
?>
<?php if($userProfile->getId() === $user->getId()) { ?>
    <div id="updateImage" class="modal">
        <form action="<?= $router->getFullUrl('pBannerChange'); ?>" method="POST" enctype="multipart/form-data">
            <div class="modal-content center-align">
                <p class="rem13">Modifier sa bannière</p>
                <div class="divider"></div>
                <input name="CSRFToken" type="hidden" value="<?= $user->getCSRFToken(); ?>" />
                <?php if(isset($errors['global'])) { ?><span class="helper-text red-text"><?= $errors['global']; ?></span><?php } ?>
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Fichier</span>
                        <input name="file" type="file">
                    </div>
                    <div class="file-path-wrapper">
                        <input id="uploader" class="file-path validate" type="text" />
                        <label for="uploader">Choisissez une image</label>
                        <?php if(isset($errors['file'])) { ?><span class="helper-text red-text"><?= $errors['file']; ?></span><?php } ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="modal-close waves-effect waves-green btn-flat">Annuler</a>
                <button type="submit" class="waves-effect waves-green btn-flat">Envoyer</button>
            </div>
        </form>
    </div>

<?php } ?>
<main class="container">
    <div id="profile-page-header" class="card">
        <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="<?= $userProfile->getProfileBanner(); ?>" alt="user background">
            <?php if($userProfile->getId() === $user->getId()) { ?><a href="#updateImage" class="btn-floating halfway-fab2 waves-effect waves-teal white modal-trigger"><i class="fas fa-camera-retro black-text"></i></a><?php } ?>
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
                <p>Type de profil : <?= $userProfile->getProfileType(true); ?></p>
            </div>
        </div>
        <div id="parameters">
            <?php if(isset($_GET['success']) && $_GET['success'] === 'confidentialityChange') { ?>
                <div class="card gradient-45deg-green-teal">
                    <div class="card-content white-text">
                        <span class="card-title">Mise à jour réussie.</span>
                        <p>Vos paramètres de confidentialités ont été mit à jour.</p>
                    </div>
                </div>
            <?php } ?>
            <?php if(isset($_GET['success']) && $_GET['success'] === 'emailValidated') { ?>
                <div class="card gradient-45deg-green-teal">
                    <div class="card-content white-text">
                        <span class="card-title">Mise à jour réussie.</span>
                        <p>Votre adresse email a bien été validée.</p>
                    </div>
                </div>
            <?php } ?>
            <?php if(isset($_GET['success']) && $_GET['success'] === 'phoneNumberValidated') { ?>
                <div class="card gradient-45deg-green-teal">
                    <div class="card-content white-text">
                        <span class="card-title">Mise à jour réussie.</span>
                        <p>Votre numéro de téléphone a bien été validé.</p>
                    </div>
                </div>
            <?php } ?>
            <?php if(isset($_GET['success']) && $_GET['success'] === 'generationSMS') { ?>
                <div class="card gradient-45deg-green-teal">
                    <div class="card-content white-text">
                        <span class="card-title">SMS envoyé!</span>
                        <p>Vérifiez vos messages afin de recevoir votre code de validation.</p>
                    </div>
                </div>
            <?php } ?>
            <?php if(isset($_GET['success']) && $_GET['success'] === 'generationEmail') { ?>
                <div class="card gradient-45deg-green-teal">
                    <div class="card-content white-text">
                        <span class="card-title">Email envoyé!</span>
                        <p>Vérifiez votre adresse email afin de recevoir votre code de validation.</p>
                    </div>
                </div>
            <?php } ?>
            <?php if(isset($_GET['error']) && $_GET['error'] === 'generationSMS') { ?>
                <div class="card gradient-45deg-red-pink">
                    <div class="card-content white-text">
                        <span class="card-title">Erreur...</span>
                        <p>Pour recevoir de nouveau un SMS de validation, il faut attendre 15 minutes.</p>
                    </div>
                </div>
            <?php } ?>
            <?php if(isset($_GET['error']) && $_GET['error'] === 'generationEmail') { ?>
                <div class="card gradient-45deg-red-pink">
                    <div class="card-content white-text">
                        <span class="card-title">Erreur...</span>
                        <p>Pour recevoir de nouveau un email de validation, il faut attendre 15 minutes.</p>
                    </div>
                </div>
            <?php } ?>
            <ul class="collapsible popout">
                <li<?= isset($_GET['post']) && $_GET['post'] === 'confidentialityChange' ? ' class="active"' : ''; ?>>
                    <div class="collapsible-header">Modifier vos paramètres de confidentiatlités</div>
                    <div class="collapsible-body white">
                        <?php
                        $formConfidentiality = new \App\Views\Form($errors, $router->getFullUrl('pConfidentialityChange') . '?post=confidentialityChange#parameters');
                        $formConfidentiality->addSelect('privateProfile', 'Profil', ['public' => 'Publique', 'private' => 'Privé']);
                        $formConfidentiality->addSubmit();
                        $formConfidentiality->parse();
                        ?>
                    </div>
                </li>
                <li<?= isset($_GET['post']) && $_GET['post'] === 'emailChange' ? ' class="active"' : ''; ?>>
                    <div class="collapsible-header">Modifier votre adresse email</div>
                    <div class="collapsible-body white">
                        <?php
                        $formEmail = new \App\Views\Form($errors, $router->getFullUrl('pEmailChange') . '?post=emailChange#parameters');
                        $formEmail->addField('email', 'Nouvelle adresse email', 'col s12 m6', 'email');
                        $formEmail->addField('reEmail', 'Retapez votre adresse email', 'col s12 m6', 'email');
                        $formEmail->addField('emailFormPassword', 'Tapez votre mot de passe', 'col s12', 'password');
                        $formEmail->addSubmit();
                        $formEmail->parse();
                        ?>
                    </div>
                </li>
                <li<?= isset($_GET['post']) && $_GET['post'] === 'passwordChange' ? ' class="active"' : ''; ?>>
                    <div class="collapsible-header">Modifier son mot de passe</div>
                    <div class="collapsible-body white">
                        <?php
                        $formEmail = new \App\Views\Form($errors, $router->getFullUrl('pPasswordChange') . '?post=passwordChange#parameters');
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
                        $formPhoneNumber = new \App\Views\Form($errors, $router->getFullUrl('pPhoneNumberChange') . '?post=phoneNumberChange#parameters');
                        $formPhoneNumber->addField('phoneNumber', 'Nouveau numéro de téléphone (+33601010101)', 'col s12 m6', 'text', '(\+33)[1-9]([0-9]{2}){4}');
                        $formPhoneNumber->addField('phoneFormPassword', 'Entrez votre mot de passe', 'col s12 m6', 'password');
                        $formPhoneNumber->addSubmit();
                        $formPhoneNumber->parse();
                        ?>
                    </div>
                </li>
                <?php if(!$user->isEmailValidate()) { ?>
                    <li<?= isset($_GET['post']) && $_GET['post'] === 'emailValidation' ? ' class="active"' : ''; ?>>
                        <div class="collapsible-header">Valider son adresse email</div>
                        <div class="collapsible-body white">
                            <?php
                            $formValidateEmail = new \App\Views\Form($errors, $router->getFullUrl('pEmailValidation') . '?post=emailValidation#parameters');
                            $formValidateEmail->addField('emailValidationKey', 'Clé d\'activation (Envoyée par mail)', 'col s12', 'text', '[a-zA-Z0-9]{4}-[a-zA-Z0-9]{4}-[a-zA-Z0-9]{4}-[a-zA-Z0-9]{4}');
                            $formValidateEmail->addHTML('<p><a href="' . $router->getFullUrl('emailKeyGenValidation') . '">Vous n\'avez pas reçu de clé?</a></p>');
                            $formValidateEmail->addSubmit();
                            $formValidateEmail->parse();
                            ?>
                        </div>
                    </li>
                <?php } ?>
                <?php if(!$user->isPhoneNumberValidate()) { ?>
                    <li<?= isset($_GET['post']) && $_GET['post'] === 'phoneNumberValidation' ? ' class="active"' : ''; ?>>
                        <div class="collapsible-header">Valider son numéro de téléphone</div>
                        <div class="collapsible-body white">
                            <p>Votre numéro de téléphone, une fois validé, pourra servir lors de la récupération du compte en cas de perte du mot de passe.</p>
                            <?php
                            $formValidatePhoneNumber = new \App\Views\Form($errors, $router->getFullUrl('pPhoneNumberValidation') . '?post=phoneNumberValidation#parameters');
                            $formValidatePhoneNumber->addField('phoneNumberValidationKey', 'Clé d\'activation (Envoyée par SMS)', 'col s12', 'text', '[a-zA-Z0-9]{5}');
                            $formValidatePhoneNumber->addHTML('<p><a href="' . $router->getFullUrl('phoneNumberKeyGenValidation') . '">Vous n\'avez pas reçu de clé? ( Limité à 1 fois par heure )</a></p>');
                            $formValidatePhoneNumber->addSubmit();
                            $formValidatePhoneNumber->parse();
                            ?>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>
    <?php } ?>
</main>
