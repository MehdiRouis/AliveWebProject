<?php
/**
 * @var array $errors
 * @var string $captcha
 */
?>
<main class="container">
    <div class="card">
        <div class="card-content center-align">
            <p class="card-title">Inscription</p>
            <div class="divider"></div>
            <?php
            $form = new \App\Views\Form($errors, 'pregister', 'POST', false);
            $form->addField('regUsername', 'Nom d\'utilisateur', 'col s12 m8', 'text', '[A-Za-zÂ-ÿ0-9]+');
            $form->addSelect('regAccountType', 'Type de compte', [
                '1' => 'Particulier',
                '2' => 'Entreprise',
                '3' => 'Développeur'
            ], 'col s12 m4');
            $form->addField('regLastName', 'Nom de famille', 'col s12 m6', 'text', '[A-Za-zÂ-ÿ0-9]+');
            $form->addField('regFirstName', 'Prénom', 'col s12 m6', 'text', '[A-Za-zÂ-ÿ0-9]+');
            $form->addField('regEmail', 'Adresse email', 'col s12 m6', 'email');
            $form->addField('regConfirmEmail', 'Adresse email de confirmation', 'col s12 m6', 'email');
            $form->addField('regBirthDay', 'Date de naissance', 'col s12 m4', 'date');
            $form->addField('regPhoneNumber', 'Numéro de téléphone ( ex: +33601010101 )', 'col s12 m8', 'text', '(\+33)[1-9]([0-9]{2}){4}');
            $form->addField('regPassword', 'Mot de passe', 'col s12 m6', 'password');
            $form->addField('regConfirmPassword', 'Mot de passe de confirmation', 'col s12 m6', 'password');
            $form->addCaptcha($captcha, 'regCaptcha');
            $form->addSubmit('S\'inscrire');
            $form->parse();
            ?>
        </div>
    </div>
</main>