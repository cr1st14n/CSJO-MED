let Receta = [];
// $('#btn-addMedicamento').on("click",addMedicamento);
$("#form-createRecetario").submit(function (e) {
    e.preventDefault();
    addMedicamento();
});
$("#refreshRecetario").on("click", refreshRecetario);
$("#form_resetarioMedico").click(function (e) {
    e.preventDefault();
    if ($("#paciente_id_HCL").val() == null) {
        $.notific8("Seleccione Paciente!.", {
            life: "3000",
            theme: "primary",
        });
    } else {
        $("#id_paciente_new_cotizacion").val($("#paciente_id_HCL").val());
        $("#md-form1_recetario").modal("show");
    }
});
function addMedicamento() {
    if ($("#c_medi").val() == "") {
        notif("2", "Error! Seleccione Medicamento");
    } else {
        var medicamentos = {
            a: $("#c_medi").val(),
            b: $("#c_forma").val(),
            c: $("#c_dosis").val(),
        };
        Receta.push(medicamentos);
        listRecetario();
        $("#c_medi").focus();
    }
}
function listRecetario() {
    const html = Receta.map(
        (e, i) =>
            (variable = `
                <tr>
                    <td>${e.a}</td>
                    <td>${e.b} </td>
                    <td>${e.c} </td>
                    <td>
                        <button class="btn btn-danger" onclick="listReceMedicDelete(${i})"> <i class="fa fa-ban"></i></button>
                    </td>
                <tr>    
                `)
    ).join(" ");
    $("#tableBodilistMedicamentos").html(html);
}

function refreshRecetario() {
    $("#c_medi").val("");
    $("#form-createRecetario").trigger("reset");
    Receta = [];
    listRecetario();
}
function listReceMedicDelete(dit) {
    Receta.splice(dit, 1);
    listRecetario();
}

function registerReceta(tipo) {
    $("#paciente_id_HCL").val();
    if (Receta == "") {
        console.log("no hay regsiros");
    } else {
        $.ajax({
            type: "POST",
            url: "recetarioM/create",
            data: {
                _token: $("meta[name=csrf-token]").attr("content"),
                paciente: $("#paciente_id_HCL").val(),
                data: Receta,
            },
            // dataType: "dataType",
            success: function (response) {
                if (response.a == 0) {
                    notif(2, "Error!, Vuelva a intentarlo");
                } else {
                    posCreate(tipo, response);
                }
            },
        });
    }
}

function posCreate(tipo, response) {
    notif("1", "Registrado.");
    refreshRecetario();
    $("#md-form1_recetario").modal("hide");
    if (tipo==2) {
        // * se procede a abrir modal para imprimir el recetario
        $('#md-form1_vistaReceta').modal('show');
    } 
}
