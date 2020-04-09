function colaPacienteMedAten() {
    $.ajax({
        type: "get",
        url: "historiaClinica/colaPacienteMedAten",
        data: "data",
        dataType: "json",
        success: function (response) {
            console.log(response);
            $("#md-listPacientesEspera").modal("show");
            var html = response
                .map(function (e) {
                    return `
                    <li>
                        <section class="thumbnail-in">
                            <div class="widget-im-tools tooltip-area pull-right">
                                <span>
                                    <time datetime="2013-11-16">${e.cp_time}</time>
                                </span>
                            </div>
                            <h4><a href="#" onclick="showHistoriaClinica(${e.cp_paciente})">${e.pa_nombre} ${e.pa_appaterno}</a>
                            </h4>
                            <div class="im-thumbnail"><img alt="" src="Plantilla/assets/img/paciente.png" /></div>
                            <label></label>
                            <div class="pre-text">Procedimiento: ${e.cp_procedimiento}</div>
                        </section>
                    </li>
                    `;
                })
                .join(" ");
                $('#list_PacientesEspera').html(html);
        },
    });
}

function showHistoriaClinica(paciente) {
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
            $('#nroPacientesFila').text(pacientes);
        }
    });
}, 3000);
