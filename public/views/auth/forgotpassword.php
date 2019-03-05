<?php
/**
 * Copyright (c) 2019. Tous droit réservé.
 */

/**
 * Created by PhpStorm.
 * User: esska
 * Date: 08/02/19
 * Time: 07:48
 */

/**
 * @var array $errors
 * @var string $captcha
 */
?>
<main class="container-fluid">
    <div class="card">
        <div class="card-content">
            <p class="card-title">Mot de passe oublié</p>
            <div class="divider"></div>
            <p>Afin de pouvoir changer de mot de passe, il vous faut valider votre identité par email / SMS.</p>
            <p>Pour vérifier votre identité par SMS, il faut avoir validé au préalable votre numéro de téléphone dans vos paramètres.</p>
            <?php
            $formForgotPassword = new \App\Views\Form($errors, 'pForgotPassword', 'POST', false);
            $formForgotPassword->addField('user', 'Adresse email / Nom d\'utilisateur', 'col s12 m8');
            $formForgotPassword->addSelect('type', 'Type de vérification', [
                'email' => 'Email',
                'sms' => 'SMS'
            ],  'col s12 m4');
            $formForgotPassword->addCaptcha($captcha, 'captcha');
            $formForgotPassword->addSubmit();
            $formForgotPassword->parse();
            ?>
        </div>
    </div>
</main>