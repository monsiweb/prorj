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
            <h2 class="title--primary">Obrigado pela participação!</h2>
        </div>

        <div class="thankyou__content">
            <p class="text--primary text-center w-75 mx-auto">Seja bem vindo! Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi porttitor elit sit amet interdum dapibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi porttitor elit sit amet interdum dapibus. </p>
            <div class="thankyou__buttons">
                <?php
                $args = array(
                    'numberposts' => '1',
                    'author' => $user->id,
                    'post_type' => 'imoveis'
                );
                $recent_posts = wp_get_recent_posts($args);
                foreach ($recent_posts as $recent) {
                    echo '<a href="' . get_permalink($recent["ID"]) . '" class="btn btn--third mb-3">Ver Relatório final</a>';
                }
                ?>
                <a href="#" class="btn btn--fourth">Voltar</a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>