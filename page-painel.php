<?php
/* Template Name: Painel */

if (is_user_logged_in()) {
    global $current_user;
    $terms = get_user_meta($current_user->ID, 'terms', true);

    if (! $terms == 1 || ! $terms == 'on') {
        wp_redirect(get_permalink(57));
    }
} else {
    wp_redirect(get_home_url());
}


?>

<?php get_header(); ?>

    <section class="panel">
        <div class="container">
            <div class="panel__title">
                <h1 class="title--primary">Imóveis preenchidos</h1>
                <p class="text--primary">Seja bem vindo! Lorem ipsum dolor sit amet, consectetur
                    adipiscing elit. Morbi porttitor elit sit amet interdum dapibus.
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Morbi porttitor elit sit amet interdum dapibus. </p>
            </div>

            <div class="panel__items">
                <div class="panel__items__control">
                    <div class="panel__items_control__add">
                        <a href="#" class="btn btn--five">
                            <img src="<?= get_template_directory_uri(); ?>/assets/images/plus.svg" alt="">
                            NOVO IMÓVEL
                        </a>
                    </div>

                    <div class="panel__items__control__search">
                        <strong>Buscar imóvel:</strong>
                        <div class="panel__items_control__search__input">
                            <input type="text">
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-wrap justify-content-center">
                <?php

                $query_args = array(
                    'post_type' => 'imoveis',
                    'post_status' => 'publish',
                    'order' => 'ASC',
                );

                // The Query
                $the_query = new WP_Query( $query_args );

                // The Loop
                if ( $the_query->have_posts() ) {
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post();
                        ?>
                        <div class="panel__items__list">
                            <div class="card__item">
                                <div class="card__item__img">
                                    <img src="<?= get_template_directory_uri(); ?>/assets/images/item_icon.svg" alt="">
                                </div>

                                <div class="card__item__text">
                                    <?php
                                    $term_obj_list = get_the_terms( $post->ID, 'tipos_de_imoveis' );
                                    if(!empty($term_obj_list)){
                                        $terms_string = join(', ', wp_list_pluck($term_obj_list, 'name'));
                                        $post_date = get_the_date( 'd.m.Y' );
                                        echo $terms_string . '<span class="date">' . $post_date . '</span>';
                                    }
                                    ?>
                                </div>

                                <div class="card__item__name">
                                    <p><?php the_title();?></p>
                                </div>
                            </div>
                        </div>

                        <?php
                    }
                    /* Restore original Post Data */
                    wp_reset_postdata();
                } else {
                    ?>
                    <div class="panel__noItems alert alert-warning text-center" role="alert">
                        Não existem imóveis cadastrados
                    </div>
                    <?php
                }

                ?>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>