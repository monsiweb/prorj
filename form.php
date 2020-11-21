<?php /* Template Name: form */ ?>
<?php get_header(); ?>

<section class="form form-residencial">
  <div class="container">

    <div class="fase6">
      <div class="form-group">
        <label for="">Possui painéis fotovoltaicos?</label>
        <div class="checkbox__input">
          <div class="pretty p-default p-thick p-smooth">
            <input type="radio" name="possuipainel" value="sim" id="sim"/>
            <div class="state p-warning-o">
                <label for="sim">Sim</label>
            </div>
          </div>
          <div class="pretty p-default p-thick p-smooth">
            <input type="radio" name="possuipainel" value="não" id="sim" />
            <div class="state p-warning-o">
                <label for="não">Não</label>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="">Área total disponível na cobertura/telhados?</label>
        <div class="input__text">
          <span class="text--input">m²</span>
          <input type="text" class="input__rio">
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer();