function show_modal_corizacion_formulario(num_form) {
    switch (num_form) {
        case num_form:
            if ($('#paciente_id_HCL').val()==null) {
                $.notific8('Seleccione Paciente!.',{life:'3000',theme: 'primary'});
            } else {
                $('#md_cotizacion_fomr_1').modal('show');
                console.log($('#paciente_id_HCL').val( ))
            }



            break;
    
        default:
            break;
    }
  }
$('#form_new_cotizacion').submit(function (e) { 
    e.preventDefault();
   console.log($('#form_new_cotizacion').serialize());
   $.ajax({
       type: "Post",
       url: "cotizacion/create",
       data: $('#form_new_cotizacion').serialize(),
       success: function (response) {
           console.log(response);
       }
   });
});