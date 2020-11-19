<?php

function api_terms_update($request)
{
    $user = wp_get_current_user();
    $user_id = $user->ID;

    if ($user_id > 0) {
        $term = $request['term'];
        update_user_meta($user_id, 'terms', $term);
        $response = "O termo foi atualizado";

    } else {
            $response = new WP_Error('permissao', 'Sem permissão.', ['status' => 401]);
        }
        return rest_ensure_response($response);
}

function register_api_terms_update()
{
    register_rest_route('api', '/term_update', [
        [
            'methods' => WP_REST_Server::EDITABLE,
            'callback' => 'api_terms_update',
        ]
    ]);
}

add_action('rest_api_init', 'register_api_terms_update');
