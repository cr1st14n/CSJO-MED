$("#btn_showFormRx").click(function (e) {
    e.preventDefault();
    console.log(token);
    $("#md-formCargaRX").modal("show");
});

// *Funcion de DROOPZONE
Dropzone.options.myAwesomeDropzone = {
    headers: {
        "X-CSRF-TOKEN": token,
    },
    data:{"data1":"datos que cargar"},
    maxFilesize: 12,
    renameFile: function (file) {
        var dt = new Date();
        var time = dt.getTime();
        return time + file.name;
    },
    acceptedFiles: ".jpeg,.jpg,.png,.gif",
    addRemoveLinks: true,
    timeout: 5000,
    complete: function (file) {
        setTimeout(() => {
            // this.removeFile(file);
            $('#my-awesome-dropzone').html('');
        }, 2000);
    },
    success: function (file, response) {
        console.log(response);
    },
    error: function (file, response) {
        return false;
    },
};
