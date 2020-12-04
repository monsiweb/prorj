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
    'type_public_property' => get_field('type_public_property'),
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
$month_mod = [
    'janeiro' => 0.925,
    'fevereiro' => 0.950,
    'marco' => 0.975,
    'abril' => 0.950,
    'maio' => 1.007,
    'junho' => 1.040,
    'julho' => 1.058,
    'agosto' => 1.049,
    'setembro' => 1.028,
    'outubro' => 1.032,
    'novembro' => 0.965,
    'dezembro' => 0.990
];
$type_mod = [
    "ma_avc" => 0,
    "ma_ilu" => 0,
    "emed" => 0
];
?>

<?php
// Tipo
$type_public_property = $data['type_public_property'];
switch ($type_public_property) {
    case ($type_public_property == 'imovel-publico-clinica'):
        $type_public_property = 'Clinica';
        break;
    case ($type_public_property == 'imovel-publico-escola'):
        $type_public_property = 'Escola';
        break;
    case ($type_public_property == 'imovel-publico-adm'):
        $type_public_property = 'Ed. ADM';
        break;
};
switch ($type_public_property) {
    case ($type_public_property == 'Clinica'):
        $type_mod = [
            "ma_avc" => 1,
            "ma_ilu" => 0.98,
            "emed" => 300
        ];
        break;
    case ($type_public_property == 'Escola'):
        $type_mod = [
            "ma_avc" => 0.9,
            "ma_ilu" => 0.98,
            "emed" => 300
        ];
        break;
    case ($type_public_property == 'Ed. ADM'):
        $type_mod = [
            "ma_avc" => 0.93,
            "ma_ilu" => 1,
            "emed" => 500
        ];
        break;
};

// CONSUMO TOTAL
$consumption_type = $data['consumption_data'];

if ($consumption_type == 'Ax') {
    $consumption = $data['last_energy_bill'];
    $total_consumption = $consumption * $month_mod[""];
} elseif ($consumption_type == 'Bx') {

}

?>
    <!-- Single page fim -->

<?php get_header(); ?>
    <!-- DEBUG-->

<?php

?>


    <section class="hero-single">
        <div class="container">
            <div class="d-flex justify-content-center flex-column align-items-center">
                <h1 class="title--primary text-center">DIAGNÓSTICO ENERGÉTICO PRO Rio</h1>
                <p class="text-center">Relatório Final para Clínicas, Ed Administrativos e Escolas (dentro da faixa de
                    abrangência de metragem)<br/>
                    Dados dinâmicos a serem retirados dos inputs ou resultados.
                </p>
            </div>

            <div class="d-flex justify-content-center">
                <div class="d-flex mr-4">
                    <p class="text--rel"><?= $type_public_property; ?></p>
                </div>
                <div class="d-flex align-items-center">
                    <img src="<?= get_template_directory_uri(); ?>/assets/images/local_r.svg" alt="">
                    <p class="text--rel">Rua das Laranjeiras, n. 815</p>
                </div>
            </div>

            <div class="my-4">
                <p class="text-center">Neste relatório você poderá identificar o comportamento energético de seu imóvel
                    quando comparado com demais imóveis semelhantes, da cidade do Rio de Janeiro. Poderá também
                    identificar seu potencial de redução de consumo, através de medidas relacionadas à modernização de
                    seus sistemas de iluminação e climatização.

                    Para completar, te informaremos sobre a quantidade de emissões de CO2 que será capaz de evitar
                    através de medidas de eficiência energética e, fechando com chave de ouro, saberá estimar seu
                    potencial de geração de energia renovável através da instalação de um sistema fotovoltaico, também
                    com respectiva redução de emissões.
                    Esperamos que aproveite!
                </p>
            </div>
        </div>
    </section>

    <section class="benchmark">
        <div>
            <h2 class="subtitle--herosingle"><?php the_title(); ?></h2>
            <span class="text--herosingle">Área total:  m²</span>
            <span class="text--herosingle">Consumo total: kWh/ano</span>
        </div>

        <div class="text-center my-4">
            <h2 class="subtitle--two">POSIÇÃO NO BENCHMARK</h2>
            <p>veja aqui como está sua escola quando comparada a outras da mesma cidade:</p>
        </div>
    </section>

    <section class="yourConsumption">
        <div class="text-center">
            <h2 class="single--title">Seu consumo</h2>
            <p class="single--text m-auto">Os gráficos mostram os consumos estimados do sistema de climatização, de
                iluminação e de todos os outros (juntos) que constituem o consumo energético total de seu imóvel:</p>
            <p class="single--subtitle mt-4">Consumo total utilizado: <span>850.000 kWh/ano</span></p>
        </div>
        <div id="potencial-atual" style="width: 900px; height: 500px;"></div>
       
    </section>


    <script>
        //SEU CONSUMO
        window.onload = function () {
            google.charts.load("current", {packages: ["corechart"]});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    ['Ar condicionado', <?="20000"?>],
                    ['Iluminação', 2222],
                    ['Tomadas e outros', 2111],
                ]);

                var options = {
                    pieHole: 0.4,
                    slices: {
                        0: {color: '#FB451D'},
                        1: {color: '#FAAF41'},
                        2: {color: '#FFCD00'}
                    }
                };

                var chart = new google.visualization.PieChart(document.getElementById('potencial-atual'));
                chart.draw(data, options);
            }

            // SEU POTENCIAL - ATUAL
            google.charts.setOnLoadCallback(potencialAtualChart);

            function potencialAtualChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    ['Ar condicionado', <?="20000"?>],
                    ['Iluminação', 2222],
                    ['Tomadas e outros', 2111],
                ]);

                var options = {
                    pieHole: 0.4,
                    slices: {
                        0: {color: '#FB451D'},
                        1: {color: '#FAAF41'},
                        2: {color: '#FFCD00'}
                    }
                };

                var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                chart.draw(data, options);
            };
        };


    </script>
<?php get_footer(); ?>