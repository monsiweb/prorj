<?php


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
    wp_enqueue_script('jquery-wizard', get_template_directory_uri() . '/assets/javascript/jquery.steps.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('charts', 'https://www.gstatic.com/charts/loader.js', array('jquery'), '1.0', true);
    wp_enqueue_script('scripts', get_template_directory_uri() . '/assets/javascript/scripts.js', array('jquery'), '1.0', true);
}

add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');
