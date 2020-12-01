<?php
/* Template Name: Painel */

if (is_user_logged_in()) {
    global $current_user;
    $terms = get_user_meta($current_user->ID, 'terms', true);

    if (! $terms == 1 || ! $terms == 'on') {
       wp_redirect(get_permalink(8));
    }
}

?>

<!-- Single page functions -->
<?php

// TOTAL HORA ANO


?>
<!-- Single page fim -->

<?php get_header(); ?>
<!-- DEBUG-->

<?php
var_dump([

]);
?>


<section class="hero-single">
  <div class="container">
    <h1 class="title--primary text-center">Ficha técnica</h1>
    <h2 class="subtitle--herosingle"><?php the_title();?></h2>
    <span class="text--herosingle">Área total:  m²</span>
    <span class="text--herosingle">Consumo total: kWh/ano</span>


  </div>
</section>

<?php get_footer(); ?>