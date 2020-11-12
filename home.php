<?php get_header(); ?>

<section class="hero" style="background: url('<?= get_template_directory_uri(); ?>/assets/images/hero_bg.jpg') rgb(0 0 0 / 50%) no-repeat; background-size: cover">
    <div class="container">
        <div class="hero__content">
            <h1 class="hero__content__title">Bom para você, <br /><span>Bom para o Mundo!</span></h1>
            <p class="hero__content__p">Calcule a eficiência energética do seu imóvel e receba dicas de como o consumo.</p>

            <div class="hero__content_btns">
                <a href="" class="btn btn--primary">ME CADASTRAR</a>
                <a href="" class="btn btn--secondary" data-toggle="modal" data-target="#loginModal">LOGIN</a>
            </div>
        </div>
    </div>
</section>


<section class="aboutMore">
    <div class="container">
        <div class="aboutMore_title">
            <h2 class="title--primary">Conheça mais</h2>
        </div>
        <div class="row aboutMore__content">
            <div class="col-md-6">
                <div class="aboutMore__content_image">
                    <img src="<?= get_template_directory_uri(); ?>/assets/images/aboutmore_img.jpg" alt="">
                </div>
            </div>

            <div class="col-md-6">
                <div class="aboutMore__content__text">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut ero labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                    <strong>Precisa de ajuda? Veja o nosso tutorial</strong>
                    <a href="" class="btn btn--primary">Guia de uso</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="aboutTool">
    <div class="container">
        <div class="aboutTool__content">
            <strong class="aboutTool__content__strong">
                Como foi feita
                a ferramenta?
            </strong>

            <p class="aboutTool__content__p">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut ero labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco. Ao labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
        </div>
    </div>

</section>


<!-- Modal -->
<!-- Modal Login -->
<div class="modal fade modal__prorio" id="loginModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <a href="#" class="modal__close" data-dismiss="modal">X</a>
            <div class="modal-body modal__login__body">
                <h2 class="modal__title">Faça seu login</h2>
                <p class="modal__p">Você gostaria de fazer login como cidadão carioca ou como servidor público?</p>

                <div class="modal__btn">
                    <a href="#" class="btn btn--third">CIDADÃO</a>
                    <a href="#" class="btn btn--fourth">PREFEITURA</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>