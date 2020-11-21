<?php /* Template Name: form */ ?>
<?php get_header(); ?>

<section class="form form-residencial">
  <div class="container">
    <div class="fase2">
      <h3>Dados do imóvel</h3>
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
    <div class="fase3">
      <h3>Dados do imóvel</h3>
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
          <select name="" id="" class="input__rio--select">
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
            <input type="text" class="input__rio" name="tarefa_de_energia">
          </div>
        </div>
      </div>
    </div>
    <div class="fase4">
      <h3>Ar condicionado</h3>
      <div class="form-group">
        <label for="">Qual tipo predominante de ar condicionado? </label>
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
            <input type="checkbox" name="nao_possuo_ar" value="nao-possuo" id="nao-possuo"/>
            <div class="state p-warning-o">
                <label for="nao-possuo">Não Possuo ar</label>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="fase5">
      <h3>Iluminação</h3>
      <div class="form-group">
        <label for="">Qual tipo de iluminação predominante?</label>
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
            <input type="radio" name="possui_paineis_solares_para_aquecimento_de_agua" value="sim" id="sim"/>
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
    <div class="buttons-form">
      <a href="" class="btn btn-previus">Voltar</a>
      <a href="" class="btn btn-next">Avançar</a>
    </div>
  </div>
</section>

<?php get_footer();