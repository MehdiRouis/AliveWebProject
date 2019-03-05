<?php
/**
 * @var \Models\Projects\Project $project
 */
?>
<main class="container-fluid">
    <div class="row">
        <div class="col s12 m4">
            <div class="card">
                <div class="card-image">
                    <img class="responsive-img" src="<?= $project->getCreatedBy()->getProfileBanner(); ?>" alt="user background" />
                    <p class="card-image-title"><?= $project->getCreatedBy()->getFullName(); ?></p>
                </div>
                <div class="card-content center-align">
                    <p><?= $project->getCreatedBy()->getRank()->getName(); ?></p>
                    <div class="divider mt-20"></div>

                </div>
            </div>
        </div>
        <div class="col s12 m8">
            <div class="card">
                <div class="card-content center-align">
                    <p class="card-title"><?= $project->getTitle(); ?></p>
                    <div class="divider"></div>
                    <p><?= $project->getDescription(); ?></p>
                    <p class="right-align"><span class="left"><?= $project->getCreatedAt(); ?></span><a href="<?= $router->getFullUrl('profile', ['id' => $project->getCreatedBy()->getId()]); ?>"><?= $project->getCreatedBy()->getUserName() . ' - ' . $project->getCreatedBy()->getFullName(); ?></a></p>
                </div>
            </div>
        </div>
    </div>
</main>
