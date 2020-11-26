$("#form-prorio-content").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    autoFocus: true,
    labels: {
        current: "",
        pagination: "Pagination",
        finish: "Enviar",
        next: "Avançar",
        previous: "Voltar",
        loading: "Carregando..."
    }
});

$("a[href='#finish']").click(function (){
   $("#form-prorio").submit();
});



// FORM LOGIC

$("a[href='#next']").click(function () {
    const imovelResidencial = document.getElementById("imovel-residencial");
    const imovelPublico = document.getElementById("imovel-publico");
    const imovelComercial = document.getElementById("imovel-comercial");

    const titleText = document.getElementById("title-form");

    if (imovelResidencial.checked) {
        titleText.innerHTML = "Imóvel Residencial";
    }

    else if (imovelPublico.checked) {
        titleText.innerHTML = "Imóvel Público";
    }

    else if (imovelComercial.checked) {
        titleText.innerHTML = "Imóvel Comercial";
    }
})

function ShowHideDiv() {

    // Autovistoria
    const autoVistoria = document.getElementById("autovistoria");
    const numeroProcesso = document.getElementById("numeroprocesso-content");
    numeroProcesso.style.display = autoVistoria.checked ? "block" : "none";

    // Imovel Residencial


    // Imovel Publico
    const imovelPublico = document.getElementById("imovel-publico");
    const imovelPublicoContent = document.getElementById("imovel-publico-content");
    imovelPublicoContent.style.display = imovelPublico.checked ? "block" : "none";

    // Imovel Comercial
    const imovelComercial = document.getElementById("imovel-comercial");
    const imovelComercialContent = document.getElementById("imovel-comercial-content");
    imovelComercialContent.style.display = imovelComercial.checked ? "block" : "none";
    
    // Tipo de ar
    const airConditioning = document.getElementById("air_conditioning-vrf");
    const airConditioningContent = document.getElementById("air_conditioning-content");
    airConditioningContent.style.display = airConditioning.checked ? "block" : "none";
    
    // Tipo de ar
    const airConditioninTwo = document.getElementById("air_conditioning-chiller");
    const airConditioningContentTwo = document.getElementById("air_conditioning-content-two");
    airConditioningContentTwo.style.display = airConditioninTwo.checked ? "block" : "none";

    // Sistema de automação
    const automationSystem = document.getElementById("automation-system");
    const automationSystemContent = document.getElementById("automation-system-content");
    automationSystemContent.style.display = automationSystem.checked ? "block" : "none";
}




