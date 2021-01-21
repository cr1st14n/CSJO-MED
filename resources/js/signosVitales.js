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
    $.ajax({
        type: 'post',
        url: `signosVitales/store/${idPacienteSelect}`,
        data:$('#form_create_signosVitales').serialize(),
        success: function (response) {
            console.log( response);
            if (response) {
                $('#form_create_signosVitales').trigger('reset');
                $("#md-formSignosVitales").modal("hide");
                $("#icmPaciente").html("");
                notif('1','Signos registrados.')
            } else {
                notif('2','Error Vuelva a intertarlo!.')
            }
        }
    });
});



function btn_listSV() {
    $.ajax({
        type: "get",
        url: "signosVitales/list1",
        data: {paciente:idPacienteSelect},
        // dataType: "dataType",
        success: function (response) {
            console.log(response);
            var html=response.map(
                function ( a,b) {
                    var f=new Date(a.created_at);
                    f=f.toLocaleString("es-ES",'dd/mm/yyyy');
                    // console.log(f.format('dd/mm/yyyy'));
                    return a=`
                    <tr>
                        <td>${f}</td>
                        <td>${a.sv_pa}</td>
                        <td>${a.sv_fc}</td>
                        <td>${a.sv_fr}</td>
                        <td>${a.sv_st}</td>
                        <td>${a.sv_te}</td>
                        <td>${a.sv_pe}</td>
                        <td>${a.sv_ta}</td>
                        <td>${a.sv_ta}</td>
                        <td>
                            <span class="tooltip-area">
                                <button class="btn btn-default btn-sm" title="Edit" onclick="show_modalPlacaRX(55)"><i class="fa fa-eye-slash"></i></button>
                            </span>
                        </td>
                </tr>
                    `;
                  }
            ).join(' ');
            $('#table_listSV').html(html);
        }
    });    
  }