<?php
/**
 * @var array $errors
 * @var \Models\Users\User $user
 * @var \Models\Projects\Project $project
 */
?>
<main class="container">
    <div class="card">
        <div class="card-content center-align">
            <p class="card-title">Modifier un projet</p>
            <div class="divider"></div>
            <p>Ce formulaire est présent afin de pouvoir modifier votre projet.</p>
            <form class="row" method="POST" action="<?= $router->getFullUrl('peditproject') ?>">
                <?php if(isset($errors['global'])) { ?>
                <p class="helper-text red-text center-align"><?= $errors['global']; ?></p>
                <?php } ?>
                <input id="CSRFToken" name="CSRFToken" type="hidden" value="<?= $user->getCSRFToken(); ?>" />
                <input id="projectId" name="projectId" type="hidden" value="<?= $project->getId(); ?>" />
                <div class="input-field col s12">
                    <input id="projectTitle" name="projectTitle" type="text" value="<?= isset($_POST['projectTitle']) ? $_POST['projectTitle'] : $project->getTitle(); ?>" class="validate" />
                    <label for="projectTitle">Titre du projet</label>
                    <?php if(isset($errors['projectTitle'])) { ?>
                    <p class="helper-text red-text"><?= $errors['projectTitle']; ?></p>
                    <?php } ?>
                </div>
                <div class="input-field col s12">
                    <textarea id="projectDescription" name="projectDescription" class="materialize-textarea validate" placeholder="Description du projet"><?= isset($_POST['projectDescription']) ? $_POST['projectDescription'] : $project->getDescription(); ?></textarea>
                    <label for="projectDescription">Description du projet</label>
                    <?php if(isset($errors['projectDescription'])) { ?>
                    <p class="helper-text red-text"><?= $errors['projectDescription'] ?></p>
                    <?php } ?>
                </div>
                <button type="submit" class="btn btn-large">Envoyer</button>
            </form>
        </div>
    </div>
</main>