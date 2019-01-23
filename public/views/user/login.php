<main>
    <div class="card">
        <div class="card-content center-align">
            <p class="card-title">Connexion</p>
            <div class="divider"></div>
            <form action="<?= $router->getFullUrl('plogin') ?>" method="POST" class="row">
                <div class="input-field col s12 m6">
                    <input id="logUsername" name="logUsername" type="text" class="validate" />
                    <label for="logUsername">Nom d'utilisateur / Adresse mail</label>
                </div>
                <div class="input-field col s12 m6">
                    <input id="logPassword" name="logPassword" type="password" class="validate" />
                    <label for="logPassword">Mot de passe</label>
                </div>
                <button type="submit" class="btn btn-large">Se connecter</button>
            </form>
        </div>
    </div>
</main>