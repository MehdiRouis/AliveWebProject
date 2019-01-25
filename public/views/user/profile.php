<?php
/**
 * @var \Models\Users\User $userProfile
 */
?>
<main class="container">
    <div class="card">
        <div class="card-content">
            <p class="card-title"><?= $userProfile->getUserName(); ?></p>
            <div class="divider"></div>
            <div class="row">
                <div class="col s12 m3">
                    <?= $userProfile->getFullName(); ?>
                </div>
                <div class="col s12 m3">
                    <?= $userProfile->getEmail(); ?>
                </div>
                <div class="col s12 m3">
                    <?= $userProfile->getRank()->getName(); ?>
                </div>
                <div class="col s12 m3">
                    <?= $userProfile->getShopPoints(); ?>
                </div>
            </div>
        </div>
    </div>
</main>