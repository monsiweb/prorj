<?php


/**
 * Register meta boxes.
 */
function hcf_register_meta_boxes()
{
    add_meta_box('hcf-1', __('Resultados', 'hcf'), 'hcf_display_callback', 'imoveis');
}
add_action('add_meta_boxes', 'hcf_register_meta_boxes');


/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function hcf_display_callback($post)
{
    include plugin_dir_path(__FILE__) . './results.php';
}


/**
 * Save meta box content.
 *
 * @param int $post_id Post ID
 */
function hcf_save_meta_box($post_id)
{
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if ($parent_id = wp_is_post_revision($post_id)) {
        $post_id = $parent_id;
    }
    $fields = [
        'hcf_consumo_total_ano',
        'hcf_consumo_medio',
        'hcf_consumo_min_tipologia',
        'hcf_consumo_max_tipologia'
    ];
    foreach ($fields as $field) {
        if (array_key_exists($field, $_POST)) {
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        }
    }
}
add_action('save_post', 'hcf_save_meta_box');
