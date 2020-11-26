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
                                            <input type="radio" name="voluntario_autovistoria" value="voluntario" id="voluntario" onclick="ShowHideDiv()" />
                                            <div class="state p-warning-o">
                                                <label for="voluntario">Voluntário</label>
                                            </div>
                                        </div>
                                        <div class="pretty p-default p-thick p-smooth">
                                            <input type="radio" name="voluntario_autovistoria" value="autovistoria" id="autovistoria" onclick="ShowHideDiv()" />
                                            <div class="state p-warning-o">
                                                <label for="autovistoria">Autovistoria</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-left form__width" id="numeroprocesso-content">
                                    <label for="#">Número do processo</label>
                                    <input type="text" class="input__rio" name="numeroprocesso" id="numeroprocesso">
                                </div>
                                <div class="form-group mt-5">
                                    <p class="form__row__title--two text-center">Qual o tipo de imóvel?</p>
                                    <div class="radio__group form__width--two mt-5">
                                        <div class="radio__content">
                                            <label>
                                                <input type="radio" name="tipoimovel" value="residencial" id="imovel-residencial" onclick="ShowHideDiv()">
                                                <div class="radio__item">
                                                    <img src="https://www.flaticon.com/svg/static/icons/svg/25/25694.svg" alt="">
                                                    <p class="radio__item__title">Residencial</p>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="radio__content">
                                            <label>
                                                <input type="radio" name="tipoimovel" value="publico" id="imovel-publico" onclick="ShowHideDiv()">
                                                <div class="radio__item">
                                                    <img src="https://www.flaticon.com/svg/static/icons/svg/25/25694.svg" alt="">
                                                    <p class="radio__item__title">Público</p>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="radio__content">
                                            <label>
                                                <input type="radio" name="tipoimovel" value="comercial" id="imovel-comercial" onclick="ShowHideDiv()">
                                                <div class="radio__item">
                                                    <img src="https://www.flaticon.com/svg/static/icons/svg/25/25694.svg" alt="">
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
                                                    <input type="radio" name="tipoimovelpublico" value="imovel-publico-clinica">
                                                    <div class="radio__item">
                                                        <img src="https://www.flaticon.com/svg/static/icons/svg/25/25694.svg" alt="">
                                                        <p class="radio__item__title">Clínica</p>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="radio__content">
                                                <label>
                                                    <input type="radio" name="tipoimovelpublico" value="imovel-publico-escola">
                                                    <div class="radio__item">
                                                        <img src="https://www.flaticon.com/svg/static/icons/svg/25/25694.svg" alt="">
                                                        <p class="radio__item__title">Escola</p>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="radio__content">
                                                <label>
                                                    <input type="radio" name="tipoimovelpublico" value="imovel-publico-adm">
                                                    <div class="radio__item">
                                                        <img src="https://www.flaticon.com/svg/static/icons/svg/25/25694.svg" alt="">
                                                        <p class="radio__item__title">Ed. ADM</p>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="radio__content">
                                                <label>
                                                    <input type="radio" name="tipoimovelpublico" value="imovel-publico-outros">
                                                    <div class="radio__item">
                                                        <img src="https://www.flaticon.com/svg/static/icons/svg/25/25694.svg" alt="">
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
                                                        <label for="cliente-light">Cliente Light</label>
                                                        <input class="input__rio" type="text" name="cliente-light">
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
                                                        <label for="endereco">Endereço</label>
                                                        <input class="input__rio" type="text" name="endereco">
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
                            <div class="fase2">
                                <p class="form__row__title">Dados do imóvel</p>
                                <div class="form-row mb-3">
                                    <div class="col-6 text-left">
                                        <label for="" class="mb-1">Nome do imóvel </label>
                                        <input type="text" class="input__rio" name="nome_do_imovel">
                                    </div>
                                    <div class="col-6 text-left">
                                        <label for="" class="mb-1">IPTU </label>
                                        <input type="text" class="input__rio" name="iptu">
                                    </div>
                                </div>
                                <div class="form-row mb-3">
                                    <div class="col-6 text-left">
                                        <label for="" class="mb-1">CEP</label>
                                        <input type="text" class="input__rio" name="cep">
                                    </div>
                                    <div class="col-6 text-left">
                                        <label for="" class="mb-1">Endereço</label>
                                        <input type="text" class="input__rio" name="endereco">
                                    </div>
                                </div>
                                <div class="form-row mb-3">
                                    <div class="col-6 text-left">
                                        <label for="" class="mb-1">Cliente light</label>
                                        <input type="text" class="input__rio" name="cliente_light">
                                    </div>
                                    <div class="col-6 text-left">
                                        <label for="" class="mb-1">Faixa de renda</label>
                                        <input type="text" class="input__rio" name="faixa_de_renda">
                                    </div>
                                </div>
                            </div>
                        </section>
                        <h3 class="form__item__header">Passo 3</h3>
                        <section>
                            <div class="fase3">
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
                        </section>
                        <h3 class="form__item__header">Passo 4</h3>
                        <section>
                            <div class="fase4">
                                <p class="form__row__title">Ar condicionado</p>
                                <div class="form-group">
                                    <label for="" class="text-center w-100">Qual tipo predominante de ar
                                        condicionado? </label>
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
                        </section>
                        <h3 class="form__item__header">Passo 5</h3>
                        <section>
                            <div class="fase5">
                                <p class="form__row__title text-center w-100">Iluminação</p>
                                <div class="form-group">
                                    <label for="" class="text-center w-100">Qual tipo de iluminação
                                        predominante?</label>
                                    <select name="qual_o_tipo_de_iluminacao_predominante" id="" class="input__rio--select">
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
                            </div>
                        </section>
                        <h3 class="form__item__header">Passo 6</h3>
                        <section>
                            <div class="fase6">
                                <div class="form-group">
                                    <label for="">Possui painéis fotovoltaicos?</label>
                                    <div class="checkbox__input">
                                        <div class="pretty p-default p-thick p-smooth">
                                            <input type="radio" name="possui_paineis_fotovoltaicos" value="sim" />
                                            <div class="state p-warning-o">
                                                <label for="sim">Sim</label>
                                            </div>
                                        </div>
                                        <div class="pretty p-default p-thick p-smooth">
                                            <input type="radio" name="possui_paineis_fotovoltaicos" value="nao" />
                                            <div class="state p-warning-o">
                                                <label for="nao">Não</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Possui painéis solares para aquecimento de água?</label>
                                    <div class="checkbox__input">
                                        <div class="pretty p-default p-thick p-smooth">
                                            <input type="radio" name="possui_paineis_solares_para_aquecimento_de_agua" value="sim" id="sim" />
                                            <div class="state p-warning-o">
                                                <label for="sim">Sim</label>
                                            </div>
                                        </div>
                                        <div class="pretty p-default p-thick p-smooth">
                                            <input type="radio" name="possui_paineis_solares_para_aquecimento_de_agua" value="nao" id="nao" />
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
                                        <input type="text" class="input__rio" name="area_total_disponivel_na_coberturatelhados">
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
