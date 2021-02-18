$('#form_registrarConsulta').submit(function (e) { 
    e.preventDefault();
    var list=$('#form_registrarConsulta').serialize();
    list = $(this).serialize()
    createConsulMedica(list);
});

function createConsulMedica(paramentros) {
    $.ajax({
        type: "post",
        url: "consultaMedica/create/"+idPacienteSelect,
        data: paramentros,
        // dataType: "dataType",
        success: function (response) {
            if (response) {
                notif('1','Agregado Correctamente');
                $('#md-atencion_consultaExterna').modal('hide');
                $('#form_registrarConsulta').trigger('reset');
            } else {
                notif('2','Error!. Vulva a intentarlo');
            }
        }
    });
  }
  function btn_listConsultasMedicas() {
      $.ajax({
          type: "get",
          url: "consultaMedica/show/"+idPacienteSelect,
        //   data: "data",
        //   dataType: "dataType",
          success: function (response) {
              console.log(response);
           
              
          }
      });
    }