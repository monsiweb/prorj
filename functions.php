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
    wp_enqueue_script('scripts', get_template_directory_uri() . '/assets/javascript/scripts.js', array('jquery'), '1.0', true);
}

add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');


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

function monsi_admin_term_update()
{
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

// add Imovel

function monsi_admin_add_imovel()
{
    $request = $_REQUEST;
    $user = wp_get_current_user();
    $user_id = $user->ID;

    if ($user_id > 0) {

        $nome = sanitize_text_field($request['nome_do_imovel']);
        $faixa_de_renda = sanitize_text_field($request['faixa_de_renda']);
        $numeroprocesso = sanitize_text_field($request['numeroprocesso']);
        $iptu = sanitize_text_field($request['iptu']);
        $cliente_light = sanitize_text_field($request['cliente_light']);
        $cep = sanitize_text_field($request['cep']);
        $endereco = sanitize_text_field($request['endereco']);
        $valor_da_ultima_conta = sanitize_text_field($request['valor_da_ultima_conta']);
        $mes_da_conta = sanitize_text_field($request['mes_da_conta']);
        $consumo_total_anual = sanitize_text_field($request['consumo_total_anual']);
        $tarifa_de_energia = sanitize_text_field($request['tarifa_de_energia']);
        $qual_tipo_predominante_de_ar_condicionado = sanitize_text_field($request['qual_tipo_predominante_de_ar_condicionado']);
        $qual_o_tipo_de_iluminacao_predominante = sanitize_text_field($request['qual_o_tipo_de_iluminacao_predominante']);
        $area_total_disponivel_na_coberturatelhados = sanitize_text_field($request['area_total_disponivel_na_coberturatelhados']);

        $qual_o_tipo_de_uso_de_imovel = sanitize_text_field($request['qual_o_tipo_de_uso_de_imovel']);
        $possui_paineis_fotovoltaicos = sanitize_text_field($request['possui_paineis_fotovoltaicos']);
        $tipoimovel = sanitize_text_field($request['qual_o_tipo_de_imovel']);
        $voluntario_autovistoria = sanitize_text_field($request['voluntario_autovistoria']);

        $area_total_disponivel_na_coberturatelhados = sanitize_text_field($request['area_total_disponivel_na_coberturatelhados']);
        $possui_paineis_solares_para_aquecimento_de_agua = sanitize_text_field($request['possui_paineis_solares_para_aquecimento_de_agua']);
        $qual_o_tipo_de_iluminacao_predominante = sanitize_text_field($request['qual_o_tipo_de_iluminacao_predominante']);
        $idade_media_dos_equipamentos_de_ar_condicionado = sanitize_text_field($request['idade_media_dos_equipamentos_de_ar_condicionado']);
        $nao_possuo_ar = sanitize_text_field($request['nao_possuo_ar']);
        $tipoimovel = trim($request['tipoimovel']);


        $response = array(
            'post_author' => $user_id,
            'post_type' => 'imoveis',
            'post_title' => $nome,
            'post_status' => 'publish',
            'tax_input'    => array($tipoimovel),
            'meta_input' => array(
                'tipoimovel' => $tipoimovel,
                'nome_do_imovel' => $nome,
                'o_preenchimento_e_voluntario_ou_autovistoria' => $voluntario_autovistoria,
                'numero_do_processo' => $numeroprocesso,
                'iptu' => $iptu,
                'cep' => $cep,
                'endereco' => $endereco,
                'cliente_light' => $cliente_light,
                'faixa_de_renda' => $faixa_de_renda,
                'qual_o_tipo_da_residencia' => '',
                'area_total' => '',
                'e_misto_comercial_+_residencial' => '',
                'qual_o_tipo_de_uso_de_imovel' => $qual_o_tipo_de_uso_de_imovel,
                'valor_da_ultima_conta' => $valor_da_ultima_conta,
                'mes_da_conta' => $mes_da_conta,
                'consumo_total_anual' => $consumo_total_anual,
                'tarifa_de_energia' => $tarifa_de_energia,
                'qual_tipo_predominante_de_ar_condicionado' => $qual_tipo_predominante_de_ar_condicionado,
                'idade_media_dos_equipamentos_de_ar_condicionado' => $idade_media_dos_equipamentos_de_ar_condicionado,
                'nao_possuo_ar' => $nao_possuo_ar,
                'qual_o_tipo_de_iluminacao_predominante' => $qual_o_tipo_de_iluminacao_predominante,
                'possui_paineis_fotovoltaicos' => $possui_paineis_fotovoltaicos,
                'possui_paineis_solares_para_aquecimento_de_agua' => $possui_paineis_solares_para_aquecimento_de_agua,
                'area_total_disponivel_na_coberturatelhados' => $area_total_disponivel_na_coberturatelhados,
            ),
        );

        var_dump($request);
        $post_id = wp_insert_post($response);
        wp_set_post_terms($post_id, $tipoimovel, 'tipos_de_imoveis');
    }
}

add_action('admin_post_add_imovel', 'monsi_admin_add_imovel');
