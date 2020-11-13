<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= wp_title('', false); ?></title>
    <?php wp_head(); ?>
</head>

<body>
    <header>
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-4 d-flex justify-content-start align-items-center">
                    <div class="header__menu__item">
                        <a href="#">FAZER LOGIN</a>
                    </div>
                </div>
                <div class="col-md-4 d-flex justify-content-center align-items-center">
                    <div class="header__menu__item">
                        <a href="#"><img src="<?= get_template_directory_uri(); ?>/assets/images/logo_prorio.svg" alt="Logo"></a>
                    </div>
                </div>
                <div class="col-md-4 d-flex justify-content-end align-items-center">
                    <div class="header__menu__item">
                        <a href="#">GUIA DE USO</a>
                    </div>
                </div>
            </div>
        </div>
    </header>