$('#btn_showFormRx').click(function (e) { 
    e.preventDefault();
    
    $('#md-formCargaRX').modal('show'); 
});
// $('#form_cargar_RX').submit(function (e) { 
//     e.preventDefault();
//     var data=$('#form_cargar_RX').serialize();
//     $.ajax({
//         type: "post",
//         url: "servRX/store",
//         data: $('#form_cargar_RX').serialize(),
//         success: function (response) {
//             console.log(response);
//         }
//     });
    
// });