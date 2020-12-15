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
