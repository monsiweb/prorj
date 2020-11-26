<?php
// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');

// Register Plugins
require_once('wp_plugins.php');

// Register Custom
require_once('wp_custom.php');

// Remove admin bar
show_admin_bar(false);

// Remove useless WordPress Scripts
function my_deregister_scripts()
{
    wp_deregister_script('wp-embed');
}

add_action('wp_footer', 'my_deregister_scripts');

function modify_jquery()
{
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js', false, '1.11.3');
        wp_enqueue_script('jquery');
    }
}

add_action('init', 'modify_jquery');

// Get menu itens for template
function theme_get_menu_items($menu_name)
{
    if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
        $menu = wp_get_nav_menu_object($locations[$menu_name]);
        return wp_get_nav_menu_items($menu->term_id);
    }
}

function theme_menu($menu_name, $depth = 2, $container = 'div', $container_class = 'collapse navbar-collapse', $menu_class = 'nav navbar-nav')
{
    wp_nav_menu(array(
        'theme_location' => $menu_name,
        'depth' => $depth,
        'container' => $container,
        'container_class' => $container_class,
        'container_id' => $menu_name,
        'menu_class' => $menu_class,
        'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
        'walker' => new wp_bootstrap_navwalker()
    ));
}

function theme_classic_menu($menu_name)
{
    wp_nav_menu(array(
        'theme_location' => $menu_name,
        'depth' => 2,
        'container' => 'div',
        'container_id' => $menu_name,
    ));
}

// Register menu
register_nav_menus(array(
    'main_menu' => 'Menu Institucional',
    'menu_footer' => 'Menu Rodapé',
));



// Theme Settings
if (function_exists('acf_add_options_page')) {
  acf_add_options_page(array(
      'page_title' => 'Configurações Gerais',
      'menu_title' => 'Opções do tema',
      'menu_slug' => 'theme-general-settings',
      'capability' => 'edit_posts',
      'redirect' => false
  ));
}

// Thumbnails
/*
add_theme_support('post-thumbnails');
add_image_size('grid-thumb', 240, 220, true);
*/

//flush_rewrite_rules();