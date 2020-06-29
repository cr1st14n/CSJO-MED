function colaPacienteMedAten() {
    $.ajax({
        type: "get",
        url: "historiaClinica/colaPacienteMedAten",
        data: "data",
        dataType: "json",
        success: function (response) {
            // console.log(response);
            var html2 = response
                .map(function (e) {
                    return `
                        <div class="widget-mini-chart align-xs-left">
                            <div class="pull-right">
                                <div class="im-thumbnail"><img alt="" src="Plantilla/assets/img/historiaClinica2.png"  width="50" height="50" /></div>
                            </div>
                            <p style=" color:tan; ">${e.cp_procedimiento}</p>
                             <a href="#" onclick="showHistoriaClinica(${e.cp_paciente})" style=" color:aliceblue; "><h5>${e.pa_nombre} ${e.pa_appaterno}</h5></a>
                        </div>`;
                })
                .join(" ");
            $("#collapseSummary").html(html2);
        },
    });
}

function showHistoriaClinica(paciente) {
    // console.log(paciente);
    $('#form_new_cotizacion').trigger('reset');
    $.ajax({
        type: "GET",
        url: "historiaClinica/hcl",
        data: { id: paciente },
        dataType: "text",
        success: function (dat) {
            $("#panel1").html(dat);
            
            $("#md-listPacientesEspera").modal("hide");
        },
    });
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
}, 3000);
function showModalTipoConsulta(idHcl) {
    console.log(idHcl);
    $("#md-tipoConsulta").modal("show");
}
function ShowModalAtencion(tipo) {
    switch (tipo) {
        case 1:
            $('#md-atencion_consultaExterna').modal('show');
           
            break;
        case 2:
            $('#md-atencion_prenatal').modal('show');
            console.log("SLDFJLK");
            break;    
        case 3:
            $('#md-atencion_anticoncepcion').modal('show');
            console.log("SLDFJLK");
            break;    
        default:
            break;
    }
  }
/* Show modal Formularios  */
