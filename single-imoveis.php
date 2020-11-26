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

<?php get_header(); ?>
<section class="hero-single">
  <div class="container">
    <h1 class="title--primary text-center">Ficha técnica</h1>
    <h2 class="subtitle--herosingle"><?php the_title();?></h2>
    <span class="text--herosingle">Área total: <?php the_field('area_total');?> m²</span>
    <span class="text--herosingle">Consumo total: <?php the_field('consumo_total_anual');?> kWh/ano</span>
    <?php
      $areatotal = get_field('area_total');
      $consumototal = get_field('consumo_total_anual');

      $soma = $consumototal / $areatotal;
      echo "seu consumo por m² é: " . $soma;
    ?>
  </div>
</section>

<?php get_footer(); ?>