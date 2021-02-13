var myDropzone = new Dropzone("#subImagen", {
    url: "error",
    headers: {
        "X-CSRF-TOKEN": $("meta[name=csrf-token]").attr("content"),
    },
    success: function (file, response) {
        console.log(response);
        if (response) {
            notif("1", "Imagen cargada a sistema");
            btn_funlistserRX();
        } else {
        }
    },
});
$("#btn_showFormRx").click(function (e) {
    e.preventDefault();
    if (fun001()) {
        showModalFormRX();
    } else {
        notif("4", "Seleccione un Paciente!");
    }
});

function showModalFormRX() {
    $("#md-formCargaRX").modal("show");
    myDropzone.options.url = "servRX/store/" + idPacienteSelect;
    myDropzone.removeAllFiles(true);
}

// *Funcion de DROOPZONE
function clonar(data) {
    console.log(data);
    $("#textRX2").val(data);
}

function btn_funlistserRX() {
    console.log("hola");
    $.ajax({
        type: "get",
        url: "servRX/listPaciSerRX",
        data: { paciente: idPacienteSelect },
        // dataType: JSON,
        success: function (response) {
            console.log(response);
            var html = response
                .map(function (index, data) {
                    var f = new Date(index.created_at);
                    f = f.toLocaleString("es-ES", "dd/mm/yyyy");
                    return (a = `
                <tr>
                    <td>${f}</td>
                    <td>${index.rx_descripcion}</td>
                    <td>
                        <span class="tooltip-area">
                            <button class="btn btn-default btn-sm" title="Edit" onclick="show_modalPlacaRX(${index.id})"><i class="fa fa-eye-slash"></i></button>
                        </span>
                    </td>
                </tr>
                `);
                })
                .join(" ");
            $("#table_listServRX").html(html);
        },
    });
}

function show_modalPlacaRX(id_placaRX) {
    console.log(id_placaRX);
    $.ajax({
        type: "get",
        url: "servRX/showPlacaRX",
        data: { id_rx: id_placaRX },
        success: function (response) {
            var url ="/CSJO-MED/" +response.rx_rutaImagen;
            // $("#md_body_show_imagen ").html(html);
            $('#srcImagenPlacaRX').attr('src', url);
            $("#md_body_show_desc").html(response.rx_descripcion);
            console.log(response);
            $("#md-formCarga-imagenRX").modal("show");
            $(document).ready(function(){
                $('#ex1').zoom({magnifi:1000});
            });
        },
    });
}

