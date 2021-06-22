var labformselect; //*variable para asignar tipo de formualrio a llenar
var contLab = [];

function btn_listLab() {
    showHistLabPaciente();
}
function showHistLabPaciente() {
    $.ajax({
        type: "get",
        url: "laboratorio/showHistLabPaci",
        data: { paciente: idPacienteSelect },
        // dataType: "dataType",
        success: function (response) {
            var html = response
                .map(function (e) {
                    if (e.lab.lab_tipoPago == 1) {
                        var tipoPago = "Facturado";
                    } else {
                        var tipoPago = "Autorizado";
                    }
                    var f = new Date(e.lab.created_at);
                    f = f.toLocaleString("es-ES", "dd/mm/yyyy");
                    var html2 = e.cont
                        .map(function (param) {
                            return (a = `${verificarTipoDeLab(param.tipo)}`);
                        })
                        .join(" ");
                    return (body = `
                <tr>
                    <td>${f}</td>
                    <td>${tipoPago}</td>
                    <td>${e.lab.lab_respaldo}</td>
                    <td>${html2}</td>
                    <td>${e.lab.lab_medTratante}</td>
                    <td>
                        <span class="tooltip-area">
                            <button type="button" onclick="vistaPdfLab(${e.lab.id})" class="btn btn-default btn-sm" title="Mostrar"><i class="fa fa-eye"></i></button>
                        </span>
                    </td>
                </tr>
                `);
                })
                .join(" ");
            $("#table_body_labPaciente").html(html);
        },
    });
}
function verificarTipoDeLab(veri) {
    switch (veri) {
        case "1":
            tipoText = "Bioquimica Clinica,";
            break;
        case "2":
            tipoText = "Coagulograma,";
            break;
        case "3":
            tipoText = "Biometria Hematica,";
            break;

        default:
            break;
    }
    return tipoText;
}
function showModSelectTipoLab() {
    data = new Object();
    contLab = [];
    $("#form-selectTipoLab").trigger("reset");
    $("#md_selectTipoPro").modal("show");
    $("#sect_result_lab").html("");
}

function showContent(form) {
    console.log(form);
    element = document.getElementById(form);
    check = document.getElementById("check_" + form);
    if (check.checked) {
        element.style.display = "block";
    } else {
        element.style.display = "none";
    }
}

function showMdFormLab(tipo) {
    labformselect = tipo;
    if (ComprobarLab(tipo)) {
        notif("4", "Formuario ya cargado!");
    } else {
        switch (tipo) {
            case 1:
                $("#lab_form1").html(contentFormLab(1));
                $("#md_lab_form1").modal("show");
                break;
            case 2:
                $("#lab_form1").html(contentFormLab(2));
                $("#md_lab_form1").modal("show");
                break;
            case 3:
                $("#lab_form1").html(contentFormLab(3));
                $("#md_lab_form1").modal("show");
                break;
                case 4:
                    $("#lab_form1").html(contentFormLab(4));
                    $("#md_lab_form1").modal("show");
                break;
            default:
                break;
        }
    }
}

function ComprobarLab(tipo) {
    let pueblo = contLab.find((x) => x.tipo == tipo);
    if (pueblo) {
        pueblo = true;
    } else {
        pueblo = false;
    }
    return pueblo;
}

$("#lab_form1").submit(function (e) {
    //* validacion y registro
    e.preventDefault();
    form = $("#lab_form1");
    console.log(form.serialize());
    console.log(form.serializeArray());
    lab1 = {
        tipo: labformselect,
        dataTa: form.serialize(),
        data: form.serializeArray(),
    };
    contLab.push(lab1);
    $("#md_lab_form1").modal("hide");
    mostrarVista(lab1);
});
function mostrarVista(dat) {
    console.log(dat);
    switch (dat.tipo) {
        case 1:
            console.log(dat.data[5].name);
            var a1 = `
            <div class="col-lg-12" id="View_BioClin">
                <h3 align="center">-----Bioquimica Clinica-----</h3>
                <br />
                <div class="row">
                    <div class="col-lg-6">
                    <h4>Perfil Metabolico</h4>
                    <br />
                    <table
                        class="table-striped"
                        style="border-color: black"
                        width="100%"
                        border="2"
                        cellpadding="0"
                        cellspacing="2"
                    >
                        <tr>
                        <td>Glucemia</td>
                        <td width="10%">${dat.data[0].value}</td>
                        <td style="font-size: x-small" align="right">70-110 mg/dL</td>
                        </tr>
                        <tr>
                        <td>Ac urico</td>
                        <td width="10%">${dat.data[1].value}</td>
                        <td style="font-size: x-small" align="right">2.0-6.0 mg/dL</td>
                        </tr>
                        <tr>
                        <td>Proteinas totales</td>
                        <td width="10%">${dat.data[2].value}</td>
                        <td style="font-size: x-small" align="right">6.2-8.5 g/dL</td>
                        </tr>
                        <tr>
                        <td>Albumina</td>
                        <td width="10%">${dat.data[3].value}</td>
                        <td style="font-size: x-small" align="right">3.5-5.3 g/dL</td>
                        </tr>
                    </table>
                    <hr />
                    <h4>Perfil Renal</h4>
                    <br />
                    <table class="table-bordered" width="100%">
                        <tr>
                        <td>Creatinina</td>
                        <td>${dat.data[4].value}</td>
                        <td style="font-size: x-small" align="right">0.6 - 1.4 mg/dL</td>
                        </tr>
                        <tr>
                        <td>Nitrogeno ureico</td>
                        <td>${dat.data[5].value}</td>
                        <td style="font-size: x-small" align="right">7.0 - 25 mg&dL</td>
                        </tr>
                        <tr>
                        <td>Urea</td>
                        <td>${dat.data[6].value}</td>
                        <td style="font-size: x-small" align="right">15 - 45 mg/dL</td>
                        </tr>
                    </table>
                    <hr />
                    <h4>Perfil lipidico</h4>
                    <table class="table-bordered" width="100%">
                        <tr>
                        <td>Colesterol</td>
                        <td>${dat.data[7].value}</td>
                        <td style="font-size: x-small" align="right">< 200mg/dL</td>
                        </tr>
                        <tr>
                        <td>Triglicericos</td>
                        <td>${dat.data[8].value}</td>
                        <td style="font-size: x-small" align="right">30 -150 mg/dL</td>
                        </tr>
                        <tr>
                        <td>HDL-COL</td>
                        <td>${dat.data[9].value}</td>
                        <td style="font-size: x-small" align="right">30-85 mg/dL</td>
                        </tr>
                        <tr>
                        <td>LDL-COL</td>
                        <td>${dat.data[10].value}</td>
                        <td style="font-size: x-small" align="right">< 155 mg/dL</td>
                        </tr>
                        <tr>
                        <td>VLDL</td>
                        <td>${dat.data[11].value}</td>
                        <td style="font-size: x-small" align="right">< 40mg/dL</td>
                        </tr>
                    </table>
                    </div>
                    <div class="col-lg-6">
                    <h4>Perfil Metabolico</h4>
                    <br />
                    <table
                        class="table-striped"
                        style="border-color: black"
                        width="100%"
                        border="2"
                        cellpadding="0"
                        cellspacing="2"
                    >
                        <tr>
                        <td>Glucemia</td>
                        <td width="10%">${dat.data[12].value}</td>
                        <td style="font-size: x-small" align="right">70-110 mg/dL</td>
                        </tr>
                        <tr>
                        <td>Ac urico</td>
                        <td width="10%">${dat.data[13].value}</td>
                        <td style="font-size: x-small" align="right">2.0-6.0 mg/dL</td>
                        </tr>
                        <tr>
                        <td>Proteinas totales</td>
                        <td width="10%">${dat.data[14].value}</td>
                        <td style="font-size: x-small" align="right">6.2-8.5 g/dL</td>
                        </tr>
                        <tr>
                        <td>Albumina</td>
                        <td width="10%">${dat.data[15].value}</td>
                        <td style="font-size: x-small" align="right">3.5-5.3 g/dL</td>
                        </tr>
                    </table>
                    <hr />
                    <h4>Perfil Renal</h4>
                    <table class="table-bordered" width="100%">
                        <tr>
                        <td>Creatinina</td>
                        <td>${dat.data[16].value}</td>
                        <td style="font-size: x-small" align="right">0.6 - 1.4 mg/dL</td>
                        </tr>
                        <tr>
                        <td>Nitrogeno ureico</td>
                        <td>${dat.data[17].value}</td>
                        <td style="font-size: x-small" align="right">7.0 - 25 mg&dL</td>
                        </tr>
                        <tr>
                        <td>Urea</td>
                        <td>${dat.data[18].value}</td>
                        <td style="font-size: x-small" align="right">15 - 45 mg/dL</td>
                        </tr>
                    </table>
                    <hr />
                    <h4>Perfil lipidico</h4>
                    <table class="table-bordered" width="100%">
                        <tr>
                        <td>Colesterol</td>
                        <td>${dat.data[19].value}</td>
                        <td style="font-size: x-small" align="right">< 200mg/dL</td>
                        </tr>
                        <tr>
                        <td>Triglicericos</td>
                        <td>${dat.data[20].value}</td>
                        <td style="font-size: x-small" align="right">30 -150 mg/dL</td>
                        </tr>
                        <tr>
                        <td>HDL-COL</td>
                        <td>${dat.data[21].value}</td>
                        <td style="font-size: x-small" align="right">30-85 mg/dL</td>
                        </tr>
                        <tr>
                        <td>LDL-COL</td>
                        <td>${dat.data[22].value}</td>
                        <td style="font-size: x-small" align="right">< 155 mg/dL</td>
                        </tr>
                        <tr>
                        <td>VLDL</td>
                        <td>${dat.data[23].value}</td>
                        <td style="font-size: x-small" align="right">< 40mg/dL</td>
                        </tr>
                    </table>
                    </div>
                </div>
                <button type="button" class="btn btn-danger btn-sm" onclick="eraseFormLab('View_BioClin','1')"> <i class="fa fa-eraser"></i> </button>
                <h3 align="center">----- // -----</h3>
                <br />
            </div>
            `;

            break;

        case 2:
            a1 = `
            <div class="col-lg-12" id="View_Coag">
            <h3 align="center">-----Coagulograma-----</h3>
            <table class="table-striped" style="border-color: black;" width="100%" border="2" cellpadding="0" cellspacing="2">
                <tr>
                    <td>tiempo de coagulación</td>
                    <td width="">${dat.data[0].value} min</td>
                    <td style="font-size: x-small;" align="right">6 - 12 min</td>
                </tr>
                <tr>
                    <td>Tiempo de sangria</td>
                    <td width="">${dat.data[1].value} min</td>
                    <td style="font-size: x-small;" align="right">1 - 3 min</td>
                </tr>
                <tr>
                    <td>Tiempo de protombina</td>
                    <td width="">${dat.data[2].value} segundos</td>
                    <td style="font-size: x-small;" align="right"></td>
                </tr>
                <tr>
                    <td>Actividad protombinica</td>
                    <td width="">${dat.data[3].value}</td>
                    <td style="font-size: x-small;" align="right"></td>
                </tr>
                <tr>
                    <td>INR</td>
                    <td width="">${dat.data[4].value}</td>
                    <td style="font-size: x-small;" align="right"></td>
                </tr>
            </table>
            <br>
            <h4>Control</h4>
            <p>
                Tiempo de protrombina => 13 seg <br>
                Actividad protrombinica => 100% <br>
                INR =>
            </p>
            <button type="button" class="btn btn-danger btn-sm" onclick="eraseFormLab('View_Coag','2')"> <i class="fa fa-eraser"></i> </button>
            <h3 align="center">----- // -----</h3><br>
        </div>
            `;
            break;

        case 3:
            a1 = `
            <div class="col-lg-12" id="View_Coag">
            <h3 align="center">-----Coagulograma-----</h3>
            <table class="table-striped" style="border-color: black;" width="100%" border="2" cellpadding="0" cellspacing="2">
                <tr>
                    <td>Globulos rojos</td>
                    <td width="">${dat.data[0].value} min</td>
                    <td style="font-size: x-small;" align="right">millones/mm3</td>
                </tr>
                <tr>
                    <td>Hemoglobina</td>
                    <td width="">${dat.data[1].value} min</td>
                    <td style="font-size: x-small;" align="right">g/dL</td>
                </tr>
                <tr>
                    <td>Hematocrito</td>
                    <td width="">${dat.data[2].value} min</td>
                    <td style="font-size: x-small;" align="right">%</td>
                </tr>
                <tr>
                    <td>VES</td>
                    <td width="">${dat.data[3].value} min</td>
                    <td style="font-size: x-small;" align="right">mm/hora</td>
                </tr>
                <tr>
                    <td>Leucocitos</td>
                    <td width="">${dat.data[4].value} min</td>
                    <td style="fondt-size: x-small;" align="right">x/mm3</td>
                </tr>
                <tr>
                    <td>Cayados</td>
                    <td width="">${dat.data[5].value} min</td>
                    <td style="font-size: x-small;" align="right">%</td>
                </tr>
                <tr>
                    <td>Neutrofilos</td>
                    <td width="">${dat.data[6].value} min</td>
                    <td style="font-size: x-small;" align="right">%</td>
                </tr>
                <tr>
                    <td>Eusinófilos</td>
                    <td width="">${dat.data[7].value} min</td>
                    <td style="font-size: x-small;" align="right">%</td>
                </tr>
                <tr>
                    <td>Basófilos</td>
                    <td width="">${dat.data[8].value} min</td>
                    <td style="font-size: x-small;" align="right">%</td>
                </tr>
                <tr>
                    <td>Linfositos</td>
                    <td width="">${dat.data[9].value} min</td>
                    <td style="font-size: x-small;" align="right">%</td>
                </tr>
                <tr>
                    <td>Monocitos</td>
                    <td width="">${dat.data[10].value} min</td>
                    <td style="font-size: x-small;" align="right">%</td>
                </tr>
                
            </table>
            <br>
            <h4>Control</h4>
            <p>
                Tiempo de protrombina => 13 seg <br>
                Actividad protrombinica => 100% <br>
                INR =>
            </p>
            <button type="button" class="btn btn-danger btn-sm" onclick="eraseFormLab('View_Coag','2')"> <i class="fa fa-eraser"></i> </button>
            <h3 align="center">----- // -----</h3><br>
        </div>
            `;
            break;

        default:
            break;
    }
    $("#sect_result_lab").append(a1);
}
function eraseFormLab(nom, tipo) {
    console.log(nom);
    console.log(tipo);
    $(`#${nom}`).remove();
    console.log(contLab);
    for (let i = 0; i < contLab.length; i++) {
        if (contLab[i].tipo == tipo) {
            console.log(contLab[i].tipo);
            contLab.splice(i, 1);
        } else {
        }
    }
    console.log(contLab);
}

function funDectTipoPago(tipo) {
    sect_1 = document.getElementById("sec_input_pago_1");
    sect_2 = document.getElementById("sec_input_pago_2");
    if (tipo == 1) {
        sect_1.style.display = "block";
        sect_2.style.display = "none";
    } else {
        sect_1.style.display = "none";
        sect_2.style.display = "block";
    }
}

function regLab_create() {
    var tipoPago = $("input:radio[name=lab_TipoPago]:checked").val();
    let medicoTratante= $('#lab_medicoTrtante').val();
    switch (tipoPago) {
        case "1":
            var medioEjec = $("#inp_tipoPago_fac").val();
            break;
        case "2":
            var medioEjec = $("#inp_tipoPago_aut").val();
            break;
        default:
            var medioEjec = "casa blanda";
            break;
    }
    if (medioEjec.length <= 0) {
        notif("4", "Completar Autorizacion o # de facturación");
    } else {
        data = new Object();
        data.a = {
            paciente: idPacienteSelect,
            tipoDePago: tipoPago,
            respaldo: medioEjec,
            medicoTratante: medicoTratante,
        };
        data.b = contLab;
        $.ajax({
            type: "get",
            url: "laboratorio/registerLab",
            data: data,
            // dataType: "dataType",
            success: function (response) {
                console.log(response);
                if (response.estR) {
                    notif("1", "Resultado Registrado");
                    $("#inp_tipoPago_fac").val("");
                    $("#md_selectTipoPro").modal("hide");
                    showHistLabPaciente();
                    vistaPdfLab(response.idR);
                } else {
                    notif("2", "Error!. Vuelva a intentarlo");
                }
            },
        });
    }
}

function vistaPdfLab(data) {
    console.log(data);
    // * se procede a abrir modal para imprimir el recetario
    var url = `http://192.168.0.105/CSJO-MED/laboratorio/viewPdfLabPaciente/${data}`;
    $("#linkUrlPdf").attr("src", url);
    $("#loadingAni").show();
    $("#md-form1_vistaReceta").modal("show");
    setTimeout(() => {
        $("#loadingAni").hide();
    }, 1200);
}
