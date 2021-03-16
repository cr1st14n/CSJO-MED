let contLab=Array;

function showModSelectTipoPro() {
    $("#form-selectTipoLab").trigger("reset");
    $("#md_selectTipoPro").modal("show");
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
    console.log(tipo);
    switch (tipo) {
        case 1:
            $("#lab_form1").html(contentFormLab(1));
            $("#md_lab_form1").modal("show");
            break;
        case 2:
            $("#").modal("show");

            break;
        case 3:
            $("#").modal("show");

            break;
        default:
            break;
    }
}

function contentFormLab(tipo) {
    a = `
      <h3>Bioquimica Clinica</h3>
          <div class="row">
			<input type="hidden" value="1">
              <div class="col-lg-6">
                  <div class="form-group">
                      <label>Perfil Metabolico</label>
                      <div class="input-group">
                          <input type="text" name="glucemia" class="form-control" placeholder="Username">
                          <span class="input-group-addon">Glucemia</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="acUrico" class="form-control" placeholder="Username">
                          <span class="input-group-addon">Ac. Urico</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="proteinasTotales" class="form-control" placeholder="Username">
                          <span class="input-group-addon">Proteinas Totales</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="albumina" class="form-control" placeholder="Username">
                          <span class="input-group-addon">Albumina</span>
                      </div>
                  </div>
                  <div class="form-group">
                      <label>Perfil Renal</label>
                      <div class="input-group">
                          <input type="text" name="creatinina" class="form-control" placeholder="Username">
                          <span class="input-group-addon">Creatinina</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="nitrogenoUreico" class="form-control" placeholder="Username">
                          <span class="input-group-addon">Nitrogeno Ureico</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="urea" class="form-control" placeholder="Username">
                          <span class="input-group-addon">Urea</span>
                      </div>
                  </div>
                  <div class="form-group">
                      <label>Perfil Metabolico</label>
                      <div class="input-group">
                          <input type="text" name="colesterol" class="form-control" placeholder="Username">
                          <span class="input-group-addon">Colesterol</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="trigliceridos" class="form-control" placeholder="Username">
                          <span class="input-group-addon">trigliceridos</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="hdlCol" class="form-control" placeholder="Username">
                          <span class="input-group-addon">HDL-COL</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="ldlCol" class="form-control" placeholder="Username">
                          <span class="input-group-addon">LDL-COL</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="vldl" class="form-control" placeholder="Username">
                          <span class="input-group-addon">VLDL</span>
                      </div>
                  </div>
              </div>
              <div class="col-lg-6">
                  <div class="form-group">
                      <label>Perfil Hepatico</label>
                      <div class="input-group">
                          <input type="text" name="bTotal" class="form-control" placeholder="Username">
                          <span class="input-group-addon">B. total</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="bDirecta" class="form-control" placeholder="Username">
                          <span class="input-group-addon">B. Directa</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="bIndirecta" class="form-control" placeholder="Username">
                          <span class="input-group-addon">B. Indirecta</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="astGot" class="form-control" placeholder="Username">
                          <span class="input-group-addon">AST/GOT</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="astGpt" class="form-control" placeholder="Username">
                          <span class="input-group-addon">AST/GPT</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="fAlcalina" class="form-control" placeholder="Username">
                          <span class="input-group-addon">F. Alcalina</span>
                      </div>
                  </div>
                  <div class="form-group">
                      <label>Perfil Pancreatico</label>
                      <div class="input-group">
                          <input type="text" name="amilasa" class="form-control" placeholder="Username">
                          <span class="input-group-addon">Amilasa</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="lipasa" class="form-control" placeholder="Username">
                          <span class="input-group-addon">Lipasa</span>
                      </div>

                  </div>
                  <div class="form-group">
                      <label>Perfil Electrolitico</label>
                      <div class="input-group">
                          <input type="text" name="sodio" class="form-control" placeholder="Username">
                          <span class="input-group-addon">Sodio (NA)</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="potasio" class="form-control" placeholder="Username">
                          <span class="input-group-addon">Potasio(K)</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="cloro" class="form-control" placeholder="Username">
                          <span class="input-group-addon">Cloro(Cl)</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="calcio" class="form-control" placeholder="Username">
                          <span class="input-group-addon">Calcio(Ca)</span>
                      </div>
                  </div>
              </div>
          </div>
          <hr>
			<button class="btn btn-theme-inverse" type="submit">Registrar</button>
      `;
    b = `
    
    `;
    switch (tipo) {
        case 1:
            return a;
            break;
        case 2:
            return b;
            break;
        case 3:
            return c;
            break;
        default:
            break;
    }
}

$('#lab_form1').submit(function (e) { 
    e.preventDefault();
    a=$('#lab_form1').serializeArray();
    // b=$('#lab_form1').serializeJson();
    // console.log(JSON.stringify(a));
    // console.log(b);
    lab1={'bioquimicaClinica':a}
    lab2={'coagulograma':a}
    contLab.push(lab2);
    console.log(contLab+);
});