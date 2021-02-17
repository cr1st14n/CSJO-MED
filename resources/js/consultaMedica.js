$('#form_registrarConsulta').submit(function (e) { 
    e.preventDefault();
    var list=$('#form_registrarConsulta').serialize();
    list = $(this).serialize()
    console.log(list);
    createConsulMedica(list);
});

function createConsulMedica(paramentros) {
    $.ajax({
        type: "post",
        url: "consultaMedica/create",
        data: paramentros,
        // dataType: "dataType",
        success: function (response) {
            console.log(response);
        }
    });
  }