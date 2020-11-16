<?php /* Template Name: Política de Privacidade */ ?>
<?php get_header(); ?>

<section class="privacy institutional__pages">
    <div class="container">
        
        <?php while ( have_posts() ) : the_post();?>

        <div class="breadcrumb__content">
            <a href="#" class="breadcrumb__link">
                Voltar à home
            </a>
        </div>
        <div class="privacy_title d-flex justify-content-center">
            <h2 class="title--primary"><?php the_title();?></h2>
        </div>
        <div class="row privacy__content institutional__pages__content">
            <div class="col-md-12">
                <div class="text--primary">
                <?php the_content(); ?>
                </div>
            </div>
        </div>

        <?php
            endwhile;
            wp_reset_query();
            the_posts_pagination();
        ?>
    </div>
</section>

<?php get_footer(); ?>

        