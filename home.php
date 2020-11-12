<?php get_header(); ?>

<section class="hero" style="background: url('<?= get_template_directory_uri(); ?>/assets/images/hero_bg.jpg') rgb(0 0 0 / 50%)">
    <div class="container">
        <div class="hero__content">
            <h1 class="hero__content__title">Bom para você, <br /><span>Bom para o Mundo!</span></h1>
            <p class="hero__content__p">Calcule a eficiência energética do seu imóvel e receba dicas de como o consumo.</p>

            <div class="hero__content_btns">
                <a href="" class="btn btn--primary">ME CADASTRAR</a>
                <a href="" class="btn btn--secondary">LOGIN</a>
            </div>
        </div>
    </div>
</section>


<section class="aboutMore">
    <div class="container">
        <div class="aboutMore_title text-center">
            <h2 class="title--primary">Conheça mais</h2>
        </div>
        <div class="row aboutMore__content">
            <div class="col-md-6 aboutMore__content_image">
                <img src="" alt="">
            </div>

            <div class="col-md-6 aboutMore__content__text">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut ero labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                <strong>Precisa de ajuda? Veja o nosso tutorial</strong>
                <a href="" class="btn btn--primary">Guia de uso</a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>