<?php
/**
 * Copyright (c) 2019. Tous droit réservé.
 */

/**
 * Created by PhpStorm.
 * User: esska
 * Date: 08/02/19
 * Time: 10:23
 */

/**
 * @var string $captcha
 * @var array $errors
 * @var int $userId
 */
?>
<main class="container">
    <?php if(isset($_GET['success']) && $_GET['success'] === 'generationEmail') { ?>
        <div class="card gradient-45deg-green-teal">
            <div class="card-content white-text center-align">
                <p class="card-title">Mise à jour effectuée</p>
                <div class="divider"></div>
                <p>Votre clé vous a été envoyé par email.</p>
            </div>
        </div>
    <?php } ?>
    <?php if(isset($_GET['success']) && $_GET['success'] === 'generationSMS') { ?>
        <div class="card gradient-45deg-green-teal">
            <div class="card-content white-text center-align">
                <p class="card-title">Mise à jour effectuée</p>
                <div class="divider"></div>
                <p>Votre clé vous a été envoyé par SMS.</p>
            </div>
        </div>
    <?php } ?>
    <div class="card">
        <div class="card-content">
            <p class="card-title">Validation du changement de mot de passe</p>
            <div class="divider"></div>
            <p>Pour valider le changement de mot de passe, il vous faut la clé reçue par SMS / Email.</p>
            <?php
            $form = new \App\Views\Form($errors, 'pValidationLostPassword', 'POST', false);
            $form->addField('code', 'Clé reçue par email / SMS');
            $form->addField('newPassword', 'Nouveau mot de passe', 'col s12 m6', 'password');
            $form->addField('reNewPassword', 'Retapez de nouveau le mot de passe', 'col s12 m6', 'password');
            $form->addHiddenValue('userId', $userId);
            $form->addCaptcha($captcha, 'captcha');
            $form->addSubmit();
            $form->parse();
            ?>
        </div>
    </div>
</main>