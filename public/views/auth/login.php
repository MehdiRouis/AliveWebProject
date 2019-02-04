<?php
/**
 * @var array $errors
 */
?>
<main class="container">
    <div class="card">
        <div class="card-content center-align">
            <p class="card-title">Connexion</p>
            <div class="divider"></div>
            <?php
            $form = new \App\Views\Form($errors, 'plogin', 'POST');
            $form->addField('logUsername', 'Nom d\'utilisateur / Adresse mail', 'col s12 m6');
            $form->addField('logPassword', 'Mot de passe', 'col s12 m6', 'password');
            $form->addSubmit('Se connecter');
            $form->parse();
            ?>
        </div>
    </div>
</main>