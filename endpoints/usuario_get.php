<?php

function api_user_get($request)
{
    $user = wp_get_current_user();
    $user_id = $user->ID;

    if($user_id > 0) {
        // Get User Meta
        $user_meta = get_user_meta($user_id);

        $response = [
            "id" => $user->user_login,
            "nome" => $user->display_name,
            "email" => $user->user_email
        ];
    } else {
        $response = new WP_Error('permissao', 'Usuário não possui permissão', ['status' => 401]);
    }

    return rest_ensure_response($response);
}


function register_api_user_get()
{
    register_rest_route('api', '/usuario', [
        [
            'methods' => WP_REST_Server::READABLE,
            'callback' => 'api_user_get',
        ]
    ]);
}

add_action('rest_api_init', 'register_api_user_get');
