<?php /* Template Name: FAQ */ ?>
<?php get_header(); ?>

<section class="faq institutional__pages">
    <div class="container">
        <div class="breadcrumb__content">
            <a href="#" class="breadcrumb__link">
                Voltar à home
            </a>
        </div>
        <div class="privacy_title d-block">
            <h2 class="title--primary d-block text-center">FAQ</h2>
            <p class="text-left"><?php the_field('description_page');?></p>
        </div>
        <div class="row">
           
        </div>
    </div>
</section>
<section class="faq-items">
    <div class="container">
        <?php $y = 0;  while ( have_posts() ) : the_post(); ?>
            <?php  if( have_rows('questions_group') ): ?>
                <?php while( have_rows('questions_group') ): the_row(); ?>
                    <div class="questions-group">
                        <h2 class="title__questions-group"><?php the_sub_field('title_group_questions');?></h2>
                        <?php if( have_rows('question_repeater')): ?>
                            <?php
                            while( have_rows('question_repeater')):the_row();?> 
                                <div class="item-faq collapsed" type="button" data-toggle="collapse" data-target="#faq<?php echo $y; ?>">
                                    <h4><?php the_sub_field('title_faq'); ?></h4> 
                                    <i class="fa fa-chevron-up"></i> 
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                                <div class="content-faq">
                                    <div id="faq<?php echo $y; ?>" class="collapse">
                                        <p><?php the_sub_field('description_questions'); ?></p>
                                    </div>
                                </div>
                            <?php 
                            $y++;
                            endwhile;?>
                        <?php endif;?>
                    </div>
                <?php endwhile;?>
            <?php endif; ?>
        <?php endwhile; ?>
    </div>
</section>
<?php get_footer(); ?>