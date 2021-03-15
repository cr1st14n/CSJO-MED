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
            $('#lab_form1').html(contentFormLab(1));
            $('#md_lab_form1').modal('show');
            break;
        case 2:
            $('#').modal('show');

            break;
        case 3:
            $('#').modal('show');

            break;
        default:
            break;
    }
}

function contentFormLab(tipo) {
    a = `
      <h3>Bioquimica Clinica</h3>
      <form>
          <div class="row">
              <div class="col-lg-6">
                  <div class="form-group">
                      <label>Perfil Metabolico</label>
                      <div class="input-group">
                          <input type="text" class="form-control" placeholder="Username">
                          <span class="input-group-addon">Glucemia</span>
                      </div>
                      <div class="input-group">
                          <input type="text" class="form-control" placeholder="Username">
                          <span class="input-group-addon">Ac. Urico</span>
                      </div>
                      <div class="input-group">
                          <input type="text" class="form-control" placeholder="Username">
                          <span class="input-group-addon">Proteinas Totales</span>
                      </div>
                      <div class="input-group">
                          <input type="text" class="form-control" placeholder="Username">
                          <span class="input-group-addon">Albumina</span>
                      </div>
                  </div>
                  <div class="form-group">
                      <label>Perfil Renal</label>
                      <div class="input-group">
                          <input type="text" class="form-control" placeholder="Username">
                          <span class="input-group-addon">Creatinina</span>
                      </div>
                      <div class="input-group">
                          <input type="text" class="form-control" placeholder="Username">
                          <span class="input-group-addon">Nitrogeno Ureico</span>
                      </div>
                      <div class="input-group">
                          <input type="text" class="form-control" placeholder="Username">
                          <span class="input-group-addon">Urea</span>
                      </div>
                  </div>
                  <div class="form-group">
                      <label>Perfil Metabolico</label>
                      <div class="input-group">
                          <input type="text" class="form-control" placeholder="Username">
                          <span class="input-group-addon">Colesterol</span>
                      </div>
                      <div class="input-group">
                          <input type="text" class="form-control" placeholder="Username">
                          <span class="input-group-addon">trigliceridos</span>
                      </div>
                      <div class="input-group">
                          <input type="text" class="form-control" placeholder="Username">
                          <span class="input-group-addon">HDL-COL</span>
                      </div>
                      <div class="input-group">
                          <input type="text" class="form-control" placeholder="Username">
                          <span class="input-group-addon">LDL-COL</span>
                      </div>
                      <div class="input-group">
                          <input type="text" class="form-control" placeholder="Username">
                          <span class="input-group-addon">VLDL</span>
                      </div>
                  </div>
              </div>
              <div class="col-lg-6">
                  <div class="form-group">
                      <label>Perfil Hepatico</label>
                      <div class="input-group">
                          <input type="text" class="form-control" placeholder="Username">
                          <span class="input-group-addon">B. total</span>
                      </div>
                      <div class="input-group">
                          <input type="text" class="form-control" placeholder="Username">
                          <span class="input-group-addon">B. Directa</span>
                      </div>
                      <div class="input-group">
                          <input type="text" class="form-control" placeholder="Username">
                          <span class="input-group-addon">B. Indirecta</span>
                      </div>
                      <div class="input-group">
                          <input type="text" class="form-control" placeholder="Username">
                          <span class="input-group-addon">AST/GOT</span>
                      </div>
                      <div class="input-group">
                          <input type="text" class="form-control" placeholder="Username">
                          <span class="input-group-addon">AST/GPT</span>
                      </div>
                      <div class="input-group">
                          <input type="text" class="form-control" placeholder="Username">
                          <span class="input-group-addon">F. Alcalina</span>
                      </div>
                  </div>
                  <div class="form-group">
                      <label>Perfil Pancreatico</label>
                      <div class="input-group">
                          <input type="text" class="form-control" placeholder="Username">
                          <span class="input-group-addon">Amilasa</span>
                      </div>
                      <div class="input-group">
                          <input type="text" class="form-control" placeholder="Username">
                          <span class="input-group-addon">Lipasa</span>
                      </div>

                  </div>
                  <div class="form-group">
                      <label>Perfil Electrolitico</label>
                      <div class="input-group">
                          <input type="text" class="form-control" placeholder="Username">
                          <span class="input-group-addon">Sodio (NA)</span>
                      </div>
                      <div class="input-group">
                          <input type="text" class="form-control" placeholder="Username">
                          <span class="input-group-addon">Potasio(K)</span>
                      </div>
                      <div class="input-group">
                          <input type="text" class="form-control" placeholder="Username">
                          <span class="input-group-addon">Cloro(Cl)</span>
                      </div>
                      <div class="input-group">
                          <input type="text" class="form-control" placeholder="Username">
                          <span class="input-group-addon">Calcio(Ca)</span>
                      </div>

                  </div>
              </div>
          </div>
      </form>
      `;
    b=`
    
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
