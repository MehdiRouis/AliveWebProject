<?php
/**
 * @var array $errors
 * @var \Models\Users\User $user
 */
?>
<main class="container">
    <div class="card gradient-45deg-light-blue-indigo">
        <div class="card-content center-align">
            <p class="card-title">Créer un projet</p>
            <div class="divider"></div>
            <p>Vous pouvez proposer votre projet en remplissant ce formulaire. Le projet sera modéré par notre équipe.<br />
                Lorsque votre projet sera validé, nos gestionnaires s'occuperont de vous assigner des développeurs.<br />
                Afin d'assurer la réalisation de votre projet, les développeurs sélectionnés sont testés et mit à l'épreuve.</p>
            <?php
            $form = new \App\Views\Form('pcreateproject');
            $form->addField($errors, 'projectTitle', 'Titre du projet', 'col s12', 'text', '[a-zA-ZÂ-ÿ \-!0-9]+');
            $form->addTextarea($errors, 'projectDescription', 'Description du projet');
            $form->addSecurityToken('CSRFToken', $user->getCSRFToken());
            $form->addSubmit();
            $form->parse();
            ?>
        </div>
    </div>
</main>