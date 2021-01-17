<?php

// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');

// Register Plugins
require_once('wp_plugins.php');

// Register Custom
require_once('wp_custom.php');

/*
* Core wordpress functions
*/
require get_template_directory() . '/inc/wordpress.php';

/*
* assets imports
*/
require get_template_directory() . '/inc/assets.php';

/*

require get_template_directory() . '/inc/form-function.php';

/*
* register "imovel" form
*/

require get_template_directory() . '/inc/general.php';

/*
* register "imovel" form
*/

require get_template_directory() . '/inc/form-function.php';


/*
* Export to Excel data
*/

require get_template_directory() . '/inc/excel-data.php';


//
/* New Sidebar */
function my_new_sidebar_widget_init()
{
  register_sidebar(array(
    'name'          => 'Login IDRIO',
    'id'            => 'my_new_sidebar',
    'before_widget' => '<div>',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>',
  ));
}
add_action('widgets_init', 'my_new_sidebar_widget_init');


/* Adding a language class to the body to apply styles individually per language */
add_filter('body_class', 'append_language_class');
function append_language_class($classes)
{
  $classes[] = ICL_LANGUAGE_CODE;  //or however you want to name your class based on the language code
  return $classes;
}
