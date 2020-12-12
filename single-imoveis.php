<?php
/* Template Name: Painel */

if (is_user_logged_in()) {
    global $current_user;
    $terms = get_user_meta($current_user->ID, 'terms', true);

    if (!$terms == 1 || !$terms == 'on') {
        wp_redirect(get_permalink(8));
    }
}

// Functions

/*
* kWh Converter
* Author: github.com/monteires
* Date: 09/12/20
*/

function kwh(float $number)
{
    return number_format($number, '2', ',', '.');
}

/*
* Remove points
* Author: github.com/monteires
* Date: 09/12/20
*/

function num($value)
{
    $num = str_replace('.', '', $value);
    return floatval(str_replace(',', '', $num));
}


/*
* Float number
* Author: github.com/monteires
* Date: 09/12/20
*/

function floatNum($value)
{
    return floatval(str_replace(',', '.', $value));
}



// Automacão

function automationValue($valueAuto)
{

    if ($valueAuto == 'sim') {
        $value_temp = 0.85;
        return $value_temp;
    } else {
        $value_temp = 1;
        return $value_temp;
    }
}

// Number Precision

function numberPrecision($number, $precision = 2, $separator = '.')
{
    $numberParts = explode($separator, $number);
    $response = $numberParts[0];
    if (count($numberParts) > 1 && $precision > 0) {
        $response .= $separator;
        $response .= substr($numberParts[1], 0, $precision);
    }
    return $response;
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
    'address' => get_field('address'),
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
    'total_consumption_value' => get_field('total_consumption_value'),
    'last_energy_bill' => get_field('last_energy_bill'),
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

// Area total
$total_area = floatNum($data['total_place_area']);
// Sistema de automação
$automation_system = $data['automation_system'];

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
        $txar = 48.71;
        break;
    case ($type_public_property == 'Escola'):
        $type_mod = [
            "ma_avc" => 0.9,
            "ma_ilu" => 0.98,
            "emed" => 300
        ];
        $txar = 16.13;
        break;
    case ($type_public_property == 'Ed. ADM'):
        $type_mod = [
            "ma_avc" => 0.93,
            "ma_ilu" => 1,
            "emed" => 500
        ];
        $txar = 30.90;
        break;
};

// CONSUMO TOTAL
$consumption_type = $data['consumption_data'];

if ($consumption_type == 'A') {
    $rush_hour_consumption = num($data['rush_hour_consumption']);
    $off_time_consumption = num($data['off_time_consumption']);
    $last_account_value = num($data['last_account_value']);

    // Consumo total
    $total_consumption = $rush_hour_consumption + $off_time_consumption;
    $month_of_invoice = $data['month_of_invoice'];

    // Consumo total + modificador
    $total_consumption_mod = $total_consumption * $month_mod["{$month_of_invoice}"];

    // Consumo total anual
    $total_consumption_year = $total_consumption_mod * 12;

    // Tarifa
    $tariff = $last_account_value / $total_consumption;
} elseif ($consumption_type == 'B') {
    $last_account_value = num($data['last_energy_bill']);

    // Consumo total
    $total_consumption = num($data['total_consumption_value']);

    // Mês da conta
    $account_month = $data['account_month'];

    // Consumo total + modificador
    $total_consumption_mod = $total_consumption * $month_mod["{$account_month}"];

    // Consumo total por ano
    $total_consumption_year = $total_consumption_mod * 12;

    // Tarifa
    $tariff = $last_account_value / $total_consumption;
}

/*
* AR CONDICIONADO
* Date: 09/12/20
*/

//Sistema de ar condicionado principal
$air_type = $data['predominant_air_conditioning_two'];

//(Idade) Idade do equipamento e/ou sistema
$air_age = $data['air_age_equipment'];

//Área do ambiente condicionada (AC)
$total_area_cond = $total_area * $type_mod['ma_avc'];

// Capacidade total estimada em TR (CPTR)
$cptr_temp = ($total_area_cond / $txar) + 1;
$cptr = (float)number_format($cptr_temp, '2', '.', '.');

// Conversão CPTR
if ($air_type == 'janela') {
    // Capacidade total estimada em BTU/h (CPBTU)
    $cpbtu = $cptr * 12000;
} else {
    // Capacidade total estimada em kW (CKW)
    $ckw = (float)number_format(($cptr * 3.5168), '2', '.', '.');
}


// MI e NIVEL
switch ($air_age) {
    case ($air_age <= 2):
        $mi = 0;
        $nivel = "C";
        break;

    case ($air_age <= 5):
        $mi = 0.05;
        $nivel = "C";
        break;
    case ($air_age <= 10):
        $mi = 0.10;
        $nivel = "C";
        break;
    case ($air_age <= 14):
        $mi = 0.1350;
        $nivel = "D";
        break;

    case ($air_age <= 19):
        $mi = 0.17;
        $nivel = "D";
        break;
    case ($air_age <= 25):
        $mi = 0.30;
        $nivel = "D";
        break;
};

// EFICIENCIA MINIMA

switch ($air_type) {

    case ($air_type == 'split'):
        if ($nivel == 'C') {
            if ($ckw <= 40) {
                $min_efficiency = 3.02;
            } elseif ($ckw <= 70) {
                $min_efficiency = 2.84;
            } elseif ($ckw <= 223) {
                $min_efficiency = 2.78;
            } else {
                $min_efficiency = 2.7;
            }
        } elseif ($nivel == 'D') {
            if ($ckw <= 40) {
                $min_efficiency = 2.61;
            } elseif ($ckw <= 70) {
                $min_efficiency = 2.49;
            } elseif ($ckw <= 223) {
                $min_efficiency = 2.49;
            } else {
                $min_efficiency = 2.4;
            }
        } else {
            echo "ERROR";
        }

        break;

    case ($air_type == 'split'):
        if ($nivel == 'C') {
            if ($ckw <= 40) {
                $min_efficiency = 3.02;
            } elseif ($ckw <= 70) {
                $min_efficiency = 2.84;
            } elseif ($ckw <= 223) {
                $min_efficiency = 2.78;
            } else {
                $min_efficiency = 2.7;
            }
        } elseif ($nivel == 'D') {
            if ($ckw <= 40) {
                $min_efficiency = 2.61;
            } elseif ($ckw <= 70) {
                $min_efficiency = 2.49;
            } elseif ($ckw <= 223) {
                $min_efficiency = 2.49;
            } else {
                $min_efficiency = 2.4;
            }
        } else {
            echo "ERROR";
        }

        break;
}

// // EFICIENCIA MINIMA proposta

switch ($air_type) {

    case ($air_type == 'split'):
        if ($ckw <= 40) {
            $min_efficiency_pro = 3.28;
        } elseif ($ckw <= 70) {
            $min_efficiency_pro = 3.22;
        } elseif ($ckw <= 223) {
            $min_efficiency_pro = 2.93;
        } else {
            $min_efficiency_pro = 2.84;
        }
        break;
};

// Eficiência base com modificador de idade (EFB)
$efb_temp = $min_efficiency * (1 - $mi);
$efb = (float)number_format($efb_temp, '2', '.', '.');



// ILUMINAÇÃO
$type_ilu = $data['predominant_type_illumination'];

switch ($type_ilu) {

    case ($type_ilu == 'incandescente'):
        $data_ilu = [
            "efm" => 15,
            "ptm" => 100,
            "tlm" => 1500
        ];
        break;

    case ($type_ilu == 'mista'):
        $data_ilu = [
            "efm" => 35,
            "ptm" => 250,
            "tlm" => 8750
        ];
        break;

    case ($type_ilu == 'mercurio'):
        $data_ilu = [
            "efm" => 55,
            "ptm" => 250,
            "tlm" => 13750
        ];
        break;

    case ($type_ilu == 'fluorescente-compacta'):
        $data_ilu = [
            "efm" => 75,
            "ptm" => 26,
            "tlm" => 1950
        ];
        break;

    case ($type_ilu == 'vapor-metalico'):
        $data_ilu = [
            "efm" => 77.5,
            "ptm" => 150,
            "tlm" => 11625
        ];
        break;

    case ($type_ilu == 'fluorescente-tubular'):
        $data_ilu = [
            "efm" => 82.5,
            "ptm" => 40,
            "tlm" => 3300
        ];
        break;

    case ($type_ilu == 'vapor-de-sodio'):
        $data_ilu = [
            "efm" => 80,
            "ptm" => 100,
            "tlm" => 8000
        ];
        break;

    case ($type_ilu == 'led-18w'):
        $data_ilu = [
            "efm" => 150,
            "ptm" => 18,
            "tlm" => 2700
        ];
        break;
}

$ilu_values = [
    "n" => 2.00,
    "lumens" => $data_ilu['tlm'],
    "fm" => 0.8,
    "ffl" => 1,
];

// Calculos
$automation = automationValue($data['automation_system']);

$ilu_F0 = ((float)$total_area) * ((float)$type_mod['ma_ilu']);

$ilu_F1 = round((($type_mod['emed']) * ($ilu_F0)) / (($ilu_values['n']) * ($ilu_values['lumens']) * ($ilu_values['fm']) * $ilu_values['ffl']));

$ilu_F2 = ($data_ilu['ptm'] * $ilu_F1 * $ilu_values['n']) / 1000;

$ilu_F3 = num($ilu_F2 * 5.200 * $automation);

$ilu_F4 = $ilu_F3 * $tariff;


$ilu_p_F1 = round((300 * $ilu_F0) / (2 * 2700 * 0.91 * 1));
$ilu_p_F2 = (float)numberPrecision(((18 * $ilu_p_F1 * 2) / 1000), 2, '.');
$ilu_p_F3 = num($ilu_p_F2 * 5200 * $automation);
$ilu_p_F4 = $ilu_p_F3 * $tariff;

$ilu_calc = [
    "ilu_esa" => [
        "F0" => $ilu_F0,
        "F1" => $ilu_F1,
        "F2" => $ilu_F2,
        "F3" => $ilu_F3,
        "F4" => $ilu_F4,
    ],
    "ilu_ep" => [
        "F0" => $ilu_F0,
        "F1" => $ilu_p_F1,
        "F2" => $ilu_p_F2,
        "F3" => $ilu_p_F3,
        "F4" => $ilu_p_F4,
    ]

];
$dep_porcentagem = (int)numberPrecision((($ilu_calc['ilu_esa']['F2'] - $ilu_calc['ilu_ep']['F2']) / $ilu_calc['ilu_esa']['F2'] * 100), 0, '.');
$dep_porcentagem_ano = (int)numberPrecision(($ilu_calc['ilu_esa']['F3'] / $total_consumption_year  * 100), 0, '.');

$dep = [
    "dep_value" => $ilu_calc['ilu_esa']['F4'] - $ilu_calc['ilu_ep']['F4'],
    "dep_kwh_ano" => $ilu_calc['ilu_esa']['F3'] - $ilu_calc['ilu_ep']['F3'],
    "dep_porcentagem" => $dep_porcentagem,
    "dep_porcentagem_ano" => $dep_porcentagem_ano
];


// DATA FULL

$data_full = [
    "dep" => $dep,
    "lamp calc" => $ilu_calc,
    "Tipo de lampada" => $type_ilu,
    "Values Lamp" => $data_ilu,
    "Area Total" => $total_area,
    "EFB" => $efb,
    "MIN_EFF" => $min_efficiency,
    "MIN_EFF_PRO" => $min_efficiency_pro,
    "TXAR" => $txar,
    "CPTR" => $cptr,
    "ckw" => $ckw,
    "air" => $air_type,
    "air_age" => num($air_age),
    "Area total condicionada" => $total_area_cond,
    "Possui automação?" => $automation_system,
    "MI" => $mi,
    "nivel" => $nivel,
]

?>
<!-- Single page fim -->

<?php get_header(); ?>

<!-- DEBUG-->
<?php
var_dump($data_full);
?>


<section class="hero-single">
    <div class="container">
        <div class="d-flex justify-content-center flex-column align-items-center">
            <h1 class="title--primary text-center">DIAGNÓSTICO ENERGÉTICO PRO Rio</h1>
            <p class="text-center">Relatório Final para Clínicas, Ed Administrativos e Escolas (dentro da faixa de
                abrangência de metragem)<br />
                Dados dinâmicos a serem retirados dos inputs ou resultados.
            </p>
        </div>

        <div class="d-flex justify-content-center">
            <div class="d-flex mr-4">
                <p class="text--rel"><?= $type_public_property; ?></p>
            </div>
            <div class="d-flex align-items-center">
                <img src="<?= get_template_directory_uri(); ?>/assets/images/local_r.svg" alt="">
                <p class="text--rel"><?= $data['address']; ?></p>
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
        <span class="text--herosingle">Área total: <?= $data['total_place_area']; ?> m²</span>
        <span class="text--herosingle">Consumo total: <?= kwh($total_consumption_year); ?> kWh/ano</span>
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
        <p class="single--subtitle mt-4">Consumo total utilizado: <span><?= kwh($total_consumption_year); ?> kWh/ano</span></p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div id="pie-consumo" style="max-width: 500px; height: 500px;"></div>
            </div>
        </div>
    </div>
</section>

<section class="savingPotential">
    <div class="text-center">
        <h2 class="single--title">Seu consumo</h2>
        <p class="single--text m-auto">agora você pode verificar seu potencial de economia através de medidas de eficiência energética:</p>
        <p class="single--subtitle mt-4">Potencial de economia do imóvel</p>
        <p class="single--text m-auto">Seu potencial de economia é de <span>10 %</span></p>
    </div>

    <div class="container">
        <div class="row savingPies my-4">
            <div class="col-md-6 d-flex justify-content-center">
                <p class="single--pieTitle">Atual</p>
                <div id="pie-consumo-atual" style="width: 300px; height: 300px;"></div>
                <p class="single--pieSubTitle">850.000 kWh/ano</p>
            </div>

            <div class="col-md-6 d-flex justify-content-center">
                <p class="single--pieTitle">Objetivo*</p>
                <div id="pie-consumo-objetivo" style="width: 300px; height: 300px;"></div>
                <p class="single--pieSubTitle green--color">850.000 kWh/ano</p>
            </div>
        </div>
    </div>
</section>


<section class="savingPotential savingPotential__Two">
    <div class="text-center">
        <p class="single--subtitle mt-4">Potencial de economia do sistema de climatização (ar condicionados)
        </p>
        <p class="single--text m-auto">Seu potencial de economia no sistema de climatização é de <span>30 %</span><br />
            Sistema sugerido – Split Inverter</p>
    </div>

    <div class="container">
        <div class="row savingPies my-4">
            <div class="col-md-6 d-flex justify-content-center">
                <p class="single--pieTitle">Atual</p>
                <div id="pie-consumo-atual-two" style="width: 300px; height: 300px;"></div>
                <p class="single--pieSubTitle">850.000 kWh/ano</p>
            </div>

            <div class="col-md-6 d-flex justify-content-center">
                <p class="single--pieTitle">Objetivo*</p>
                <div id="pie-consumo-objetivo-two" style="width: 300px; height: 300px;"></div>
                <p class="single--pieSubTitle green--color">850.000 kWh/ano</p>
            </div>
        </div>
    </div>
</section>

<section class="savingPotential savingPotential__Three">
    <div class="text-center">
        <p class="single--subtitle mt-4">Potencial de economia do sistema de iluminação</p>
        <p class="single--text m-auto">Seu potencial de economia no sistema de iluminação é de <span><?= $dep['dep_porcentagem']; ?> %</span><br />
            Sistema sugerido – LED</p>
    </div>

    <div class="container">
        <div class="row savingPies my-4">
            <div class="col-md-6 d-flex justify-content-center">
                <p class="single--pieTitle">Atual</p>
                <div id="pie-consumo-atual-three" style="width: 300px; height: 300px;"></div>
                <p class="single--pieSubTitle"><?= kwh($ilu_calc['ilu_esa']['F3']); ?> kWh/ano</p>
            </div>

            <div class="col-md-6 d-flex justify-content-center">
                <p class="single--pieTitle">Objetivo*</p>
                <div id="pie-consumo-objetivo-three" style="width: 300px; height: 300px;"></div>
                <p class="single--pieSubTitle green--color"><?= kwh($ilu_calc['ilu_ep']['F3']); ?> kWh/ano</p>
            </div>
        </div>
    </div>
</section>

<section class="strategy__section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <p class="single--title my-4">ESTRATÉGIAS DE EFICIÊNCIA ENERGÉTICA E CONFORTO QUE PODEM<br />
                        MELHORAR AINDA MAIS SUA PERFORMANCE ENERGÉTICA:</p>
                </div>

                <p class="strategy__type">ZERO CUSTO</p>
                <div class="strategy__item">
                    <p class="strategy__item__title">1. Aumento do setpoint de temperatura </p>
                    <p class="strategy__item__p">Temperaturas de setpoint muito baixas em equipamentos de ar-condicionado pode tanto diminuir a vida útil do equipamento por exigir mais de suas partes mecânicas, quanto consome mais energia. Além disso, temperaturas fora da faixa entre 20°C e 23°C geralmente geram desconforto nos usuários. Por isso, sugerimos que indiquem aos usuários a deixarem os equipamentos de ar-condicionado, no mínimo, a uma temperatura de 22°C.
                    </p>
                </div>

                <div class="strategy__item">
                    <p class="strategy__item__title">2. Ajuste do horário de operação do ar condicionado</p>
                    <p class="strategy__item__p">
                        Equipamentos de ar-condicionado que operam com ambientes vazios estão consumindo energia sem gerar conforto. Sem contar que o aumento do tempo de uso desnecessário pode diminuir seu tempo de vida útil. Por isso, indicamos que manter os equipamentos ligados apenas quando o ambiente estiver ocupado, a não ser que existam condições especiais ligada ao uso do ar-condicionado. Além disso, se as condições climáticas forem favoráveis, é aconselhável deixar o equipamento desligado e aproveitar a ventilação natural.
                    </p>
                </div>

                <div class="strategy__item">
                    <p class="strategy__item__title">3. Campanha de conscientização do uso de energia </p>
                    <p class="strategy__item__p">O engajamento dos funcionários e colaboradores dentro do ambiente de trabalho atua diretamente na redução do consumo desnecessário de energia e na corte de emissões de carbono da organização.
                        Iniciativas simples como fazer campanhas, programas, estabelecer metas de redução de consumo de energia ou enviar aos seus colaboradores informações sobre a parcela de responsabilidade de cada um no consumo de energia pode tornar as pessoas mais comprometidas com a redução do uso de energia na empresa e reduzir o número de equipamentos “esquecidos” ligados de um dia para outro ou durante o horário de almoço.
                    </p>
                </div>

                <div class="strategy__item">
                    <p class="strategy__item__title">4. Gestão de faturas de energia</p>
                    <p class="strategy__item__p">Existem diversas possibilidades de economia ligadas a análise e gestão dos elementos contidos dentro da fatura de energia. Pode-se avaliar se a demanda contratada é a mais adequada com base na demanda consumida, evitando demandas contratadas muito altas, levando a uma cobrança excedente ou a demandas contratadas muito baixas, levando a multas. Pode-se avaliar se a modalidade atual da sua fatura é a mais adequada com base no seu perfil de consumo ponta e fora ponta. Além disso pode-se avaliar o impacto que as multas, seja por atraso ou por excesso de energia reativa, estão tendo nas finanças e tomar ações para reduzi-las.
                    </p>
                </div>

                <div class="strategy__item">
                    <p class="strategy__item__title">5. Gestão operacional</p>
                    <p class="strategy__item__p">Garantir a presença de um gestor predial, no edifício, que conheça e fiscalize, de forma geral, o funcionamento de todos os sistemas energéticos e parâmetros de automação, facilitando a obtenção de informações e a comunicação é essencial para a uma boa gestão energética. Suas atividades incluem a realização de um inventário de lâmpadas e equipamentos de ar condicionado e o estabelecimento de procedimentos formais de controle e operação da iluminação e ar condicionado, entre outros.
                    </p>
                </div>
                <p class="strategy__type">Baixo custo</p>
                <div class="strategy__item">
                    <p class="strategy__item__title">6. Instalação de sensores de presença na iluminação de corredores, banheiros e garagem</p>
                    <p class="strategy__item__p">A instalação de sensores de presença em banheiros, corredores e garagem permite que a iluminação seja ativa apenas quando existe alguma ocupação nos ambientes citados, evitando assim que a iluminação fique ligada de forma desnecessária. Estimativas apontam que a instalação de sensores de presença podem reduzir o consumo energético com iluminação em até 35%. Os sensores de presença devem ser sempre associados com lâmpadas LED por sua maior vida útil.
                    </p>
                </div>
                <div class="strategy__item">
                    <p class="strategy__item__title">7. Instalação de fotocélulas na iluminação externa</p>
                    <p class="strategy__item__p">O uso de fotocélulas é indicado para a iluminação de áreas externas pois o dispositivo faz o acionamento da lâmpada apenas quando há baixa luminosidade, ou seja quando começa a escurecer, evitando que elas liguem sem necessidade ou que fiquem acesas durante o dia.

                    </p>
                </div>
                <div class="strategy__item">
                    <p class="strategy__item__title">8. Instalação de timers para desligamento automático de equipamentos de iluminação e ar condicionado</p>
                    <p class="strategy__item__p">A instalação de timers para desligamento automático de equipamentos de iluminação e ar condicionado permite que seja definido um horário para que esses sistemas sejam desligados, garantindo, portanto, que nada foi esquecido ligado durante a noite e final de semana.
                    </p>
                </div>
                <div class="strategy__item">
                    <p class="strategy__item__title">9. Fazer a pintura da cobertura (telhado) na cor branca</p>
                    <p class="strategy__item__p">A pintura da cobertura de cores claras faz com que parte da energia que seria absorvida por telhados mais escuros seja refletida, diminuindo assim a quantidade de calor que entra nos ambientes logo abaixo da cobertura, e portanto, diminuindo o consumo dos equipamentos de ar condicionado. É importante salientar que é necessário fazer manutenções na cor da cobertura, já que essa acaba se sujando ou desgastando com o tempo.
                    </p>
                </div>
                <p class="strategy__type">Médio e alto custo</p>
                <div class="strategy__item">
                    <p class="strategy__item__title">10. Fazer a vedação adequada para os equipamentos de ar condicionado de janela</p>
                    <p class="strategy__item__p">Em casos de instalação de equipamentos de ar condicionado de janela e splits, fazer com que os ambientes condicionados não possuam frestas, ajuda a reduzir o consumo de equipamentos de ar condicionado, pois as frestas permitem que ar quente do exterior entre de forma excessiva, o que força ao ar condicionado a operar por mais tempo. Portanto recomenda-se que frestas sejam vedadas com material isolante e de forma que não haja vãos entre o equipamento e a parede.
                    </p>
                </div>
                <div class="strategy__item">
                    <p class="strategy__item__title">11. Fixação de películas de controle solar nas janelas</p>
                    <p class="strategy__item__p">A instalação de películas de controle solar permite que apenas parte da radiação solar entre nos ambientes, diminuindo assim o calor adicionado aos ambientes através das janelas, reduzindo portanto a necessidade de operação por parte do sistema de ar condicionado.

                    </p>
                </div>
                <div class="strategy__item">
                    <p class="strategy__item__title">12. Instalação de sombreamento externo em janelas (brises)</p>
                    <p class="strategy__item__p">Em caso de reforma ou retrofit da fachada da edificação, é interessante pensar no sombreamento ou proteção externa das janelas, para a diminuição da entrada de calor nos ambientes e também para gerar maior conforto aos usuários.
                    </p>
                </div>
                <div class="strategy__item">
                    <p class="strategy__item__title">13. Divisão de circuitos elétricos de iluminação na fachada</p>
                    <p class="strategy__item__p">Para aproveitar a iluminação natural das áreas próximas às janelas, sugere-se fazer a divisão de circuitos elétricos da fileira de lâmpadas paralelas à fachada do edifício. Dessa forma. quando houver iluminação natural suficiente, não é necessário acionar essa fileira de lâmpadas, economizando energia.
                    </p>
                </div>
                <div class="strategy__item">
                    <p class="strategy__item__title">14. Instalação de interruptores de luz nos ambientes </p>
                    <p class="strategy__item__p">Nos casos em que não há interruptores nos espaços internos, ou seja, o acionamento da iluminação é feito somente nos quadros elétricos, recomenda-se fazer a instalação de interruptores em cada ambiente, já que isso permite que as lâmpadas sejam ligadas apenas quando necessárias. É recomendável implementar esta medida junto com uma campanha de conscientização dos usuários.
                    </p>
                </div>
                <div class="strategy__item">
                    <p class="strategy__item__title">15. Troca de lâmpadas fluorescentes, incandescentes e dicróicas por LED</p>
                    <p class="strategy__item__p">Lâmpadas incandescentes, fluorescentes e dicróicas são de baixa eficiência se comparadas aos seus respectivos modelos em tecnologia LED. A substituição das lâmpadas para LED pode gerar economias de até 40% no consumo de iluminação. Deve-se, contudo, atentar às características de cada lâmpada em termos de eficiência luminosa (lm/W), temperatura de cor e fluxo luminoso (lúmens) para garantir uma boa troca.
                    </p>
                </div>
                <div class="strategy__item">
                    <p class="strategy__item__title">16. Troca de ar condicionado ineficientes por nível A do Inmetro</p>
                    <p class="strategy__item__p">Equipamentos nível C, D e E consomem mais energia do que é necessário e são de baixa eficiência. A substituição desses equipamentos por um modelo de mesma capacidade nível A do Inmetro e com tecnologia inverter, pode resultar em economias bastante significativas no consumo de energia do edifício, principalmente em locais de alta utilização.
                    </p>
                </div>
                <p class="strategy__type">Últimas recomendações</p>
                <p class="strategy__text mb-5">Todas as recomendações acima buscam ajudar os gestores das edificações a alcançar reduções no consumo de energia, mas a primeira medida a ser considerada, apesar de também ter impactos no consumo, relaciona-se à segurança dos ocupantes. Deve-se, inicialmente, garantir que as instalações elétricas estão em conformidade com normas e padrões de segurança. Cabos expostos, instalações com vazamentos de água, disjuntores ou condutores mal dimensionados, entre outros, são as primeiras patologias a serem corrigidas uma vez que, além de gerar ineficiência no consumo de energia, expõem os ocupantes a graves riscos.</p>
                <p class="strategy__type">Disclaimer</p>
                <p class="strategy__text">Os dados aqui apresentados foram baseados em edificações públicas de escolas de até 6.000 m2, clínicas de até 5.000 m2 e edifícios administrativos de até 10.000 m2.
                    As medidas aqui propostas são indicativas e não exaustivas e devem ser analisadas em cada caso, para determinação da viabilidade de implementação.
                    Os resultados consideram o cenário de operação dos edifícios na situação pós-covid-19 e são estimados, podendo haver variação uma vez que o diagnóstico energético on-line não tem a intenção ou capacidade técnica de chegar a resultados precisos. Caso o gestor entenda que deve seguir adiante e implementar medidas de eficiência energética, recomendamos fortemente que profissionais qualificados sejam contratados para tal.
                    Todas as sugestões de substituição de tecnologias ou sistemas devem ser verificadas por profissionais qualificados uma vez que nem sempre podem ser as mais recomendadas para os diferentes tipos de imóveis.
                    Não nos responsabilizamos, de nenhuma forma, sobre e efetividade das medidas, questões técnicas ou resultados a serem alcançados.</p>
            </div>
        </div>
    </div>
</section>





<script>
    //SEU CONSUMO
    window.onload = function() {
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Ar condicionado', <?= "20000" ?>],
                ['Iluminação', 2222],
                ['Tomadas e outros', 2111],
            ]);

            var options = {
                pieHole: 0.4,
                legend: 'none',
                slices: {
                    0: {
                        color: '#FB451D'
                    },
                    1: {
                        color: '#FAAF41'
                    },
                    2: {
                        color: '#FFCD00'
                    }
                }
            };

            var chart = new google.visualization.PieChart(document.getElementById('pie-consumo'));
            chart.draw(data, options);
        }

        // SEU POTENCIAL - ATUAL
        google.charts.setOnLoadCallback(potencialAtualChart);

        function potencialAtualChart() {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Ar condicionado', <?= "20000" ?>],
                ['Iluminação', 2222],
                ['Tomadas e outros', 2111],
            ]);

            var options = {
                pieHole: 0.4,
                legend: 'none',
                slices: {
                    0: {
                        color: '#FB451D'
                    },
                    1: {
                        color: '#FAAF41'
                    },
                    2: {
                        color: '#FFCD00'
                    }
                }
            };

            var chart = new google.visualization.PieChart(document.getElementById('pie-consumo-atual'));
            chart.draw(data, options);
        };


        // SEU POTENCIAL - OBJETIVO
        google.charts.setOnLoadCallback(potencialObjetivoChart);

        function potencialObjetivoChart() {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Ar condicionado', <?= "20000" ?>],
                ['Iluminação', 2222],
                ['Tomadas e outros', 2111],
            ]);

            var options = {
                pieHole: 0.4,
                legend: 'none',
                slices: {
                    0: {
                        color: '#FB451D'
                    },
                    1: {
                        color: '#FAAF41'
                    },
                    2: {
                        color: '#FFCD00'
                    }
                }
            };

            var chart = new google.visualization.PieChart(document.getElementById('pie-consumo-objetivo'));
            chart.draw(data, options);
        };

        // SEU POTENCIAL - ATUAL - TWO
        google.charts.setOnLoadCallback(potencialAtualTwoChart);

        function potencialAtualTwoChart() {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Ar condicionado', <?= "20000" ?>],
            ]);

            var options = {
                pieHole: 0.4,
                legend: 'none',
                slices: {
                    0: {
                        color: '#FB451D'
                    },
                    1: {
                        color: '#FAAF41'
                    },
                    2: {
                        color: '#FFCD00'
                    }
                }
            };

            var chart = new google.visualization.PieChart(document.getElementById('pie-consumo-atual-two'));
            chart.draw(data, options);
        };


        // SEU POTENCIAL - OBJETIVO - Two
        google.charts.setOnLoadCallback(potencialObjetivoTwoChart);

        function potencialObjetivoTwoChart() {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Ar condicionado', <?= "20000" ?>],
                ['Iluminação', 2222],
                ['Tomadas e outros', 2111],
            ]);

            var options = {
                pieHole: 0.4,
                legend: 'none',
                slices: {
                    0: {
                        color: '#FB451D'
                    },
                    1: {
                        color: '#FAAF41'
                    },
                    2: {
                        color: '#FFCD00'
                    }
                }
            };

            var chart = new google.visualization.PieChart(document.getElementById('pie-consumo-objetivo-two'));
            chart.draw(data, options);
        };

        // SEU POTENCIAL - ATUAL - Three
        google.charts.setOnLoadCallback(potencialAtualThreeChart);

        function potencialAtualThreeChart() {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Atual', <?= $ilu_calc['ilu_esa']['F3']; ?>],
            ]);

            var options = {
                pieHole: 0.4,
                legend: 'none',
                slices: {
                    0: {
                        color: '#FAAF41'
                    }
                }
            };

            var chart = new google.visualization.PieChart(document.getElementById('pie-consumo-atual-three'));
            chart.draw(data, options);
        };


        // SEU POTENCIAL - OBJETIVO - Three
        google.charts.setOnLoadCallback(potencialObjetivoThreeChart);

        function potencialObjetivoThreeChart() {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Atual', <?= $ilu_calc['ilu_esa']['F3']; ?>],
                ['Objetivo', <?= $ilu_calc['ilu_ep']['F3']; ?>],
            ]);

            var options = {
                pieHole: 0.4,
                legend: 'none',
                slices: {
                    0: {
                        color: '#FAAF41'
                    },
                    1: {
                        color: '#2DB71F'
                    }
                }
            };

            var chart = new google.visualization.PieChart(document.getElementById('pie-consumo-objetivo-three'));
            chart.draw(data, options);
        };


    };
</script>
<?php get_footer(); ?>