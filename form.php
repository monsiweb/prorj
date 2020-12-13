<?php /* Template Name: form */ ?>
<?php get_header(); ?>
<section class="form form-residencial">
    <div class="container">
        <form action="<?php echo site_url() . '/wp-admin/admin-post.php'; ?>" method="POST" id="form-prorio">
            <input type="hidden" name="action" value="add_imovel">
            <section class="form form-residencial">
                <div class="container">
                    <div class="d-flex justify-content-center">
                        <h1 class="title--primary" id="title-form">Preencha seu imóvel</h1>
                    </div>
                    <div id="form-prorio-content">
                        <h3 class="form__item__header">Passo 1</h3>
                        <section>
                            <div class="fase1">
                                <p class="form__row__title">O preenchimento é voluntário<br /> ou autovistoria?</p>
                                <div class="form-group form__width">
                                    <div class="checkbox__input">
                                        <div class="pretty p-default p-thick p-smooth">
                                            <input type="radio" name="voluntary_self_inspection" value="voluntario" id="voluntario" onclick="ShowHideDiv()" />
                                            <div class="state p-warning-o">
                                                <label for="voluntario">Voluntário</label>
                                            </div>
                                        </div>
                                        <div class="pretty p-default p-thick p-smooth">
                                            <input type="radio" name="voluntary_self_inspection" value="autovistoria" id="autovistoria" onclick="ShowHideDiv()" />
                                            <div class="state p-warning-o">
                                                <label for="autovistoria">Autovistoria</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-left form__width" id="process_number_content">
                                    <label for="process_number">Número do processo</label>
                                    <input type="text" class="input__rio" name="process_number" id="process_number">
                                </div>
                                <div class="form-group mt-5">
                                    <p class="form__row__title--two text-center">Qual o tipo de imóvel?</p>
                                    <div class="radio__group form__width--two mt-5">
                                        <div class="radio__content">
                                            <label>
                                                <input type="radio" name="type_of_property" value="residencial" id="imovel-residencial" onclick="ShowHideDiv()">
                                                <div class="radio__item">
                                                    <img src="<?= get_template_directory_uri(); ?>/assets/images/residencial_ico.svg" alt="Residencial">
                                                    <p class="radio__item__title">Residencial</p>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="radio__content">
                                            <label>
                                                <input type="radio" name="type_of_property" value="publico" id="imovel-publico" onclick="ShowHideDiv()">
                                                <div class="radio__item">
                                                    <img src="<?= get_template_directory_uri(); ?>/assets/images/publico_ico.svg" alt="Publico">
                                                    <p class="radio__item__title">Público</p>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="radio__content">
                                            <label>
                                                <input type="radio" name="type_of_property" value="comercial" id="imovel-comercial" onclick="ShowHideDiv()">
                                                <div class="radio__item">
                                                    <img src="<?= get_template_directory_uri(); ?>/assets/images/comercial_ico.svg" alt="Comercial">
                                                    <p class="radio__item__title">Comercial</p>
                                                </div>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="input__extra" id="imovel-publico-content">
                                        <p class="form__row__title--three text-center">Qual o tipo de imóvel
                                            público?</p>
                                        <div class="radio__group">
                                            <div class="radio__content">
                                                <label>
                                                    <input type="radio" name="type_public_property" value="imovel-publico-clinica">
                                                    <div class="radio__item">
                                                        <img src="<?= get_template_directory_uri(); ?>/assets/images/clinica_ico.svg" alt="Clinica">
                                                        <p class="radio__item__title">Clínica</p>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="radio__content">
                                                <label>
                                                    <input type="radio" name="type_public_property" value="imovel-publico-escola">
                                                    <div class="radio__item">
                                                        <img src="<?= get_template_directory_uri(); ?>/assets/images/escola_ico.svg" alt="Escola">
                                                        <p class="radio__item__title">Escola</p>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="radio__content">
                                                <label>
                                                    <input type="radio" name="type_public_property" value="imovel-publico-adm">
                                                    <div class="radio__item">
                                                        <img src="<?= get_template_directory_uri(); ?>/assets/images/edadm_ico.svg" alt="Ed. ADM">
                                                        <p class="radio__item__title">Ed. ADM</p>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="radio__content">
                                                <label>
                                                    <input type="radio" name="type_public_property" value="imovel-publico-outros">
                                                    <div class="radio__item">
                                                        <img src="<?= get_template_directory_uri(); ?>/assets/images/outros_ico.svg" alt="Outros">
                                                        <p class="radio__item__title">Outros</p>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input__extra" id="imovel-comercial-content">
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="IPTU">IPTU</label>
                                                        <input class="input__rio" type="text" name="iptu">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="client_light">Cliente Light</label>
                                                        <input class="input__rio" type="text" name="client_light">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cep">CEP</label>
                                                        <input class="input__rio" type="text" name="cep">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="address">Endereço</label>
                                                        <input class="input__rio" type="text" name="address">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-6 mx-auto">
                                                    <select class="input__rio--select" name="x" id="x">
                                                        <option value="x">Clínica</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <h3 class="form__item__header">Passo 2</h3>
                        <section>
                            <div class="fase2" id="fase__2">
                                <p class="form__row__title">Dados do imóvel</p>
                                <div class="form-row mb-3">
                                    <div class="col-6 text-left">
                                        <div class="form-group">
                                            <label for="name_of_property" class="mb-1">Nome do imóvel </label>
                                            <input type="text" class="input__rio" name="name_of_property" id="name_of_property">
                                        </div>
                                    </div>
                                    <div class="col-6 text-left">
                                        <div class="form-group">
                                            <label for="" class="mb-1">IPTU </label>
                                            <input type="text" class="input__rio" name="iptu">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row mb-3">
                                    <div class="col-6 text-left">
                                        <div class="form-group">
                                            <label for="" class="mb-1">CEP</label>
                                            <input type="text" class="input__rio" name="cep">
                                        </div>
                                    </div>
                                    <div class="col-6 text-left">
                                        <div class="form-group">
                                            <label for="" class="mb-1">Endereço</label>
                                            <input type="text" class="input__rio" name="address">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row mb-3">
                                    <div class="col-6 text-left">
                                        <div class="form-group">
                                            <label for="" class="mb-1">Cliente light</label>
                                            <input type="text" class="input__rio" name="client_light">
                                        </div>
                                    </div>
                                    <div class="col-6 text-left">
                                        <div class="form-group">
                                            <label for="" class="mb-1">Faixa de renda</label>
                                            <input type="text" class="input__rio money" name="income_range">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="fase2__two">
                                <div class="mb-5">
                                    <div class="form__section__title">
                                        <p class="form__row__title">Dados de área</p>
                                    </div>
                                    <div class="form-row mb-3">
                                        <div class="col-md-6 text-left">
                                            <div class="form-group">
                                                <label for="" class="mb-1">Área total do imóvel</label>
                                                <div class="input__text">
                                                    <span class="text--input">m²</span>
                                                    <input type="text" class="input__rio" name="total_place_area">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-left">
                                            <div class="form-group">
                                                <label for="" class="mb-1">Área condicionada do imóvel <span class="text--optional">(opcional)</span></label>
                                                <div class="input__text">
                                                    <span class="text--input">m²</span>
                                                    <input type="text" class="input__rio" name="total_conditioned_area">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row mb-3">
                                        <div class="col-md-6 mx-auto">
                                            <div class="form-group">
                                                <label for="number_of_floors" class="mb-1">Número de andares</label>
                                                <input type="text" class="input__rio" name="number_of_floors">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-5">
                                    <div class="form__section__title">
                                        <p class="form__row__title">Dados de ocupação</p>
                                    </div>

                                    <div class="form-row mb-3">
                                        <div class="col-md-6 text-left">
                                            <label for="" class="mb-1">Número médio de ocupantes/dia útil</label>
                                            <input type="text" class="input__rio" name="occupants_useful_day">
                                        </div>
                                        <div class="col-md-6 text-left">
                                            <label for="" class="mb-1">Horário de funcionamento</label>
                                            <div class="input__text">
                                                <span class="text--input">semanais</span>
                                                <input type="text" class="input__rio" name="working_hours">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row mb-3">
                                        <div class="col-md-6 mx-auto">
                                            <label for="percentage_occupancy" class="mb-1">Taxa de ocupação percentual</label>
                                            <div class="input__text">
                                                <span class="text--input">%</span>
                                                <input type="text" class="input__rio" name="percentage_occupancy" id="percentage_occupancy">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </section>
                        <h3 class="form__item__header">Passo 3</h3>
                        <section>
                            <div id="fase__3" class="fase3">
                                <p class="form__row__title">Dados do imóvel</p>
                                <div class="form-group w-50 m-auto">
                                    <label for="">Qual o tipo de uso do imóvel?</label>
                                    <select name="qual_o_tipo_de_uso_de_imovel" id="" class="input__rio--select">
                                        <option value="finais-de-semana">Finais de semana</option>
                                        <option value="principal">Principal</option>
                                    </select>
                                </div>
                                <div class="form-row mt-4">
                                    <div class="col-6 text-left">
                                        <label for="" class="mb-1">Valor da última conta</label>
                                        <div class="input__text">
                                            <span class="text--input">kWh/ano</span>
                                            <input type="text" class="input__rio" name="valor_da_ultima_conta">
                                        </div>
                                    </div>
                                    <div class="col-6 text-left">
                                        <label for="" class="mb-1">Mês da conta</label>
                                        <select name="mes_da_conta" id="" class="input__rio--select">
                                            <option value="janeiro">Janeiro</option>
                                            <option value="fevereiro">Fevereiro</option>
                                            <option value="marco">Março</option>
                                            <option value="abril">Abril</option>
                                            <option value="maio">Maio</option>
                                            <option value="junho">Junho</option>
                                            <option value="julho">Julho</option>
                                            <option value="agosto">Agosto</option>
                                            <option value="setembro">Setembro</option>
                                            <option value="outubro">Outubro</option>
                                            <option value="novembro">Novembro</option>
                                            <option value="dezembro">Dezembro</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row mt-4">
                                    <div class="col-6 text-left">
                                        <label for="" class="mb-1">Consumo médio anual</label>
                                        <div class="input__text">
                                            <span class="text--input">kWh/ano</span>
                                            <input type="text" class="input__rio" name="consumo_total_anual">
                                        </div>
                                    </div>
                                    <div class="col-6 text-left">
                                        <label for="" class="mb-1">Tarifa de energia</label>
                                        <div class="input__text">
                                            <span class="text--input">R$/kWh</span>
                                            <input type="text" class="input__rio" name="tarifa_de_energia">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="fase3__two">
                                <div class="mb-5">
                                    <div class="form__section__title">
                                        <p class="form__row__title">Dados de consumo</p>
                                        <span class="form__row__title__subtitle">Tenha em mãos a conta de luz</span>
                                    </div>

                                    <div class="form-row mb-3">
                                        <div class="col-md-6 m-auto">
                                            <div class="form-group">
                                                <label for="consumption_data">Tipo / Subgrupo</label>
                                                <select name="consumption_data" id="consumption_data" class="input__rio--select" onchange="showDiv('A1__item', this, 'Bx__item')">
                                                    <option value="null">Selecione</option>
                                                    <option id="a1_value" value="A">A</option>
                                                    <option id="bx_value" value="B">B</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="A1__item" class="mb-md-5">

                                    <div class="form__section__title">
                                        <p class="form__row__title">Alta tensão</p>
                                    </div>

                                    <div class="form-row mb-3">
                                        <div class="col-md-6 m-auto">
                                            <div class="form-group">
                                                <label for="hired_demand" class="mb-1">Demanda contratada</label>
                                                <div class="input__text">
                                                    <span class="text--input">kW</span>
                                                    <input type="text" class="input__rio mask-value" name="hired_demand" id="hired_demand">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row mb-3">
                                        <div class="col-md-6 text-left">
                                            <div class="form-group">
                                                <label for="rush_hour_consumption" class="mb-1">Consumo horário de ponta</label>
                                                <div class="input__text">
                                                    <span class="text--input">kWh</span>
                                                    <input type="text" class="input__rio mask-value" name="rush_hour_consumption" id="rush_hour_consumption">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-left">
                                            <div class="form-group">
                                                <label for="off_time_consumption" class="mb-1">Consumo horário fora de ponta</label>
                                                <div class="input__text">
                                                    <span class="text--input">kWh</span>
                                                    <input type="text" class="input__rio mask-value" name="off_time_consumption" id="off_time_consumption">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row mb-3">
                                        <div class="col-md-6 text-left">
                                            <div class="form-group">
                                                <label for="last_account_value" class="mb-1">Valor da última conta</label>
                                                <div class="input__text">
                                                    <span class="text--input">R$</span>
                                                    <input type="text" class="input__rio money" name="last_account_value" id="last_account_value">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-left">
                                            <div class="form-group">
                                                <label for="month_of_invoice" class="mb-1">Mês da fatura</label>
                                                <select name="month_of_invoice" id="month_of_invoice" class="input__rio--select">
                                                    <option value="janeiro">Janeiro</option>
                                                    <option value="fevereiro">Fevereiro</option>
                                                    <option value="marco">Março</option>
                                                    <option value="abril">Abril</option>
                                                    <option value="maio">Maio</option>
                                                    <option value="junho">Junho</option>
                                                    <option value="julho">Julho</option>
                                                    <option value="agosto">Agosto</option>
                                                    <option value="setembro">Setembro</option>
                                                    <option value="outubro">Outubro</option>
                                                    <option value="novembro">Novembro</option>
                                                    <option value="dezembro">Dezembro</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="Bx__item" class="mb-5">

                                    <div class="form__section__title">
                                        <p class="form__row__title">Baixa tensão</p>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-6 mx-auto my-3">
                                            <div class="form-group">
                                                <label for="total_consumption_value" class="mb-1">Consumo total da conta</label>
                                                <div class="input__text">
                                                    <span class="text--input">kWh</span>
                                                    <input type="text" class="input__rio mask-value" name="total_consumption_value" id="total_consumption_value">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row mb-3">
                                        <div class="col-md-6 text-left">
                                            <div class="form-group">
                                                <label for="last_energy_bill" class="mb-1">Valor última conta de energia do imóvel</label>
                                                <div class="input__text">
                                                    <span class="text--input">R$</span>
                                                    <input type="text" class="input__rio money" name="last_energy_bill" id="last_energy_bill">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-left">
                                            <div class="form-group">
                                                <label for="account_month_a1" class="mb-1">Mês da conta</label>
                                                <select name="account_month_a1" id="account_month_a1" class="input__rio--select">
                                                    <option value="janeiro">Janeiro</option>
                                                    <option value="fevereiro">Fevereiro</option>
                                                    <option value="marco">Março</option>
                                                    <option value="abril">Abril</option>
                                                    <option value="maio">Maio</option>
                                                    <option value="junho">Junho</option>
                                                    <option value="julho">Julho</option>
                                                    <option value="agosto">Agosto</option>
                                                    <option value="setembro">Setembro</option>
                                                    <option value="outubro">Outubro</option>
                                                    <option value="novembro">Novembro</option>
                                                    <option value="dezembro">Dezembro</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <h3 class="form__item__header">Passo 4</h3>
                        <section>
                            <div class="fase4" style="display: none">
                                <p class="form__row__title">Ar condicionado</p>
                                <div class="form-group">
                                    <label for="" class="text-center w-100">Qual tipo predominante de ar
                                        condicionado?</label>
                                    <select name="qual_tipo_predominante_de_ar_condicionado" id="" class="input__rio--select">
                                        <option value="split">Split</option>
                                        <option value="janela">Janela</option>
                                        <option value="split-inverter">Split inverter</option>
                                        <option value="vrf">VRF</option>
                                        <option value="chiller">Chiller</option>
                                    </select>
                                </div>
                                <div class="form-group w-75 m-auto">
                                    <label for="">Idade média dos equipamentos de ar condicionado?</label>
                                    <div class="input__text">
                                        <span class="text--input">anos</span>
                                        <input type="text" class="input__rio" name="idade_media_dos_equipamentos_de_ar_condicionado">
                                    </div>
                                    <div class="form-group w-75 m-auto">
                                        <label for="">Idade média dos equipamentos de ar condicionado?</label>
                                        <div class="input__text">
                                            <span class="text--input">anos</span>
                                            <input type="text" class="input__rio" name="idade_media_dos_equipamentos_de_ar_condicionado">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="checkbox__input">
                                            <div class="pretty p-default p-thick p-smooth">
                                                <input type="checkbox" name="nao_possuo_ar" value="nao_possuo" />
                                                <div class="state p-warning-o">
                                                    <label for="nao_possuo_ar">Não Possuo ar</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="fase4-v2">
                                <div class="form-group mt-5">
                                    <p class="form__row__title--two text-center"> Qual tipo predominante de ar condicionado? </p>
                                    <div class="radio__group form__width--two mt-5">
                                        <div class="radio__content">
                                            <label>
                                                <input type="radio" name="predominant_air_conditioning" value="janela" onclick="ShowHideDiv()">
                                                <div class="radio__item">
                                                    <p class="radio__item__title">Janela</p>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="radio__content">
                                            <label>
                                                <input type="radio" name="predominant_air_conditioning" value="split" onclick="ShowHideDiv()">
                                                <div class="radio__item">
                                                    <p class="radio__item__title">Split</p>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="radio__content">
                                            <label>
                                                <input type="radio" name="predominant_air_conditioning" value="split-inverter" onclick="ShowHideDiv()">
                                                <div class="radio__item">
                                                    <p class="radio__item__title">Split Inverter</p>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="radio__group form__width--two mt-5">
                                        <div class="radio__content">
                                            <label>
                                                <input type="radio" name="predominant_air_conditioning" value="vrf" id="air_conditioning-vrf" onclick="ShowHideDiv()">
                                                <div class="radio__item">
                                                    <p class="radio__item__title">VRF</p>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="radio__content">
                                            <label>
                                                <input type="radio" name="predominant_air_conditioning" value="chiller" id="air_conditioning-chiller" onclick="ShowHideDiv()">
                                                <div class="radio__item">
                                                    <p class="radio__item__title">Chiller</p>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="input__extra" id="air_conditioning-content">
                                        <select name="predominant_air_conditioning_two" class="input__rio--select">
                                            <option value="condensacao-a-ar">Com condensação a ar</option>
                                            <option value="condensacao-a-agua">Com condensação a água</option>
                                        </select>
                                    </div>
                                    <div class="input__extra" id="air_conditioning-content-two">
                                        <select name="predominant_air_conditioning_three" class="input__rio--select">
                                            <option value="condensacao-ar-com-condensador">Condesação a ar com condensador</option>
                                            <option value="condensacao-ar-sem-condensador">Condesação a ar sem condensador</option>
                                            <option value="condensacao-agua-compressor-alternativo">Condesação a água (Compressor alternativo)</option>
                                            <option value="condensacao-agua-compressor-parafuso-scroll">Condesação a água (Compressor do tipo parafuso e scroll)</option>
                                            <option value="condensacao-agua-compressor-centrifugo">Condesação a água (Compressor centrifugo)</option>
                                            <option value="absorcao-ar-simples-efeito">Absorção a ar de simples efeito</option>
                                            <option value="absorcao-agua-simples-efeito">Absorção a água de simples efeito</option>
                                            <option value="absorcao-agua-duplo-acionamento-indireto">Absorção a água de duplo efeito e acionamento indireto</option>
                                            <option value="absorcao-agua-duplo-acionamento-direto">Absorção a água de duplo efeito e acionamento direto</option>
                                        </select>
                                    </div>
                                    <div class="form-group w-35 m-auto">
                                        <label class="mt-5" for="air_age_equipment">Idade média dos equipamentos de ar condicionado?</label>
                                        <div class="input__text">
                                            <span class="text--input">anos</span>
                                            <input type="text" class="input__rio" name="air_age_equipment">
                                        </div>
                                    </div>
                                    <p class="form__row__title--two text-center mt-5">Possui sistema de automação?</p>
                                    <div class="radio__group form__width--two mt-5">
                                        <div class="radio__content">
                                            <label>
                                                <input type="radio" name="automation_system" value="sim" id="automation-system" onclick="ShowHideDiv()">
                                                <div class="radio__item">
                                                    <p class="radio__item__title">Sim</p>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="radio__content">
                                            <label>
                                                <input type="radio" name="automation_system" value="nao" onclick="ShowHideDiv()">
                                                <div class="radio__item">
                                                    <p class="radio__item__title">Não</p>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="input__extra" id="automation-system-content">
                                        <div class="form-group form__width">
                                            <p class="form__row__title--three text-center">Possui sistema de liga/desliga horário?</p>
                                            <div class="checkbox__input">
                                                <div class="pretty p-default p-thick p-smooth">
                                                    <input type="radio" name="on_off_system" value="sim">
                                                    <div class="state p-warning-o">
                                                        <label for="sim">Sim</label>
                                                    </div>
                                                </div>
                                                <div class="pretty p-default p-thick p-smooth">
                                                    <input type="radio" name="on_off_system" value="nao">
                                                    <div class="state p-warning-o">
                                                        <label for="nao">Não</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group form__width">
                                            <p class="form__row__title--three text-center">Possui sistema de controle de temperatura?</p>
                                            <div class="checkbox__input">
                                                <div class="pretty p-default p-thick p-smooth">
                                                    <input type="radio" name="temperature_control" value="sim" id="temperature_control_yes">
                                                    <div class="state p-warning-o">
                                                        <label for="temperature_control_yes">Sim</label>
                                                    </div>
                                                </div>
                                                <div class="pretty p-default p-thick p-smooth">
                                                    <input type="radio" name="temperature_control" value="nao" id="temperature_control_no">
                                                    <div class="state p-warning-o">
                                                        <label for="temperature_control_no">Não</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="checkbox__input">
                                        <div class="pretty p-default p-thick p-smooth">
                                            <input type="checkbox" name="do_not_have" value="do-not-have" />
                                            <div class="state p-warning-o">
                                                <label for="do-not-have">Não tenho ar condicionado</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <h3 class="form__item__header">Passo 5</h3>
                        <section>
                            <div class="fase5">
                                <p class="form__row__title text-center w-100">Iluminação</p>
                                <div class="form-group">
                                    <label for="" class="text-center w-100">Qual tipo de iluminação
                                        predominante?</label>
                                    <select name="predominant_type_illumination" id="predominant_type_illumination" class="input__rio--select">
                                        <option value="incandescente">Incandescente</option>
                                        <option value="mista">Mista</option>
                                        <option value="mercurio">Mercúrio</option>
                                        <option value="fluorescente-compacta">Fluorescente compacta</option>
                                        <option value="vapor-metalico">Vapor metálico</option>
                                        <option value="fluorescente-tubular">Fluorescente tubular</option>
                                        <option value="vapor-de-sodio">Vapor de sódio</option>
                                        <option value="led-18w">LED 18w</option>
                                    </select>
                                </div>
                        </section>
                        <h3 class="form__item__header">Passo 6</h3>
                        <section>
                            <div class="fase6">
                                <div class="form-group">
                                    <label for="has_photovoltaic_panels">Possui painéis fotovoltaicos?</label>
                                    <div class="checkbox__input">
                                        <div class="pretty p-default p-thick p-smooth">
                                            <input type="radio" name="has_photovoltaic_panels" value="sim" />
                                            <div class="state p-warning-o">
                                                <label for="sim">Sim</label>
                                            </div>
                                        </div>
                                        <div class="pretty p-default p-thick p-smooth">
                                            <input type="radio" name="has_photovoltaic_panels" value="nao" />
                                            <div class="state p-warning-o">
                                                <label for="nao">Não</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="panels_water_heating">Possui painéis solares para aquecimento de água?</label>
                                    <div class="checkbox__input">
                                        <div class="pretty p-default p-thick p-smooth">
                                            <input type="radio" name="panels_water_heating" value="sim" />
                                            <div class="state p-warning-o">
                                                <label for="sim">Sim</label>
                                            </div>
                                        </div>
                                        <div class="pretty p-default p-thick p-smooth">
                                            <input type="radio" name="panels_water_heating" value="nao" />
                                            <div class="state p-warning-o">
                                                <label for="nao">Não</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Área total disponível na cobertura/telhados?</label>
                                    <div class="input__text">
                                        <span class="text--input">m²</span>
                                        <input type="text" class="input__rio" name="available_on_rooftops">
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </section>
        </form>
    </div>
</section>

<!-- FORM -->

<!-- END -->


<?php get_footer();
