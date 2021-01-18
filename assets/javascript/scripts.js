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

  // Imovel Publico
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

  const fase4Content = document.getElementById('fase4Content');
  const fase4ContentTwo = document.getElementById('fase4-v2');
  fase4ContentTwo.style.display = imovelPublico.checked ? 'block' : 'none';
  fase4Content.style.display = imovelPublico.checked ? 'none' : 'block';

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

  // É misto?

  const misto = document.getElementById('predio-condominio');
  const mistoContent = document.getElementById('predio-condominio-misto');
  mistoContent.style.display = misto.checked ? 'block' : 'none';

  // Imovel Residencial

  const imovelResidencial = document.getElementById('imovel-residencial');

  const fase2residencial = document.getElementById('residencial_fase2');
  fase2residencial.style.display = imovelResidencial.checked ? 'block' : 'none';

  /* ###### IMOVEL COMERCIAL ###### */
  const imovelComercial = document.getElementById('imovel-comercial');
  const imovelComercialContent = document.getElementById(
    'imovel-comercial-content',
  );
  document.getElementById('fase__2').style.display = imovelComercial.checked
    ? 'none'
    : 'block';

  // Content Passo 1
  imovelComercialContent.style.display = imovelComercial.checked
    ? 'block'
    : 'none';

  // Passo 4 v2
  const tipoResidencial = document.getElementById('imovel-residencial');
  const fase4Item = document.getElementById('fase4-v2');
  fase4Item.style.display = tipoResidencial.checked ? 'block' : 'none';

  if (imovelResidencial.checked) {
    document.getElementById('fase__3').style.display = 'none';
    document.getElementById('fase3__three').style.display = 'block';
  }

  if (imovelPublico.checked) {
    document.getElementById('fase4-v3').style.display = 'none';
    document.getElementById('fase4-v2').style.display = 'block';
    document.getElementById('fase5-v2').style.display = 'none';
    document.getElementById('fase3__three-red').style.display = 'none';
    document.getElementById('fase3__three').style.display = 'none';
    document.getElementById('fase4-v3-two').style.display = 'none';
    document.getElementById('fase5Content').style.display = 'block';
    document.getElementById('sistema-automacao').style.display = 'block';
  }

  if (imovelComercial.checked) {
    document.getElementById('fase2__two').style.display = 'block';
    document.getElementById('fase__3').style.display = 'none';
    document.getElementById('fase4Content').style.display = 'none';
    document.getElementById('fase3__two').style.display = 'block';
    document.getElementById('fase4-v2').style.display = 'block';
    document.getElementById('fase3__three').style.display = 'none';
    document.getElementById('fase3__three-red').style.display = 'none';
    document.getElementById('fase4-v3').style.display = 'none';
    document.getElementById('fase4-v3-two').style.display = 'none';
    document.getElementById('fase5-v2').style.display = 'none';
  }
}

// É misto (Comercial + Residencial)

function residencialMisto(event) {
  console.log(event);
  if (event.value == 'sim') {
    document.getElementById('fase3__three').style.display = 'block';
    document.getElementById('fase3__three-red').style.display = 'none';
    document.getElementById('fase__3').style.display = 'none';
    document.getElementById('fase4-v2').style.display = 'none';
    document.getElementById('fase4-v3').style.display = 'block';
    document.getElementById('fase4-v3-two').style.display = 'none';
    document.getElementById('fase4Content').style.display = 'none';
    document.getElementById('fase5-v2').style.display = 'block';
    document.getElementById('fase5Content').style.display = 'none';
  } else if (event.value == 'nao') {
    document.getElementById('fase3__three').style.display = 'none';
    document.getElementById('fase3__three-red').style.display = 'block';
    document.getElementById('fase__3').style.display = 'none';
    document.getElementById('fase4-v2').style.display = 'none';
    document.getElementById('fase4Content').style.display = 'none';
    document.getElementById('fase4-v3').style.display = 'none';
    document.getElementById('fase4-v3-two').style.display = 'block';
    document.getElementById('fase5Content').style.display = 'none';
    document.getElementById('fase5-v2').style.display = 'block';
    document.getElementById('form-v5-comercial').style.display = 'none';
  } else {
    alert('ok');
  }
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
// Qual o tipo de residencia
function tipoResidencia(divId, element, divIdTwo) {
  console.log(element);
  if (element.value === 'predio-condominio') {
    document.getElementById(divId).style.display = 'block';
    document.getElementById(divIdTwo).style.display = 'none';
    document.getElementById('fase3__three').style.display = 'none';
    document.getElementById('fase__3').style.display = 'block';
    document.getElementById('fase4-v2').style.display = 'none';
    document.getElementById('fase4-v3').style.display = 'none';
    document.getElementById('fase5-v2').style.display = 'none';
    document.getElementById('sistema-automacao').style.display = 'none';
  } else if (element.value === 'casa-ou-ap') {
    document.getElementById(divId).style.display = 'block';
    document.getElementById(divIdTwo).style.display = 'none';
    document.getElementById('sistema-automacao').style.display = 'none';
  } else {
  }
}

/* Mask inputs */

$(document).ready(function () {
  $('.mask-value').mask('000.000.000', { reverse: true });
  $('.money').mask('000.000.000.000.000', { reverse: true });
});
