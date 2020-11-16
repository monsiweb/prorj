<?php get_header(); ?>

<section id="page" class="default-style">
    <div class="container">
        <?php
            while ( have_posts() ) : the_post();
        ?>

        <article>
            <?php the_content(); ?>
        </article>

        <?php
            endwhile;
            wp_reset_query();
            the_posts_pagination();
        ?>
    </div>
</section>

<?php get_footer();