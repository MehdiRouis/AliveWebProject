<?php
/**
 * @var array $errors
 * @var \Models\Users\User $user
 * @var string $captcha
 */
?>
<main class="container">
    <div class="card">
        <div class="card-content center-align">
            <p class="card-title">Créer un projet</p>
            <div class="divider"></div>
            <p>Vous pouvez proposer votre projet en remplissant ce formulaire.</p>
            <p>Le projet sera validé par notre équipe de modération une fois vérifié.</p>
            <p>Une fois le projet validé, les développeurs intéressés vous seront listés.</p>
            <?php
            $form = new \App\Views\Form($errors, 'pcreateproject', 'POST');
            $form->addField('projectTitle', 'Titre du projet', 'col s12', 'text', '[a-zA-ZÂ-ÿ \-\!\:\.\'\"0-9]+');
            $form->addTextarea('projectDescription', 'Description du projet', false, '[a-zA-ZÂ-ÿ \-\!\$\€\:\(\)\.\'\"\,\*\+\=\@\=\+\?\;0-9]+');
            $form->addSubmit();
            $form->parse();
            ?>
        </div>
    </div>
</main>