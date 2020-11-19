<?php /* Template Name: Imóveis */ ?>
<?php

if (is_user_logged_in()) {
    $user = wp_get_current_user();
    $user_meta = get_user_meta($user->ID);
    $terms = $user_meta['terms'][0];

    if ($terms == 1) {
        wp_redirect(get_permalink(15));
    }
}

?>

<?php get_header(); ?>

<section class="terms">
    <div class="container">
        <div class="terms__title">
            <h2 class="title--primary">Aceito os termos e condições</h2>
        </div>

        <div class="terms_content">
            <p class="text--primary">Seja bem vindo! Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi porttitor elit sit amet interdum dapibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi porttitor elit sit amet interdum dapibus. </p>
            <form action="<?php echo site_url() . '/wp-admin/admin-post.php'; ?>" method="POST">
                <input type="hidden" name="action" value="term_update">
                <div class="checkbox__input">
                    <div class="pretty p-default p-thick p-smooth">
                        <input type="checkbox"  name="term" />
                        <div class="state p-warning-o">
                            <label>Aceito os <a href="#" class="link--primary">termos de uso</a></label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn--third float-right">AVANÇAR</button>
            </form>
        </div>
    </div>
</section>

<?php get_footer(); ?>