<footer class="page-footer dark-blue">
    <div id="contact" class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col s12 m8">
                    <p>2018 - <?= PROJECT_NAME; ?> - Design by Èsska with <i class="fas fa-heart red-text rem10"></i></p>
                </div>
                <div class="col s12 m4">
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