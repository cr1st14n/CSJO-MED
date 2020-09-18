$("#btn-buscarPacientes").click(function (e) {
    e.preventDefault();

    $("#md-searchPacienteDescargo").modal("show");
});

$("#HCLpaciente_promed").keyup(function (e) {
    var hcl = $(this).val();
    if (hcl == "") {
        console.log("sin nuemro");
        $("#resulBusqPacientes").html("");
    } else {
        $.get("/C.S.J.O.bo/api/buscarPacienteHCL/" + hcl + "", function (
            paciente
        ) {
            listPacientes(paciente);

            /*$('#resulBusqPacientes').html("");
              for (var i = 0; i <= paciente.length - 1; i++) {
                  console.log(paciente[i]);
                  var tr = `<tr>
                        <td>`+paciente[i].pa_hcl+`</td>
                        <td>`+paciente[i].pa_ci+`</td>
                        <td>`+paciente[i].pa_nombre+`</td>
                        <td>`+paciente[i].pa_appaterno+` / `+paciente[i].pa_apmaterno+`</td>
                       <td>
                          <span class="tooltip-area">
                          <button name="`+paciente[i].pa_id+`" onclick="rutaAtender(this.name)" class="btn btn-default btn-sm" title="Atender"><i class="fa  fa-plus-square"></i></button>
                          <a name="`+paciente[i].pa_id+`" onclick="rutaprintHCL(this.name)" class="btn btn-default btn-sm" target="_blank" title="Inprimir"><i class="glyphicon glyphicon-print"></i></a>
                          <button name="`+paciente[i].pa_id+`" onclick="rutaEditPaciente(this.name)" class="btn btn-default btn-sm" title="Editar"><i class="fa fa-pencil"></i></i></button>
                          <button name="`+paciente[i].pa_id+`" onclick="rutaDestroyPaHcl(this.name)" class="btn btn-default btn-sm" title="Eliminar"><i class="fa fa-trash-o"></i></button>
                          <button name="`+paciente[i].pa_id+`" onclick="rutaPrestarHCL(`+paciente[i].pa_id+`,`+paciente[i].pa_hcl+`)" class="btn btn-default btn-sm" title="Presatar HCl"><i class="fa fa-puzzle-piece"></i></button>
                          </span>
                      </td>
                  </tr>`;
  
                  $("#resulBusqPacientes").append(tr)
              }*/
        });
    }
});
$("#NOMBRESpaciente_promed").keyup(function (e) {
    var nombres = $(this).val();
    if (nombres == "") {
        console.log("sin letras");
        $("#resulBusqPacientes").html("");
    } else {
        nombres = nombres.replace(/[ ]/gi, "-");
        $.get("/C.S.J.O.bo/api/buscarPacienteNombre/" + nombres + "", function (
            paciente
        ) {
            listPacientes(paciente);
            /*$('#resulBusqPacientes').html("");
              for (var i = paciente.length - 1; i >= 0; i--) {
                  console.log(paciente[i]);
                  var tr = `<tr>
                        <td>`+paciente[i].pa_hcl+`</td>
                        <td>`+paciente[i].pa_ci+`</td>
                        <td>`+paciente[i].pa_nombre+`</td>
                        <td>`+paciente[i].pa_appaterno+` / `+paciente[i].pa_apmaterno+`</td>
                       <td>
                          <span class="tooltip-area">
                          <button name="`+paciente[i].pa_id+`" onclick="rutaAtender(this.name)" class="btn btn-default btn-sm" title="Atender"><i class="fa  fa-plus-square"></i></button>
                          <a name="`+paciente[i].pa_id+`" onclick="rutaprintHCL(this.name)" class="btn btn-default btn-sm" target="_blank" title="Inprimir"><i class="glyphicon glyphicon-print"></i></a>
                          <button name="`+paciente[i].pa_id+`" onclick="rutaEditPaciente(this.name)" class="btn btn-default btn-sm" title="Editar"><i class="fa fa-pencil"></i></i></button>
                          <button name="`+paciente[i].pa_id+`" onclick="rutaDestroyPaHcl(this.name)" class="btn btn-default btn-sm" title="Eliminar"><i class="fa fa-trash-o"></i></button>
                          <button name="`+paciente[i].pa_id+`" onclick="rutaPrestarHCL(`+paciente[i].pa_id+`)" class="btn btn-default btn-sm" title="Prestar HCL"><i class="fa fa-puzzle-piece"></i></button>
                          </span>
                      </td>
                  </tr>`;
  
                  $("#resulBusqPacientes").append(tr)
              }*/
        });
    }
});

function listPacientes(data) {
    var html = data
        .map(function (elem, index) {
            return `<tr>
                      <td>${elem.pa_hcl}</td>
                      <td>${elem.pa_ci}</td>
                      <td>${elem.pa_nombre}</td>
                      <td>${elem.pa_appaterno} / ${elem.pa_apmaterno}</td>
                        <td>
                            <button type="button" onClick="storePM1(${elem.pa_id})" class="btn btn-theme-inverse btn-transparent"><i class="glyphicon glyphicon-list-alt"></i></button>
                            <button type="button" onClick="storePM2(${elem.pa_id})" class="btn btn-theme-inverse btn-transparent"><i class="glyphicon glyphicon-arrow-right"></i></button>
                        </td>
                     
                </tr>`;
        })
        .join(" ");
    //   document.getElementById("resulBusqPacientes_proCot").innerHTML = html;
    $("#resulBusqPacientes_promed").html(html);
}

function storePM1(id_paciente) {}
function storePM2(id_paciente) {
    $.ajax({
        type: "get",
        url: "Descargo/make",
        data: { paciente: id_paciente },
        // dataType: "",
        success: function (response) {
            $("#panel1_descargo").html(response);
        },
    });
    $("#md-searchPacienteDescargo").modal("hide");
}
