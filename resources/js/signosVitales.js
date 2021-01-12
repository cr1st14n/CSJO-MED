$("#btn_showFormSignosVitales").click(function (e) {
    // e.preventDefault();
    if (idPacienteSelect == null) {
        notif("3", "Seleccione un Paciente");
    } else {
        $('#form_create_signosVitales').trigger('reset');
        $("#md-formSignosVitales").modal("show");
        $("#icmPaciente").html("");
    }
});

function calcularIMC() {
    t = $("#tallaPaciente").val();
    t = t/100;
    p = $("#pesoPaciente").val();
    if (t >= 0 && p >= 0) {
        imc = Math.round(p / (t * t)).toFixed(2);
        console.log(imc);
        if (       imc <= 18.5) {$("#icmPaciente").html(`${imc} -> Bajo Peso`);} 
        if (imc >= 18.5 && imc < 25.0) {$("#icmPaciente").html(`${imc} -> Peso Normal`);} 
        if (imc >= 25.0 && imc < 30.0) {$("#icmPaciente").html(`${imc} -> Sobre Peso`);} 
        if (imc >= 30.0 && imc < 35.0) {$("#icmPaciente").html(`${imc} -> Obesidad grado I`);} 
        if (imc >= 35.0 && imc < 40.0) {$("#icmPaciente").html(`${imc} -> Obesidad grado II`);} 
        if (40.0 < imc       ) {$("#icmPaciente").html(`${imc} -> Obesidad grado III`);} 
         
        
    } else {
        $("#icmPaciente").html("");
    }
}
$('#btn_submitFormCreateSV').click(function (e) { 
    e.preventDefault();
    a = $('#form_create_signosVitales').serialize();
    console.log(a);
    
});
