$("#btn_showFormRx").click(function (e) {
    e.preventDefault();
    console.log(token);
    // var html = `<div class="dz-message" style="height:100px;">
    // 				Cargar imagen
    // 			</div>`;
    // $(".dz-preview").remove();
    $("#md-formCargaRX").modal("show");
    // $("div#myId").dropzone({ url: "/file/post" });
    myDropzone.options.url = 'servRX/store/'+idPacienteSelect;
    myDropzone.removeAllFiles(true);
});
var myDropzone = new Dropzone("#subImagen", {
    url: 'error',
    headers: {
        "X-CSRF-TOKEN": $("meta[name=csrf-token]").attr("content"),
    },
    success: function (file, response) {
        console.log(response);
    },
});

// *Funcion de DROOPZONE

function clonar(data) {
    console.log(data);
    $("#textRX2").val(data);
}


