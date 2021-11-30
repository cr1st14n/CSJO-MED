function colaPacienteMedAten() {
    $.ajax({
        type: "get",
        url: "historiaClinica/colaPacienteMedAten",
        data: "data",
        dataType: "json",
        success: function (response) {
            console.log(response);
            var html2 = response
                .map(function (e) {
                    return a=`
                        <div class="widget-mini-chart align-xs-left">
                            <div class="pull-right">
                                <div class="im-thumbnail"><img alt="" src="Plantilla/assets/img/historiaClinica2.png"  width="50" height="50" /></div>
                            </div>
                            <p style=" color:tan; ">${e.ate_procedimiento}</p>
                            <button class="btn btn-theme-inverse btn-xs" onclick="concluirCita(${e.id})"><i class="fa fa-check"></i></button>
                             <a href="#" onclick="showHistoriaClinica(${e.pa_id})" style=" color:aliceblue; "><h5>${e.pa_nombre} ${e.pa_appaterno}</h5></a>
                        </div>`;
                })
                .join(" ");
            $("#collapseSummary").html(html2);
        },
    });
}

// * funiones para concluir cita
function concluirCita(id) {
    console.log(id);
    $.ajax({
        type: "post",
        url: "historiaClinica/concluirAte",
        data: [],
        // dataType: "dataType",
        success: function (response) {
            
        }
    });
  }
// *-------------------------------------


function showHistoriaClinica(paciente) {
    console.log(paciente);
    idPacienteSelect=paciente;
    $("#form_new_cotizacion").trigger("reset");
    $.ajax({
        type: "GET",
        url: "historiaClinica/hcl",
        data: { id: idPacienteSelect },
        dataType: "text",
        success: function (dat) {
            $("#panel1").html(dat);
            $("#md-listPacientesEspera").modal("hide");
        },
    });
}
$('#btn_showFormConsulta').click(function () { 
    console.log(idPacienteSelect);
});
function showModalFormConsulta() {
    $("#md-tipoConsulta").modal("show");
  }
setInterval(() => {
    $.ajax({
        type: "GET",
        url: "historiaClinica/nroPacienteCola",
        data: "data",
        dataType: "text",
        success: function (pacientes) {
            $("#nroPacientesFila").text(pacientes);
        },
    });
}, 10000);
function showModalTipoConsulta() {
    
    $("#md-tipoConsulta").modal("show");
}
function ShowModalAtencion(tipo) {
    switch (tipo) {
        case 1:
            $("#md-atencion_consultaExterna").modal("show");

            break;
        case 2:
            $("#md-atencion_prenatal").modal("show");
            console.log("SLDFJLK");
            break;
        case 3:
            $("#md-atencion_anticoncepcion").modal("show");
            console.log("SLDFJLK");
            break;
        default:
            break;
    }
}
/* Show modal Formularios  */

