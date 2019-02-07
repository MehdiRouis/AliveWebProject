<?php
/**
 * @var array $errors
 * @var \Models\Users\User $user
 * @var string $captcha
 */
?>
<main class="container">
    <div class="card gradient-45deg-light-blue-indigo">
        <div class="card-content center-align">
            <p class="card-title">Créer un projet</p>

            <?php
            ?>
            <div class="divider"></div>
            <p>Vous pouvez proposer votre projet en remplissant ce formulaire. Le projet sera modéré par notre équipe.<br />
                Lorsque votre projet sera validé, nos gestionnaires s'occuperont de vous assigner des développeurs.<br />
                Afin d'assurer la réalisation de votre projet, les développeurs sélectionnés sont testés et mit à l'épreuve.</p>
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