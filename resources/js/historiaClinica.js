function showHistoriaClinica(paciente) {
    $.ajax({
        type: "GET",
        url: "historiaClinica/hcl",
        data: {id:55},
        dataType: "text",
        success: function (dat) {
            $('#panel1').html(dat);
            $('#md-messages').modal('hide');
        }
    });
  }