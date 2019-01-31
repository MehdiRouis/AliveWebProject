<?php
/**
 * @var \Models\Users\User $userProfile
 */
?>
<main class="container">
    <div id="profile-page-header" class="card">
        <div class="card-image waves-effect waves-block waves-light">
            <span class="circle white darken-1 black-text hoverable avatar"><?= $userProfile->getInitialUserName(); ?></span>
            <img class="activator" src="<?= PROJECT_LINK; ?>/public/assets/img/carousel/sky.jpg" alt="user background">
        </div>
        <div class="card-content">
            <div class="row pt-2">
                <div class="col s12 m3 offset-m2">
                    <h4 class="card-title grey-text text-darken-4"><?= $userProfile->getFullName(); ?></h4>
                    <p class="medium-small grey-text">@<?= $userProfile->getUserName(); ?></p>
                </div>
            </div>
        </div>
        <div class="card-reveal">
            <p>
                    <span class="card-title grey-text text-darken-4">Roger Waters
                      <i class="material-icons right">close</i>
                    </span>
                <span>
                      <i class="material-icons cyan-text text-darken-2">perm_identity</i> Project Manager</span>
            </p>
            <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
            <p>
                <i class="material-icons cyan-text text-darken-2">perm_phone_msg</i> +1 (612) 222 8989</p>
            <p>
                <i class="material-icons cyan-text text-darken-2">email</i> mail@domain.com</p>
            <p>
                <i class="material-icons cyan-text text-darken-2">cake</i> 18th June 1990</p>
            <p>
                <i class="material-icons cyan-text text-darken-2">airplanemode_active</i> BAR - AUS</p>
        </div>
    </div>
</main>