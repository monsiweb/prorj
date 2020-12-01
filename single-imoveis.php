<?php
/* Template Name: Painel */

if (is_user_logged_in()) {
    global $current_user;
    $terms = get_user_meta($current_user->ID, 'terms', true);

    if (!$terms == 1 || !$terms == 'on') {
        wp_redirect(get_permalink(8));
    }
}

// Fields
$data = [
    'type_of_property' => get_field('type_of_property'),
    'name_of_property' => get_field('name_of_property'),
    'voluntary_self_inspection' => get_field('voluntary_self_inspection'),
    'process_number' => get_field('process_number'),
    'iptu' => get_field('iptu'),
    'cep' => get_field('cep'),
    'address' => get_field('cep'),
    'client_light' => get_field('client_light'),
    'income_range' => get_field('income_range'),
    'which_residence_type' => get_field('which_residence_type'),
    'total_area' => get_field('total_area'),
    'mixed_type_property' => get_field('mixed_type_property'),
    'total_place_area' => get_field('total_place_area'),
    'total_conditioned_area' => get_field('total_conditioned_area'),
    'number_of_floors' => get_field('number_of_floors'),
    'occupants_useful_day' => get_field('occupants_useful_day'),
    'working_hours' => get_field('working_hours'),
    'percentage_occupancy' => get_field('percentage_occupancy'),
    'what_property_use' => get_field('what_property_use'),
    'value_last_account' => get_field('value_last_account'),
    'account_month' => get_field('account_month'),
    'total_annual_consumption' => get_field('total_annual_consumption'),
    'energy_tariff' => get_field('energy_tariff'),
    'consumption_data' => get_field('consumption_data'),
    'last_energy_bill' => get_field('last_energy_bill'),
    'account_month_a1' => get_field('account_month_a1'),
    'hired_demand' => get_field('hired_demand'),
    'rush_hour_consumption' => get_field('rush_hour_consumption'),
    'off_time_consumption' => get_field('off_time_consumption'),
    'last_account_value' => get_field('last_account_value'),
    'month_of_invoice' => get_field('month_of_invoice'),
    'predominant_air_conditioning' => get_field('predominant_air_conditioning'),
    'predominant_air_conditioning_two' => get_field('predominant_air_conditioning_two'),
    'predominant_air_conditioning_three' => get_field('predominant_air_conditioning_three'),
    'air_age_equipment' => get_field('air_age_equipment'),
    'automation_system' => get_field('automation_system'),
    'on_off_system' => get_field('on_off_system'),
    'temperature_control' => get_field('temperature_control'),
    'do_not_have' => get_field('do_not_have'),
    'predominant_type_illumination' => get_field('predominant_type_illumination'),
    'has_photovoltaic_panels' => get_field('has_photovoltaic_panels'),
    'panels_water_heating' => get_field('panels_water_heating'),
    'available_on_rooftops' => get_field('available_on_rooftops')
];
?>

    <!-- Single page functions -->
<?php

// TOTAL HORA ANO

?>
    <!-- Single page fim -->

<?php get_header(); ?>
    <!-- DEBUG-->

<?php
    var_dump($data);
    var_dump($data['iptu']);
?>


    <section class="hero-single">
        <div class="container">
            <h1 class="title--primary text-center">Ficha técnica</h1>
            <h2 class="subtitle--herosingle"><?php the_title(); ?></h2>
            <span class="text--herosingle">Área total:  m²</span>
            <span class="text--herosingle">Consumo total: kWh/ano</span>


        </div>
    </section>

<?php get_footer(); ?>