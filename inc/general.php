<?php


// Posts

add_action('pre_get_posts', function ($query) {
  // do nothing if this is not a main query or if the user is an admin or editor
  if (!$query->is_main_query || current_user_can('edit_others_posts')) return;

  // limit posts to those the current user authored
  $query->set('author', get_current_user_id());
});


// External

$template_diretorio = get_template_directory();

// API
require_once($template_diretorio . "/endpoints/usuario_post.php");
require_once($template_diretorio . "/endpoints/usuario_get.php");

// Update

function monsi_admin_term_update(){
  $request = $_REQUEST;
  $user = wp_get_current_user();
  $user_id = $user->ID;

  if ($user_id > 0) {
      $term = $request['term'];
      update_user_meta($user_id, 'terms', $term);
  }

  return wp_redirect(get_permalink(15));

}

add_action('admin_post_term_update', 'monsi_admin_term_update');
