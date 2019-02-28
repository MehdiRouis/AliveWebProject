<?php
/**
 * @var \Models\Users\User $user
 */
?>
<main class="container">
    <?php if(isset($_GET['action'])) { ?>
        <div class="card gradient-45deg-green-teal">
            <div class="card-content center-align white-text">
                <p class="card-title">Succès!</p>
                <div class="divider"></div>
                <p>L'action a été réalisée avec succès!</p>
            </div>
        </div>
    <?php } ?>
    <div class="row white-text">
        <div class="col s12 m4">
            <div class="card gradient-45deg-amber-amber">
                <div class="card-content">
                    <p class="card-title">Vous êtes</p>
                    <div class="divider mb-10"></div>
                    <p class="right-align"><?= $user->getRank()->getName(); ?></p>
                </div>
            </div>
        </div>
        <div class="col s12 m4">
            <div class="card gradient-45deg-green-teal">
                <div class="card-content">
                    <p class="card-title">Projets total</p>
                    <div class="divider mb-10"></div>
                    <p class="right-align"><?= $user->countAllProjects(); ?></p>
                </div>
            </div>
        </div>
        <div class="col s12 m4">
            <div class="card gradient-45deg-indigo-light-blue">
                <div class="card-content">
                    <p class="card-title">Projets réalisés</p>
                    <div class="divider mb-10"></div>
                    <p class="right-align"><?= $user->countFinishedProjects(); ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-content center-align">
            <p class="card-title">Vos projets</p>
            <div class="divider"></div>
            <?php if($user->countCreatedProjects() === 0) { ?>
                <p>Nous avons remarqué que vous n'avez crée aucun projet! Vous pouvez en créer un en cliquant <a href="<?= $router->getFullUrl('createProject'); ?>">ici</a>.</p>
            <?php } else { ?>
                <!-- Modal Structure -->
                <div id="deleteModal" class="modal">
                    <div class="modal-content red-text">
                        <h1>Suppression d'un projet</h1>
                        <div class="divider mb-10"></div>
                        <p>Êtes-vous sûr de vouloir supprimer votre projet?</p>
                        <p>La suppression du projet se fera automatiquement après 1 semaine.</p>
                        <p>Si le projet a été modifié, le compteur est remis à 0.</p>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="modal-close waves-effect waves-green btn-flat">Annuler</a>
                        <a id="confirm-delete-project" href="#" class="waves-effect waves-green btn-flat red white-text">Confirmer</a>
                    </div>
                </div>
                <table class="responsive-table">
                    <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Statut</th>
                        <th>Date de création</th>
                        <th>Date de modification</th>
                        <th>Voir</th>
                        <th>Éditer</th>
                        <th>Supprimer</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($user->getAllCreatedProjects() as $project) { /** @var \Models\Projects\Project $project */?>
                        <tr>
                            <td data-label="Titre"><?= $project->getTitle(); ?></td>
                            <td data-label="Statut"><?= $project->getStatus()->getName(); ?></td>
                            <td data-label="Date de création"><?= $project->getCreatedAt(); ?></td>
                            <td data-label="Date de modification"><?= $project->getStatus()->getId() === 5 ? '<a class="btn btn-small orange" href="' . $router->getFullUrl('undoDeleteProject', ['id' => $project->getId()]) . '">Annuler la suppression</a>' : $project->getEditedAt(); ?></td>
                            <td data-label="Voir"><a class="btn btn-small" href="<?= $router->getFullUrl('profileProject', ['id' => $project->getId()]); ?>">Voir</a></td>
                            <td data-label="Éditer"><a class="btn btn-small<?= $project->getStatus()->getId() === 3 || $project->getStatus()->getId() === 5 ? ' disabled' : ''; ?> grey" href="<?= $router->getFullUrl('editProject', ['id' => $project->getId()]); ?>">Éditer</a></td>
                            <td data-label="Supprimer"><a class="btn btn-small delete-project modal-trigger<?= $project->getStatus()->getId() === 5 ? ' disabled' : ''; ?> red" href="#deleteModal" data-link="<?= $router->getFullUrl('deleteProject', ['id' => $project->getId()]); ?>">Supprimer</a></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
        </div>
    </div>
</main>