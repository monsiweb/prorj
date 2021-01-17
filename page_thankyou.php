<?php /* Template Name: Thank you */ ?>
<?php

if (is_user_logged_in()) {
    $user = wp_get_current_user();
    $user_meta = get_user_meta($user->ID);
} else {
    wp_redirect(get_home_url());
}
?>

<?php get_header(); ?>

<section class="thankyou">
    <div class="container">
        <div class="d-flex justify-content-center">
            <h2 class="title--primary">AGRADECEMOS SUA PARTICIPAÇÃO!</h2>
        </div>

        <div class="thankyou__content">
            <p class="text--primary text-center w-75 mx-auto">Agora você pode acessar seu relatório e saber mais sobre seu consumo de energia, além de receber dicas sobre como reduzir. Por conta da grande variedade de tipos de imóveis, talvez o seu relatório não traga todas as informações e cálculos disponíveis. A prefeitura está trabalhando para aprimorar a cobertura de cada vez mais tipologias.</p>
            <div class="thankyou__buttons">
                <?php
                $dynamic_terms = get_terms('tipos_de_imoveis');  
                $args = array(
                    'numberposts' => '1',
                    'author' => $user->id,
                    'post_type' => 'imoveis',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'categorias',
                            'field'    => 'slug',
                            'terms' => $dynamic_term->name,
                        ),
                    ),
                );
                $recent_posts = wp_get_recent_posts($args);
                if($dynamic_term == 'publico'){
                    foreach ($recent_posts as $recent) {
                        echo '<a href="' . get_permalink($recent["ID"]) . '" class="btn btn--third mb-3">Ver Relatório final</a>';
                    }
                }
                ?>
                <a href="<?= esc_url(get_page_link(59)); ?>" class="btn btn--third mb-3">Voltar</a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>