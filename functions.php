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
        'theme_location'    => $menu_name,
        'depth'             => $depth,
        'container'         => $container,
        'container_class'   => $container_class,
        'container_id'      => $menu_name,
        'menu_class'        => $menu_class,
        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
        'walker'            => new wp_bootstrap_navwalker()
    ));
}

function theme_classic_menu($menu_name)
{
    wp_nav_menu(array(
        'theme_location'    => $menu_name,
        'depth'             => 2,
        'container'         => 'div',
        'container_id'      => $menu_name,
    ));
}

// Register menu
register_nav_menus(array(
    'main_menu' => 'Menu Institucional',
    'menu_footer' => 'Menu Rodapé',
));


// Include styles
function theme_enqueue_styles()
{
    wp_enqueue_style('fonts', 'https://fonts.googleapis.com/css?family=Quicksand:300,400,500,600,700&display=swap', false);
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/css/all.min.css', false);
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css', false);
    wp_enqueue_style('checkbox', 'https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css', false);
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css', false);
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');


// Include scripts
function theme_enqueue_scripts()
{
    wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/javascript/jquery.js', array('jquery'), '1.0', true);
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');


// Theme Settings
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title'     => 'Configurações Gerais',
        'menu_title'    => 'Opções do tema',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'        => false
    ));
}

// Thumbnails
/*
add_theme_support('post-thumbnails');
add_image_size('grid-thumb', 240, 220, true);
*/

//flush_rewrite_rules();

// Posts

add_action('pre_get_posts', function( $query ) {
    // do nothing if this is not a main query or if the user is an admin or editor
    if ( ! $query->is_main_query || current_user_can('edit_others_posts')) return;

    // limit posts to those the current user authored
    $query->set('author', get_current_user_id());
});


// External

$template_diretorio = get_template_directory();

// API
require_once($template_diretorio . "/endpoints/usuario_post.php");
require_once($template_diretorio . "/endpoints/usuario_get.php");

// Update

function monsi_admin_term_update() {
    $request = $_REQUEST;
    $user = wp_get_current_user();
    $user_id = $user->ID;

    if ($user_id > 0) {
        $term = $request['term'];
        update_user_meta($user_id, 'terms', $term);
    }

    return wp_redirect( get_permalink(15));

}

add_action( 'admin_post_term_update', 'monsi_admin_term_update');