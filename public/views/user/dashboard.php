<?php
/**
 * @var \Models\Users\User $user
 */
?>
<main class="container">
    <div class="row">
        <div class="col s12 m3">
            <div class="card gradient-45deg-amber-amber white-text">
                <div class="card-content">
                    <p class="card-title">Vous êtes</p>
                    <div class="divider mb-10"></div>
                    <p class="right-align"><?= $user->getRank()->getName(); ?></p>
                </div>
            </div>
        </div>
        <div class="col s12 m3">
            <div class="card gradient-45deg-green-teal">
                <div class="card-content">
                    <p class="card-title"></p>
                    <div class="divider"></div>
                    <p></p>
                </div>
            </div>
        </div>
        <div class="col s12 m3">
            <div class="card gradient-45deg-indigo-light-blue">
                <div class="card-content">
                    <p class="card-title"></p>
                    <div class="divider"></div>
                    <p></p>
                </div>
            </div>
        </div>
        <div class="col s12 m3">
            <div class="card gradient-45deg-purple-deep-orange">
                <div class="card-content">
                    <p class="card-title"></p>
                    <div class="divider"></div>
                    <p></p>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-content">
            <p class="card-title">Bienvenue <?= $user->getFullName(); ?></p>
            <div class="divider"></div>
            <?php if($user->countCreatedProjects() === 0) { ?>
                <p>Nous avons remarqué que vous n'avez crée aucun projet! Vous pouvez en créer un en cliquant <a href="<?= $router->getFullUrl('createProject'); ?>">ici</a>.</p>
            <?php } else { ?>
                <table>
                    <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Statut</th>
                        <th>Date de création</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($user->getAllCreatedProjects() as $project) { /** @var \Models\Projects\Project $project */?>
                        <tr>
                            <td><?= $project->getTitle(); ?></td>
                            <td><?= $project->getStatus()->getName(); ?></td>
                            <td><?= $project->getCreatedAt(); ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
        </div>
    </div>
</main>