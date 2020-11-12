<footer>
    <div class="container">
        <div class="footer__item">
            <div class="footer__item__email">
                <a href="mailto:">mail@email.com</a>
            </div>
        </div>

        <div class="footer__item">
            <div class="footer__item__logos">
                <div class="footer__item__logos__img">
                    <img src="<?= get_template_directory_uri(); ?>/assets/images/prefeitura_rio.svg" alt="Prefeitura Rio">
                </div>
                <div class="footer__item__logos__img">
                    <img src="<?= get_template_directory_uri(); ?>/assets/images/logo_prorio_branca.svg" alt="Logo Pro Rio">
                </div>
                <div class="footer__item__logos__img">
                    <img src="<?= get_template_directory_uri(); ?>/assets/images/cnca.svg" alt="CNCA">
                </div>
            </div>
        </div>

        <div class="footer__item__links">
            <a href="#">Termos de uso</a>
            <a href="#">Política de privacidade</a>
            <a href="#">Guia de uso</a>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>