$('#form-prorio-content').steps({
  headerTag: 'h3',
  bodyTag: 'section',
  transitionEffect: 'slideLeft',
  autoFocus: true,
  labels: {
    current: '',
    pagination: 'Pagination',
    finish: 'Enviar',
    next: 'Avançar',
    previous: 'Voltar',
    loading: 'Carregando...',
  },
});

$("a[href='#finish']").click(function () {
  $('#form-prorio').submit();
});

// FORM LOGIC

$("a[href='#next']").click(function () {
  const imovelResidencial = document.getElementById('imovel-residencial');
  const imovelPublico = document.getElementById('imovel-publico');
  const imovelComercial = document.getElementById('imovel-comercial');

  const titleText = document.getElementById('title-form');

  if (imovelResidencial.checked) {
    titleText.innerHTML = 'Imóvel Residencial';
  } else if (imovelPublico.checked) {
    titleText.innerHTML = 'Imóvel Público';
  } else if (imovelComercial.checked) {
    titleText.innerHTML = 'Imóvel Comercial';
  }
});

function ShowHideDiv() {
  // Autovistoria
  const autoVistoria = document.getElementById('autovistoria');
  const numeroProcesso = document.getElementById('process_number_content');
  numeroProcesso.style.display = autoVistoria.checked ? 'block' : 'none';

  // Imovel Residencial

  // Imovel Publico & Imovel Comercial
  const imovelPublico = document.getElementById('imovel-publico');
  const imovelPublicoContent = document.getElementById(
    'imovel-publico-content',
  );
  imovelPublicoContent.style.display = imovelPublico.checked ? 'block' : 'none';

  const fase2Content = document.getElementById('fase2__two');
  const fase2PrimaryContent = document.getElementById('fase__2');
  fase2Content.style.display = imovelPublico.checked ? 'block' : 'none';
  fase2PrimaryContent.style.display = imovelPublico.checked ? 'block' : 'block';

  const fase3Content = document.getElementById('fase3__two');
  const fase3PrimaryContent = document.getElementById('fase__3');
  fase3Content.style.display = imovelPublico.checked ? 'block' : 'none';
  fase3PrimaryContent.style.display = imovelPublico.checked ? 'none' : 'block';

  const imovelComercial = document.getElementById('imovel-comercial');
  const imovelComercialContent = document.getElementById(
    'imovel-comercial-content',
  );
  imovelComercialContent.style.display = imovelComercial.checked
    ? 'block'
    : 'none';

  // Tipo de ar
  const airConditioning = document.getElementById('air_conditioning-vrf');
  const airConditioningContent = document.getElementById(
    'air_conditioning-content',
  );
  airConditioningContent.style.display = airConditioning.checked
    ? 'block'
    : 'none';

  // Tipo de ar
  const airConditioninTwo = document.getElementById('air_conditioning-chiller');
  const airConditioningContentTwo = document.getElementById(
    'air_conditioning-content-two',
  );
  airConditioningContentTwo.style.display = airConditioninTwo.checked
    ? 'block'
    : 'none';

  // Sistema de automação
  const automationSystem = document.getElementById('automation-system');
  const automationSystemContent = document.getElementById(
    'automation-system-content',
  );
  automationSystemContent.style.display = automationSystem.checked
    ? 'block'
    : 'none';
}

function showDiv(divId, element, DivIdTwo) {
  if (element.value === 'A') {
    document.getElementById(divId).style.display = 'block';
  } else {
    document.getElementById(divId).style.display = 'none';
  }

  if (element.value === 'B') {
    document.getElementById(DivIdTwo).style.display = 'block';
  } else {
    document.getElementById(DivIdTwo).style.display = 'none';
  }
}

/* Mask inputs */

$(document).ready(function () {
  $('.mask-value').mask('000.000.000', { reverse: true });
  $('.money').mask('000.000.000.000.000,00', { reverse: true });
});

/* progress bar */

var bar = new ProgressBar.Line(barOne, {
  strokeWidth: 4,
  easing: 'easeInOut',
  duration: 1400,
  color: '#FB451D',
  trailColor: '#eee',
  trailWidth: 1,
  svgStyle: { width: '100%', height: '100%' },
});

bar.animate(1.0); // Number from 0.0 to 1.0

var bar1 = new ProgressBar.Line(barTwo, {
  strokeWidth: 4,
  easing: 'easeInOut',
  duration: 1400,
  color: '#FB6C21',
  trailColor: '#eee',
  trailWidth: 1,
  svgStyle: { width: '70%', height: '100%' },
});

bar1.animate(1.0); // Number from 0.0 to 1.0

var bar2 = new ProgressBar.Line(barThree, {
  strokeWidth: 4,
  easing: 'easeInOut',
  duration: 1400,
  color: '#FAAF41',
  trailColor: '#eee',
  trailWidth: 1,
  svgStyle: { width: '40%', height: '100%' },
});

bar2.animate(1.0); // Number from 0.0 to 1.0
