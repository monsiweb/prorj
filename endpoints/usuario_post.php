<?php

function api_user_post($request)
{
    // PEGAR CAMPOS
    $email = sanitize_email($request['email']);
    $senha = $request['senha'];

    $user_exists = username_exists($email);
    $email_exists = email_exists($email);

    // VALIDAÇÃO
    if (!$user_exists && !$email_exists) {
        $user_id = wp_create_user($email, $senha, $email);

        $response = [
            'ID' => $user_id,
            'display_name' => 'Teste Nome',
            'first_name' => 'Mateus',
            'role' => 'subscriber'
        ];
        wp_update_user($response);

        update_user_meta($user_id, 'terms', true);
    } else {
        $response = new WP_Error('email', 'E-mail já cadastrado.', ['status' => 403]);
    }

    return rest_ensure_response($response);

}


function register_api_user_post()
{
    register_rest_route('api', '/usuario', [
        [
            'methods' => WP_REST_Server::CREATABLE,
            'callback' => 'api_user_post',
        ]
    ]);
}

add_action('rest_api_init', 'register_api_user_post');
