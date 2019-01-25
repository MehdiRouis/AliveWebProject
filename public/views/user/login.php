<?php
/**
 * @var array $errors
 */
?>
<main>
    <div class="card">
        <div class="card-content center-align">
            <p class="card-title">Connexion</p>
            <div class="divider"></div>
            <?php
            $form = new \App\Views\Form('plogin', 'POST');
            $form->addField($errors, 'logUsername', 'Nom d\'utilisateur / Adresse mail', 'col s12 m6');
            $form->addField($errors, 'logPassword', 'Mot de passe', 'col s12 m6');
            $form->addSubmit('Se connecter');
            $form->parse();
            ?>
        </div>
    </div>
</main>