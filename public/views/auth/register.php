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
            $form = new \App\Views\Form('pregister', 'POST');
            $form->addField($errors, 'regUsername', 'Nom d\'utilisateur', 'col s12 m8', 'text', '[A-Za-zÂ-ÿ0-9]+');
            $form->addSelect($errors, 'regAccountType', 'Type de compte', [
                '1' => 'Particulier',
                '2' => 'Entreprise',
                '3' => 'Développeur'
            ], 'col s12 m4');
            $form->addField($errors, 'regLastName', 'Nom de famille', 'col s12 m6', 'text', '[A-Za-zÂ-ÿ0-9]+');
            $form->addField($errors, 'regFirstName', 'Prénom', 'col s12 m6', 'text', '[A-Za-zÂ-ÿ0-9]+');
            $form->addField($errors, 'regEmail', 'Adresse email', 'col s12 m6', 'email');
            $form->addField($errors, 'regConfirmEmail', 'Adresse email de confirmation', 'col s12 m6', 'email');
            $form->addField($errors, 'regBirthDay', 'Date de naissance', 'col s12 m4', 'date');
            $form->addField($errors, 'regPhoneNumber', 'Numéro de téléphone ( ex: +33601010101 )', 'col s12 m8', 'text', '(\+33)[1-9]([0-9]{2}){4}');
            $form->addField($errors, 'regPassword', 'Mot de passe', 'col s12 m6', 'password');
            $form->addField($errors, 'regConfirmPassword', 'Mot de passe de confirmation', 'col s12 m6', 'password');
            $form->addCaptcha($errors, $captcha, 'regCaptcha', 'Recopiez le texte de l\'image.');
            $form->addSubmit('S\'inscrire');
            $form->parse();
            ?>
        </div>
    </div>
</main>