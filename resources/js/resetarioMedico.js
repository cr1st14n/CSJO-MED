
let Receta = [];
// $('#btn-addMedicamento').on("click",addMedicamento);
$('#form-createRecetario').submit(function (e) { 
    e.preventDefault();
    addMedicamento();});
$('#refreshRecetario').on('click',refreshRecetario);
$('#form_resetarioMedico').click(function (e) { 
    e.preventDefault();
    $('#md-form1_recetario').modal('show')
});
function addMedicamento() {
    if ($('#c_medi').val() == "") {
        notif('2','Error! Seleccione Medicamento');
    } else {
        var medicamentos={a:$('#c_medi').val(),b:$('#c_forma').val(),c:$('#c_dosis').val()};
        Receta.push(medicamentos);
        $html=Receta.map(
            function (e,i) {
                return variable= `
                <tr>
                    <td>${e.a}</td>
                    <td>${e.b} </td>
                    <td>${e.c} </td>
                    <td>
                        <button class="btn btn-danger" onclick="listReceMedicDelete(${i})"> <i class="fa fa-ban"></i></button>
                    </td>
                <tr>    
                `;
            }
        ).join(" ");
        $('#tableBodilistMedicamentos').html($html);
        $('#c_medi').focus();
    }
  }
function refreshRecetario() {
    $('#form-createRecetario').trigger('reset');
  }
function listReceMedicDelete(dit) {
    Receta.splice(dit,1);
        $html=Receta.map(
            function (e,i) {
                return variable= `
                <tr>
                    <td>${e.a}</td>
                    <td>${e.b} </td>
                    <td>${e.c} </td>
                    <td>
                        <button class="btn btn-danger" onclick="listReceMedicDelete(${i})"> <i class="fa fa-ban"></i></button>
                    </td>
                <tr>    
                `;
            }
        ).join(" ");
        console.log($html);
        $('#tableBodilistMedicamentos').html($html);

  }