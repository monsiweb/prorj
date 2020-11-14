<?php
   /* Template name: Homepage */
   ?>

<?php get_header(); ?>

<section class="hero" style="background: url('<?php the_field('background_hero') ?>') rgb(0 0 0 / 50%) no-repeat; background-size: cover ">
    <div class="container">
        <div class="hero__content">
            <h1 class="hero__content__title"><?php the_field('title_hero');?></h1>
            <p class="hero__content__p"><?php the_field('subtitle_hero');?></p>

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
                    <img src="<?php the_field('image_aboutmore');?>" alt="Conheça mais">
                </div>
            </div>

            <div class="col-md-6">
                <div class="aboutMore__content__text">
                    <p><?php the_field('description_aboutmore');?></p>
                    <strong>Precisa de ajuda? Veja o nosso tutorial</strong>
                    <?php
                      $button_more = get_field('button_aboutmore');
                      if($button_more ):
                        $link_url = $button_more['url'];
                        $link_title = $button_more['title'];
                        $link_target = $button_more['target'] ? $button_more['target'] : '_self';
                      ?>
                        <a class="btn btn--primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    <?php endif; ?>
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
          <p class="aboutTool__content__p"><?php the_field('description_abouttool');?></p>
          <?php
            $button_tool = get_field('button_aboutmore');
            if($button_tool ):
              $link_url = $button_tool['url'];
              $link_title = $button_tool['title'];
              $link_target = $button_tool['target'] ? $button_tool['target'] : '_self';
            ?>
              <a class="btn btn--secondary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
          <?php endif; ?>
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