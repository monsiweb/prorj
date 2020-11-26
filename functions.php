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

//require get_template_directory() . '/inc/form-function.php';

/*
* register "imovel" form
*/

require get_template_directory() . '/inc/general.php';


/* Teste */


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
        wp_set_post_terms( $post_id, $tipoimovel, 'tipos_de_imoveis' );
    }
}

add_action('admin_post_add_imovel', 'monsi_admin_add_imovel');