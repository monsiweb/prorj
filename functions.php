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

* register "imovel" form
*/

require get_template_directory() . '/inc/general.php';

/*
* register "imovel" form

*/
require get_template_directory() . '/inc/form-function.php';


