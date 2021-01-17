<?php


// Functions

/*
* kWh Converter
* Author: github.com/monteires
* Date: 09/12/20
*/

function kwh(float $number)
{
    return number_format($number, '2', ',', '');
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

// Real

function real($custo)
{
    return number_format($custo, 2, ',', '.');
};

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
    'predominant_air_conditioning_two' => get_field('vrf_options_type'),
    'predominant_air_conditioning_three' => get_field('chiller_options_type'),
    'air_age_equipment' => get_field('air_age_equipment'),
    'automation_system' => get_field('automation_system'),
    'on_off_system' => get_field('on_off_system'),
    'temperature_control' => get_field('temperature_control'),
    'do_not_have' => get_field('do_not_have'),
    'predominant_type_illumination' => get_field('predominant_type_illumination'),
    'has_photovoltaic_panels' => get_field('has_photovoltaic_panels'),
    'panels_water_heating' => get_field('panels_water_heating'),
    'available_on_rooftops' => get_field('available_on_rooftops'),
    'light_automation' => get_field('light_automation'),
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
    $tariff = (float)numberPrecision(($last_account_value / $total_consumption), 2, '.');
};



/*
* AR CONDICIONADO
* Date: 09/12/20
*/

// Global

if ($data['automation_system'] == 'sim') {
    if ($data['on_off_system'] == 'sim' && $data['temperature_control'] == 'sim') {
        $automation_ar = 0.82;
    } elseif ($data['on_off_system'] == 'sim') {
        $automation_ar = 0.92;
    } elseif ($data['temperature_control'] == 'sim') {
        $automation_ar = 0.85;
    } else {
        $automation_ar = 1;
    }
} else {

    $automation_ar = 1;
}

if ($data['light_automation'] == 'sim') {
    $automation = 0.85;
} else {
    $automation = 1;
}

//Sistema de ar condicionado principal
$air_type = $data['predominant_air_conditioning'];
$air_type_two = $data['predominant_air_conditioning_two'];
$air_type_three = $data['predominant_air_conditioning_three'];

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
    $ckw = (float)number_format(($cptr * 3.5168), '2', '.', '.');
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

        // SPLIT
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

        // SPLIT INVERTER
    case ($air_type == 'split_inverter'):
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

        // JANELA
    case ($air_type == 'janela'):
        if ($nivel == 'C') {
            if ($cpbtu <= 9000) {
                $min_efficiency = 2.78;
            } elseif ($cpbtu <= 13900) {
                $min_efficiency = 2.86;
            } elseif ($cpbtu <= 19900) {
                $min_efficiency = 2.59;
            } else {
                $min_efficiency = 2.48;
            }
        } elseif ($nivel == 'D') {
            if ($cpbtu <= 9000) {
                $min_efficiency = 2.68;
            } elseif ($cpbtu <= 13900) {
                $min_efficiency = 2.78;
            } elseif ($cpbtu <= 19900) {
                $min_efficiency = 2.45;
            } else {
                $min_efficiency = 2.3;
            }
        } else {
            echo "ERROR";
        }

        break;

        // VRF
    case ($air_type == 'vrf'):
        if ($air_type_two == 'condensacao-a-ar') {
            if ($ckw <= 19) {
                $min_efficiency = 3.81;
            } elseif ($ckw <= 40) {
                $min_efficiency = 3.16;
            } elseif ($ckw <= 70) {
                $min_efficiency = 3.05;
            } else {
                $min_efficiency = 2.73;
            }
        } elseif ($air_type_two == 'condensacao-a-agua') {
            if ($ckw <= 19) {
                $min_efficiency = 3.46;
            } elseif ($ckw <= 40) {
                $min_efficiency = 3.46;
            } else {
                $min_efficiency = 2.87;
            }
        } else {
            echo "ERROR";
        }

        break;

    case ($air_type == 'chiller'):
        if ($nivel == 'C') {
            if ($air_type_three == 'condensacao-ar-com-condensador') {
                $min_efficiency = 2.8;
            } elseif ($air_type_three == 'condensacao-ar-sem-condensador') {
                $min_efficiency = 3.1;
            } elseif ($air_type_three == 'condensacao-agua-compressor-alternativo') {
                $min_efficiency = 4.2;
            } elseif ($air_type_three == 'condensacao-agua-compressor-parafuso-scroll') {
                if ($ckw <= 528) {
                    $min_efficiency = 4.45;
                } elseif ($ckw <= 1055) {
                    $min_efficiency = 4.9;
                } else {
                    $min_efficiency = 5.5;
                }
            } elseif ($air_type_three == 'condensacao-agua-compressor-centrifugo') {
                if ($ckw <= 528) {
                    $min_efficiency = 5;
                } elseif ($ckw <= 1055) {
                    $min_efficiency = 5.55;
                } else {
                    $min_efficiency = 6.1;
                }
            } elseif ($air_type_three == 'absorcao-ar-simples-efeito') {
                $min_efficiency = 0.6;
            } elseif ($air_type_three == 'absorcao-agua-simples-efeito') {
                $min_efficiency = 0.7;
            } elseif ($air_type_three == 'absorcao-agua-duplo-acionamento-indireto') {
                $min_efficiency = 1.05;
            } elseif ($air_type_three == 'absorcao-agua-duplo-acionamento-direto') {
                $min_efficiency = 1;
            }
        } elseif ($nivel == 'D') {
            if ($air_type_three == 'condensacao-ar-com-condensador') {
                if ($ckw <= 527) {
                    $min_efficiency = 2.7;
                } else {
                    $min_efficiency = 2.5;
                }
            } elseif ($air_type_three == 'condensacao-ar-sem-condensador') {
                $min_efficiency = 3.1;
            } elseif ($air_type_three == 'condensacao-agua-compressor-alternativo') {
                $min_efficiency = 3.1;
            } elseif ($air_type_three == 'condensacao-agua-compressor-parafuso-scroll') {
                if ($ckw <= 528) {
                    $min_efficiency = 3.9;
                } elseif ($ckw <= 1055) {
                    $min_efficiency = 4.5;
                } else {
                    $min_efficiency = 5.3;
                }
            } elseif ($air_type_three == 'condensacao-agua-compressor-centrifugo') {
                if ($ckw <= 528) {
                    $min_efficiency = 3.9;
                } elseif ($ckw <= 1055) {
                    $min_efficiency = 4.5;
                } else {
                    $min_efficiency = 5.3;
                }
            }
        } else {
            echo 'ERROR';
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

    case ($air_type == 'split_inverter'):
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

    case ($air_type == 'janela'):
        if ($cpbtu <= 9000) {
            $min_efficiency_pro = 2.93;
        } elseif ($cpbtu <= 13900) {
            $min_efficiency_pro = 3.03;
        } elseif ($cpbtu <= 19900) {
            $min_efficiency_pro = 2.88;
        } else {
            $min_efficiency_pro = 2.82;
        }
        break;

    case ($air_type == 'vrf'):

        if ($ckw <= 19) {
            $min_efficiency_pro = 3.81;
        } elseif ($ckw <= 40) {
            $min_efficiency_pro = 3.28;
        } elseif ($ckw <= 70) {
            $min_efficiency_pro = 3.22;
        } else {
            $min_efficiency_pro = 2.93;
        }
        break;

    case ($air_type == 'chiller'):
        if ($air_type_three == 'condensacao-ar-com-condensador') {
            if ($ckw <= 528) {
                $min_efficiency_pro = 3.66;
            } else {
                $min_efficiency_pro = 3.73;
            }
        } elseif ($air_type_three == 'condensacao-ar-sem-condensador') {
            $min_efficiency_pro = 3.1;
        } elseif ($air_type_three == 'condensacao-agua-compressor-alternativo') {
            $min_efficiency_pro = 4.2;
        } elseif ($air_type_three == 'condensacao-agua-compressor-parafuso-scroll') {
            if ($ckw <= 264) {
                $min_efficiency_pro = 5.58;
            } elseif ($ckw <= 528) {
                $min_efficiency_pro = 5.71;
            } elseif ($ckw <= 1055) {
                $min_efficiency_pro = 6.06;
            } else {
                $min_efficiency_pro = 6.51;
            }
        } elseif ($air_type_three == 'condensacao-agua-compressor-centrifugo') {
            if ($ckw <= 528) {
                $min_efficiency_pro = 5.9;
            } elseif ($ckw <= 1055) {
                $min_efficiency_pro = 5.9;
            } elseif ($ckw <= 2110) {
                $min_efficiency_pro = 6.4;
            } else {
                $min_efficiency_pro = 6.52;
            }
        } elseif ($air_type_three == 'absorcao-ar-simples-efeito') {
            $min_efficiency = 0.6;
        } elseif ($air_type_three == 'absorcao-agua-simples-efeito') {
            $min_efficiency = 0.7;
        } elseif ($air_type_three == 'absorcao-agua-duplo-acionamento-indireto') {
            $min_efficiency = 1.05;
        } elseif ($air_type_three == 'absorcao-agua-duplo-acionamento-direto') {
            $min_efficiency = 1;
        }

        break;
};

$hours = $data['working_hours'] * 52;
// Eficiência base com modificador de idade (EFB)
$efb_temp = $min_efficiency * (1 - $mi);
$efb = (float)number_format($efb_temp, '2', '.', '.');
$min_efficiency = $efb;

// POTENCIAL DE ECONOMIA
$potencial_economia = (int)numberPrecision(((($min_efficiency_pro - $min_efficiency) / $min_efficiency_pro) * 100), 0, '.');

$pea_base = (float)numberPrecision(($ckw / $min_efficiency), 2, '.');
$pea_prop = (float)numberPrecision(($ckw / $min_efficiency_pro), 2, '.');
$consumo_anual_ar = $pea_base * $hours * $automation_ar;
$custo_anual_ar  = $consumo_anual_ar * $tariff;
$consumo_anual_ar_prop = $pea_prop * $hours * $automation_ar;
$custo_anual_ar_prop  = $consumo_anual_ar_prop * $tariff;

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

$ilu_F0 = ((float)$total_area) * ((float)$type_mod['ma_ilu']);

$ilu_F1 = round((($type_mod['emed']) * ($ilu_F0)) / (($ilu_values['n']) * ($ilu_values['lumens']) * ($ilu_values['fm']) * $ilu_values['ffl']));

$ilu_F2 = ($data_ilu['ptm'] * $ilu_F1 * $ilu_values['n']) / 1000;

$ilu_F3 = round(($ilu_F2 * $hours) * $automation);

$ilu_F4 = $ilu_F3 * $tariff;


$ilu_p_F1 = round(($type_mod['emed'] * $ilu_F0) / (2 * 2700 * 0.91 * 1));
$ilu_p_F2 = (float)numberPrecision(((18 * $ilu_p_F1 * 2) / 1000), 2, '.');
$ilu_p_F3 = (int)round(($ilu_p_F2 * $hours) * $automation);
$ilu_p_F4 = round($ilu_p_F3 * $tariff);

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
        "tariff" => $tariff * $ilu_p_F3,
        "F3" => $ilu_p_F3,
        "F4" => round($ilu_p_F3 * $tariff),
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

// TOMADA e OUTROS

$outros_consumo = $total_consumption_year - ($consumo_anual_ar + $ilu_calc['ilu_esa']['F3']);
$outros_tarifa = $outros_consumo * $tariff;

$cem_por = $total_consumption_year;
$porcentagem_outros = (float)numberPrecision(($outros_consumo * 100 / $cem_por), 2, '.');
$porcentagem_ar = (float)numberPrecision(($consumo_anual_ar * 100 / $cem_por), 2, '.');
$porcentagem_ilu = (float)numberPrecision(($ilu_calc['ilu_esa']['F3'] * 100 / $cem_por), 2, '.');


// GERAL

$potencial_geral = $consumo_anual_ar_prop + $ilu_calc['ilu_ep']['F3'] + $outros_consumo;

$geral_resto = $total_consumption_year - $potencial_geral;
$porcentagem_total = (int)numberPrecision(($geral_resto * 100 / $cem_por), 2, '.');

// Automação 

if ($data['automation_system'] == 'nao') {
    $consumo_anual_ar_prop = $consumo_anual_ar_prop * 0.92;
    $ilu_calc['ilu_ep']['F3'] = $ilu_calc['ilu_ep']['F3'] * 0.85;
    $ilu_p_F3 = $ilu_calc['ilu_ep']['F3'];
    $potencial_geral = $consumo_anual_ar_prop + $ilu_calc['ilu_ep']['F3'] + $outros_consumo;


    $geral_resto = $total_consumption_year - $potencial_geral;
    $porcentagem_total = (int)numberPrecision(($geral_resto * 100 / $cem_por), 2, '.');

    // Porcentagens
    $consumo_anual_ar_temp = $consumo_anual_ar - $consumo_anual_ar_prop;
    $potencial_economia = (int)numberPrecision(($consumo_anual_ar_temp * 100 / $consumo_anual_ar), 2, '.');

    $dep_porcentagem_temp = $ilu_calc['ilu_esa']['F3'] - $ilu_calc['ilu_ep']['F3'];
    $dep['dep_porcentagem'] = (int)numberPrecision(($dep_porcentagem_temp * 100 / $ilu_calc['ilu_esa']['F3']), 2, '.');
}

// Update

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
        "F3" => round($ilu_p_F3),
        "F4" => round($ilu_p_F3 * $tariff),
    ]

];

// TOMADA e OUTROS

$outros_consumo = $total_consumption_year - ($consumo_anual_ar + $ilu_calc['ilu_esa']['F3']);
$outros_tarifa = $outros_consumo * $tariff;

$cem_por = $total_consumption_year;
$porcentagem_outros = (float)numberPrecision(($outros_consumo * 100 / $cem_por), 2, '.');
$porcentagem_ar = (float)numberPrecision(($consumo_anual_ar * 100 / $cem_por), 2, '.');
$porcentagem_ilu = (float)numberPrecision(($ilu_calc['ilu_esa']['F3'] * 100 / $cem_por), 2, '.');

// GERAL

$potencial_geral = $consumo_anual_ar_prop + $ilu_calc['ilu_ep']['F3'] + $outros_consumo;

$geral_resto = $total_consumption_year - $potencial_geral;
$porcentagem_total = (int)numberPrecision(($geral_resto * 100 / $cem_por), 2, '.');
$custo_anual_ar_prop  = $consumo_anual_ar_prop * $tariff;

$dep = [
    "dep_value" => $ilu_calc['ilu_esa']['F4'] - num($ilu_calc['ilu_ep']['F4']),
    "dep_kwh_ano" => $ilu_calc['ilu_esa']['F3'] - num($ilu_calc['ilu_ep']['F3']),
    "dep_porcentagem" => $dep_porcentagem,
    "dep_porcentagem_ano" => $dep_porcentagem_ano
];

$data_full = [
    "teste" => $ilu_p_F3,
    "Tarifa" => $tariff,
    "dep" => $dep,
    "lamp calc" => $ilu_calc,
    "ilu" => $ilu_values,
    "Tipo de lampada" => $type_ilu,
    "Values Lamp" => $data_ilu,
    "Area Total" => $total_area,
    "potencial geral" => $potencial_geral,
    "porcen outros" => $porcentagem_outros,
    "OUTROS CONSUMO" => $outros_consumo,
    "OUTROS TARIFA" => $outros_tarifa,
    "CUSTO ANUAL" => $custo_anual_ar,
    "CUSTO ILU" => $ilu_F4,
    "EFB" => $efb,
    "PEA BASE" => $pea_base,
    "PEA PROPOSTO" => $pea_prop,
    "MIN_EFF" => $min_efficiency,
    "MIN_EFF_PRO" => $min_efficiency_pro,
    "pep" => ($min_efficiency_pro - $min_efficiency) / $min_efficiency_pro,
    "POTENCIAL DE ECONOMIA" => $potencial_economia,
    "CONSUMO ANUAL" => $consumo_anual_ar,

    "CONSUMO ANUAL PROP" => $consumo_anual_ar_prop,
    "CUSTO ANUAL PROPOSTO" => $custo_anual_ar_prop,
    "TXAR" => $txar,
    "CPTR" => $cptr,
    "ckw" => $ckw,
    "nivel" => $nivel,
    "mi" => $mi,
    "efb" => $efb,
    "min_efficiency_pro" => $min_efficiency_pro,
    "pea base" => $pea_base,
    "pea prop" => $pea_prop,
    "hora" => $hours,
    "Consumo anual" => $consumo_anual_ar,
    "Custo anual" => $custo_anual_ar,
    "Consumo prop" => $consumo_anual_ar_prop,
    "Custo prop" => $custo_anual_ar_prop,
    "PE kWh" => $consumo_anual_ar - $consumo_anual_ar_prop,
    "PEC" => $custo_anual_ar - $custo_anual_ar_prop,
    "CDavc" => $consumo_anual_ar / $total_consumption_year
];

$data_full_2 = [
    "total_area_cond" => $total_area_cond,
    "Tarifa" => $tariff,
    "dep" => $dep,
    "lamp calc" => $ilu_calc,
    "ilu" => $ilu_values,
    "Tipo de lampada" => $type_ilu,
    "Values Lamp" => $data_ilu,
    "Area Total" => $total_area,
    "potencial geral" => $potencial_geral,
    "porcen outros" => $porcentagem_outros,
    "OUTROS CONSUMO" => $outros_consumo,
    "OUTROS TARIFA" => $outros_tarifa,
    "CUSTO ANUAL" => $custo_anual_ar,
    "CUSTO ILU" => $ilu_F4,
    "EFB" => $efb,
    "PEA BASE" => $pea_base,
    "PEA PROPOSTO" => $pea_prop,
    "MIN_EFF" => $min_efficiency,
    "MIN_EFF_PRO" => $min_efficiency_pro,
    "POTENCIAL DE ECONOMIA" => $potencial_economia,
    "CONSUMO ANUAL" => $consumo_anual_ar,

    "CONSUMO ANUAL PROP" => $consumo_anual_ar_prop,
    "CUSTO ANUAL PROPOSTO" => $custo_anual_ar_prop,
    "TXAR" => $txar,
    "CPTR" => $cptr,
    "ckw" => $ckw,
    "nivel" => $nivel,
    "mi" => $mi,
    "efb" => $efb,
    "min_efficiency_pro" => $min_efficiency_pro,
    "pea base" => $pea_base,
    "pea prop" => $pea_prop,
    "hora" => $hours,
    "Consumo anual" => $consumo_anual_ar,
    "Custo anual" => $custo_anual_ar,
    "Consumo prop" => $consumo_anual_ar_prop,
    "Custo prop" => $custo_anual_ar_prop,
    "PE kWh" => $consumo_anual_ar - $consumo_anual_ar_prop,
    "PEC" => $custo_anual_ar - $custo_anual_ar_prop,
    "CDavc" => $consumo_anual_ar / $total_consumption_year
];

///

switch ($type_public_property) {
    case ($type_public_property == 'Clinica'):
        $type_ben = [
            "menor_consumo" => 70,
            "tipico_consumo" => 103,
            "maior_consumo" => 147
        ];
        break;
    case ($type_public_property == 'Escola'):
        $type_ben = [
            "menor_consumo" => 5,
            "tipico_consumo" => 38,
            "maior_consumo" => 80
        ];
        $txar = 16.13;
        break;
    case ($type_public_property == 'Ed. ADM'):
        $type_ben = [
            "menor_consumo" => 4,
            "tipico_consumo" => 30,
            "maior_consumo" => 97
        ];
        break;
};


$consumo_especifico = (int)($total_consumption_year / $total_area);
$calculo_bench = number_format(($consumo_especifico / $type_ben['tipico_consumo']) - 1, 2, '', '');

?>

<div class="hcf_box">
    <style scoped>
        .hcf_box {
            display: grid;
            grid-template-columns: max-content 1fr;
            grid-row-gap: 10px;
            grid-column-gap: 20px;
        }

        .hcf_field {
            display: contents;
        }
    </style>
    <?php// if(!empty($total_consumption_year )) :?>
    <p class="meta-options hcf_field">
        <label for="hcf_tipo_imovel">Tipo de imóvel</label>
        <input id="hcf_tipo_imovel" type="text" name="hcf_tipo_imovel" value="<?= $type_public_property; ?>">
    </p>
    <p class="meta-options hcf_field">
        <label for="hcf_consumo_total_ano">Consumo total do imóvel</label>
        <input id="hcf_consumo_total_ano" type="text" name="hcf_consumo_total_ano" value="<?= kwh($total_consumption_year); ?> kWh/ano">
    </p>
    <p class="meta-options hcf_field">
        <label for="hcf_consumo_min_tipologia">Consumo mínimo da tipologia</label>
        <input id="hcf_consumo_min_tipologia" type="text" name="hcf_consumo_min_tipologia" value="<?= $type_ben['menor_consumo'] ?> kWh/m²/ano">
    </p>
    <p class="meta-options hcf_field">
        <label for="hcf_consumo_medio">Consumo médio do imóvel (m2)</label>
        <input id="hcf_consumo_medio" type="text" name="hcf_consumo_medio" value="<?= $consumo_especifico ?> kWh/m²/ano">
    </p>
    <p class="meta-options hcf_field">
        <label for="hcf_consumo_max_tipologia">Consumo máximo da tipologia</label>
        <input id="hcf_consumo_max_tipologia" type="text" name="hcf_consumo_max_tipologia" value="<?= $type_ben['maior_consumo'] ?> kWh/m²/ano">
    </p>
    <p class="meta-options hcf_field">
        <label for="hcf_eficiencia_ar">Eficiência geral Ar Condicionado</label>
        <input id="hcf_eficiencia_ar" type="text" name="hcf_eficiencia_ar" value="<?= $potencial_economia; ?>%">
    </p>
    <p class="meta-options hcf_field">
        <label for="hcf_eficiencia_ilu">Eficiência geral iluminação</label>
        <input id="hcf_eficiencia_ilu" type="text" name="hcf_eficiencia_ilu" value="<?= $dep['dep_porcentagem']; ?>%">
    </p>
    <?php //else:?>
      
    <?php //endif;?>
</div>