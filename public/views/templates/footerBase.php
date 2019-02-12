<?php
/**
 * @var array $scripts
 */
?>
<footer id="footer" class="page-footer dark-blue">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <p class="white-text rem20">Nous contacter</p>
                <p class="grey-text text-lighten-4"></p>
            </div>
            <div class="col l4 offset-l2 s12">
                <p class="white-text rem20">Liens</p>
                <ul>
                    <li><a class="grey-text text-lighten-3" href="<?= $router->getFullUrl('legalNotice'); ?>">Mentions légales</a></li>
                    <li><a class="grey-text text-lighten-3" href="<?= $router->getFullUrl('privacyPolicy'); ?>">Politiques de confidentialités</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col s12 m6">
                    <p>|2018-2019| - <?= PROJECT_NAME; ?> - Design by Èsska with <i class="fas fa-heart red-text rem10"></i></p>
                </div>
                <div class="col s12 m6">
                    <p><a class="rem13 right" target="_blank" href="https://www.facebook.com/AliveWebProject/"><i class="fab fa-facebook-square white-text footerIcon"></i></a></p>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="<?= PROJECT_LINK; ?>/public/assets/import/jQuery/jquery-3.3.1.min.js"></script>
<script src="<?= PROJECT_LINK; ?>/public/assets/import/Materialize/js/materialize.min.js"></script>
<script src="<?= PROJECT_LINK; ?>/public/assets/import/SweetAlert/sweetalert.min.js"></script>
<script src="<?= PROJECT_LINK; ?>/public/assets/js/core.js"></script>
<?php foreach($scripts as $script) { ?>
    <script src="<?= PROJECT_LINK; ?>/public/assets/<?= $script; ?>"></script>
<?php } ?>
</body>
</html>