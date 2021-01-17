<?php


// add Imovel

function monsi_admin_add_imovel()
{
    $request = $_REQUEST;
    $user = wp_get_current_user();
    $user_id = $user->ID;

    if ($user_id > 0) {

        $name_of_property = sanitize_text_field($request['name_of_property']);
        $type_public_property = sanitize_text_field($request['type_public_property']);
        $voluntary_self_inspection = sanitize_text_field($request['voluntary_self_inspection']);
        $process_number = sanitize_text_field($request['process_number']);
        $type_of_property = trim($request['type_of_property']);
        $iptu = sanitize_text_field($request['iptu']);
        $cep = sanitize_text_field($request['cep']);
        $address = sanitize_text_field($request['address']);
        $client_light = sanitize_text_field($request['client_light']);
        $income_range = sanitize_text_field($request['income_range']);
        $which_residence_type = sanitize_text_field($request['which_residence_type']);
        $total_area = sanitize_text_field($request['total_area']);
        $mixed_type_property = sanitize_text_field($request['mixed_type_property']);
        $total_place_area = sanitize_text_field($request['total_place_area']);
        $total_conditioned_area = sanitize_text_field($request['total_conditioned_area']);
        $number_of_floors = sanitize_text_field($request['number_of_floors']);
        $occupants_useful_day = sanitize_text_field($request['occupants_useful_day']);
        $working_hours = sanitize_text_field($request['working_hours']);
        $percentage_occupancy = sanitize_text_field($request['percentage_occupancy']);
        $what_property_use = sanitize_text_field($request['what_property_use']);
        $value_last_account = sanitize_text_field($request['value_last_account']);
        $account_month = sanitize_text_field($request['account_month_a1']);
        $total_annual_consumption = sanitize_text_field($request['total_annual_consumption']);
        $energy_tariff = sanitize_text_field($request['energy_tariff']);
        $consumption_data = sanitize_text_field($request['consumption_data']);
        $total_consumption_value = sanitize_text_field($request['total_consumption_value']);
        $last_energy_bill = sanitize_text_field($request['last_energy_bill']);
        $hired_demand = sanitize_text_field($request['hired_demand']);
        $rush_hour_consumption = sanitize_text_field($request['rush_hour_consumption']);
        $off_time_consumption = sanitize_text_field($request['off_time_consumption']);
        $last_account_value = sanitize_text_field($request['last_account_value']);
        $month_of_invoice = sanitize_text_field($request['month_of_invoice']);
        $predominant_air_conditioning = sanitize_text_field($request['predominant_air_conditioning']);
        $predominant_air_conditioning_two = sanitize_text_field($request['predominant_air_conditioning_two']);
        $predominant_air_conditioning_three = sanitize_text_field($request['predominant_air_conditioning_three']);
        $air_age_equipment = sanitize_text_field($request['air_age_equipment']);
        $automation_system = sanitize_text_field($request['automation_system']);
        $on_off_system = sanitize_text_field($request['on_off_system']);
        $temperature_control = sanitize_text_field($request['temperature_control']);
        $do_not_have = sanitize_text_field($request['do_not_have']);
        $predominant_type_illumination = sanitize_text_field($request['predominant_type_illumination']);
        $has_photovoltaic_panels = sanitize_text_field($request['has_photovoltaic_panels']);
        $panels_water_heating = sanitize_text_field($request['panels_water_heating']);
        $available_on_rooftops = sanitize_text_field($request['available_on_rooftops']);
        $typelang = sanitize_text_field($request['typelang']);

        // Extra

        $light_automation = sanitize_text_field($request['light_automation']);

        // Extra passo 3, residencial

        $area_comum_total =  sanitize_text_field($request['area_comum_total']);
        $area_privativa_total =  sanitize_text_field($request['area_privativa_total']);
        $n_unidades_pv_residenciais =  sanitize_text_field($request['n_unidades_pv_residenciais']);
        $area_media_unidades_pv =  sanitize_text_field($request['area_media_unidades_pv']);
        $quantos_andares_tem =  sanitize_text_field($request['quantos_andares_tem']);
        $area_comercial_total =  sanitize_text_field($request['area_comercial_total']);
        $n_unidades_pv_comerciais =  sanitize_text_field($request['n_unidades_pv_comerciais']);
        $am_unidades_pv_comerciais =  sanitize_text_field($request['am_unidades_pv_comerciais']);

        // Extra passo 3, residencial (consumo de energia)
        
        $consumo_areas_comuns =  sanitize_text_field($request['consumo_areas_comuns']);
        $consumo_estimado_areas_comerciais =  sanitize_text_field($request['consumo_estimado_areas_comerciais']);
        $consumo_estimado_areas_pv_residenciais =  sanitize_text_field($request['consumo_estimado_areas_pv_residenciais']);
        $valor_ultima_conta_energia_condominio =  sanitize_text_field($request['valor_ultima_conta_energia_condominio']);
        $valor_ultima_conta_energia_condominio =  sanitize_text_field($request['account_month_consumo_energia']);
        
        // Extra passo 4, Ar condicionado
        
        $qual_tipo_predominante_de_ar_condicionado_areas_comuns =  sanitize_text_field($request['qual_tipo_predominante_de_ar_condicionado_areas_comuns']);
        $qtd_quip_ar_cond_areas_comuns =  sanitize_text_field($request['qtd_quip_ar_cond_areas_comuns']);
        $idade_media_dos_equipamentos_de_ar_condicionado_areas_comuns =  sanitize_text_field($request['idade_media_dos_equipamentos_de_ar_condicionado_areas_comuns']);
        
        $qual_tipo_predominante_de_ar_condicionado_areas_pv_residencial =  sanitize_text_field($request['qual_tipo_predominante_de_ar_condicionado_areas_pv_residencial']);
        $qtd_quip_ar_cond_areas_pv_residenciais =  sanitize_text_field($request['qtd_quip_ar_cond_areas_pv_residenciais']);
        $idade_media_dos_equipamentos_de_ar_condicionado_areas_pv_residenciais =  sanitize_text_field($request['idade_media_dos_equipamentos_de_ar_condicionado_areas_pv_residenciais']);

        $qual_tipo_predominante_de_ar_condicionado_areas_comerciais =  sanitize_text_field($request['qual_tipo_predominante_de_ar_condicionado_areas_comerciais']);
        $qtd_quip_ar_cond_areas_comerciais =  sanitize_text_field($request['qtd_quip_ar_cond_areas_comerciais']);
        $idade_media_dos_equipamentos_de_ar_condicionado_areas_comerciais =  sanitize_text_field($request['idade_media_dos_equipamentos_de_ar_condicionado_areas_comerciais']);

         
        // Extra passo 5, Iluminação

        $luz_predominante_areas_comuns =  sanitize_text_field($request['luz_predominante_areas_comuns']);
        $luz_predominante_areas_pv_residenciais =  sanitize_text_field($request['luz_predominante_areas_pv_residenciais']);
        $luz_predominante_areas_comerciais =  sanitize_text_field($request['luz_predominante_areas_comerciais']);



        $response = array(
            'post_author' => $user_id,
            'post_type' => 'imoveis',
            'post_title' => $name_of_property,
            'post_status' => 'publish',
            'tax_input' => array($type_of_property),
            'meta_input' => array(
                'type_of_property' => $type_of_property,
                'type_public_property' => $type_public_property,
                'name_of_property' => $name_of_property,
                'voluntary_self_inspection' => $voluntary_self_inspection,
                'process_number' => $process_number,
                'iptu' => $iptu,
                'cep' => $cep,
                'address' => $address,
                'client_light' => $client_light,
                'income_range' => $income_range,
                'which_residence_type' => $which_residence_type,
                'total_area' => $total_area,
                'mixed_type_property' => $mixed_type_property,
                'total_place_area' => $total_place_area,
                'total_conditioned_area' => $total_conditioned_area,
                'number_of_floors' => $number_of_floors,
                'occupants_useful_day' => $occupants_useful_day,
                'working_hours' => $working_hours,
                'percentage_occupancy' => $percentage_occupancy,
                'what_property_use' => $what_property_use,
                'value_last_account' => $value_last_account,
                'account_month' => $account_month,
                'total_annual_consumption' => $total_annual_consumption,
                'energy_tariff' => $energy_tariff,
                'consumption_data' => $consumption_data,
                'total_consumption_value' => $total_consumption_value,
                'last_energy_bill' => $last_energy_bill,
                'hired_demand' => $hired_demand,
                'rush_hour_consumption' => $rush_hour_consumption,
                'off_time_consumption' => $off_time_consumption,
                'last_account_value' => $last_account_value,
                'month_of_invoice' => $month_of_invoice,
                'predominant_air_conditioning' => $predominant_air_conditioning,
                'vrf_options_type' => $predominant_air_conditioning_two,
                'chiller_options_type' => $predominant_air_conditioning_three,
                'air_age_equipment' => $air_age_equipment,
                'automation_system' => $automation_system,
                'on_off_system' => $on_off_system,
                'temperature_control' => $temperature_control,
                'do_not_have' => $do_not_have,
                'predominant_type_illumination' => $predominant_type_illumination,
                'light_automation' => $light_automation,
                'has_photovoltaic_panels' => $has_photovoltaic_panels,
                'panels_water_heating' => $panels_water_heating,
                'available_on_rooftops' => $available_on_rooftops,
                'area_comum_total' => $area_comum_total,
                'area_privativa_total' => $area_privativa_total,
                'numero_de_unidades_privativas_residenciais' => $n_unidades_pv_residenciais,
                'area_media_das_unidades_privativas' =>  $area_media_unidades_pv,
                'quantos_andares_tem' => $quantos_andares_tem,
                'area_comercial_total' => $area_comercial_total, 
                'numero_de_unidades_privativas_comerciais' => $n_unidades_pv_comerciais, 
                'area_media_das_unidades_privativas_comerciais' => $am_unidades_pv_comerciais,
                'consumo_das_areas_comuns' => $consumo_areas_comuns,
                'consumo_estimado_das_areas_comerciais' => $consumo_estimado_areas_comerciais,
                'consumo_estimado_das_areas_privativas_residenciais' => $consumo_estimado_areas_pv_residenciais,
                'valor_ultima_conta_de_energia_do_condominio' => $valor_ultima_conta_energia_condominio,
                'tipo_predominante_de_ar_condicionado_nas_areas_comuns' => $qual_tipo_predominante_de_ar_condicionado_areas_comuns,
                'quantidade_de_equipamentos_de_ar_condicionado_nas_areas_comuns' => $qtd_quip_ar_cond_areas_comuns,
                'idade_media_dos_equipamentos_de_ar_condicionado_nas_areas_comuns' => $idade_media_dos_equipamentos_de_ar_condicionado_areas_comuns,       
                'tipo_predominante_de_ar_condicionado_nas_areas_privativas_residenciais' => $qual_tipo_predominante_de_ar_condicionado_areas_pv_residencial,
                'quantidade_de_equipamentos_de_ar_condicionado_nas_areas_privativas_residenciais' => $qtd_quip_ar_cond_areas_pv_residenciais,
                'idade_media_dos_equipamentos_de_ar_condicionado_nas_areas_privativas_residenciais' => $idade_media_dos_equipamentos_de_ar_condicionado_areas_pv_residenciais,
                'tipo_predominante_de_ar_condicionado_nas_areas_comerciais' => $qual_tipo_predominante_de_ar_condicionado_areas_comerciais,
                'quantidade_de_equipamentos_de_ar_condicionado_nas_areas_comerciais' => $qtd_quip_ar_cond_areas_comerciais,
                'idade_media_dos_equipamentos_de_ar_condicionado_nas_areas_comerciais' => $idade_media_dos_equipamentos_de_ar_condicionado_areas_comerciais,
                'qual_tipo_de_iluminacao_predominante_nas_areas_comuns' => $luz_predominante_areas_comuns,
                'qual_tipo_de_iluminacao_predominante_nas_areas_privativas_residenciais' => $luz_predominante_areas_pv_residenciais,
                'qual_tipo_de_iluminacao_predominante_nas__areas_comerciais' => $luz_predominante_areas_comerciais
            ),
        );

        $post_id = wp_insert_post($response);
        wp_set_post_terms($post_id, $type_of_property, 'tipos_de_imoveis');

        if ($typelang == 'pt-br') {
            wp_redirect(get_permalink(277));
        } elseif ($typelang == 'en') {
            wp_redirect(get_permalink(378));
        }
    }
}

add_action('admin_post_add_imovel', 'monsi_admin_add_imovel');
