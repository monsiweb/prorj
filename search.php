<?php
/*
Template Name: Search Page
*/
?>

<?php get_header(); ?>

<article class="grid products">
<section class="searchpage">
   <div class="container">
   <?php if (have_posts()) : ?>
      <div class="row">
         <div class="titlebar">
            <div class="custom-bread">
               <ul>
                  <li>
                     <a href="<?php echo get_home_url(); ?>">Home /</a>
                  </li>
                  <li>
                     <a href="">Pesquisa "<?php echo get_search_query() ?>"</a>
                  </li>
               </ul>
            </div>
            <h2>Resultados de pesquisa</h2>
            <p>Você pesquisou por "<span><?php echo get_search_query() ?></span>"</p>
            <h2>Resultados relevantes</h2>
         </div>
      </div>
      <div class="row">
         <?php while (have_posts()) : the_post(); ?>
         <a class="item" href="<?php ECHO get_permalink($post->ID) ?>">
               <img class="img responsive" src="<?php echo wp_get_attachment_url( $product->get_image_id() ); ?>" title="<?php echo get_the_title() ?>" alt="<?php get_the_title() ?>">
               <p class="category">
               <?php
                  $term_obj_list = get_the_terms( $post->ID, 'product_cat' );
                  $terms_string = join(', ', wp_list_pluck($term_obj_list, 'name'));
                  echo $terms_string;
               ?>
               </p>
               <p class="product"><?php the_title() ?></p>
               <ul class="list_colors">
                  <?php 
                        $colors = get_terms( [
                           'taxonomy' => 'pa_color',
                           'hide_empty' => false,
                        ] );

                        foreach($colors as $cc) {
                           $getColor = get_term_meta($cc->term_id);
                           $colorHex = $getColor['pa_color_swatches_id_color'][0];
                           echo '<li class="dot" style="background-color:' .$colorHex. '"></li>';        
                        }     
                  ?>
               </ul>
               <p class="value center"><?php global $product; echo $product->get_price_html(); ?> </p>
            </a>
         <?php endwhile;?>
      </div>
      <?php else:?>
      <div class="titlebar">
         <div class="custom-bread">
            <ul>
               <li>
                  <a href="<?php echo get_home_url(); ?>">Home</a>
               </li>
               <li>
                  <a href="">Pesquisa "<?php echo get_search_query() ?>"</a>
               </li>
            </ul>
         </div>
         <h2>Resultados de pesquisa</h2>
         <p>Você pesquisou por "<span><?php echo get_search_query() ?></span>"</p>
         <h2>Resultados relevantes</h2>
      </div>
      <div class="podcast-cateogrys">
         <div class="listpodcast-category">
            <div class="row">
               <div class="col-sm-12">
                  <h3>Sem resultados encontrados<br> Faça uma nova busca!</h3>
               </div>
            </div>
         </div>
      </div>
   <?php endif;?>
   </div>
</section>
</article>
<?php get_footer();