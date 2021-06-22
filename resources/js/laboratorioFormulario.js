function contentFormLab(tipo) {
    //*    Bioquimica clinica
    a = `
      <h3>Bioquimica Clinica</h3>
          <div class="row">
			<input type="hidden" value="1">
              <div class="col-lg-6">
                  <div class="form-group">
                      <label>Perfil Metabolico</label>
                      <div class="input-group">
                          <input type="text" name="glucemia" class="form-control" placeholder="--" autocomplete="off">
                          <span class="input-group-addon">Glucemia</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="acUrico" class="form-control" placeholder="--" autocomplete="off">
                          <span class="input-group-addon">Ac. Urico</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="proteinasTotales" class="form-control" placeholder="--" autocomplete="off">
                          <span class="input-group-addon">Proteinas Totales</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="albumina" class="form-control" placeholder="--" autocomplete="off">
                          <span class="input-group-addon">Albumina</span>
                      </div>
                  </div>
                  <div class="form-group">
                      <label>Perfil Renal</label>
                      <div class="input-group">
                          <input type="text" name="creatinina" class="form-control" placeholder="--" autocomplete="off">
                          <span class="input-group-addon">Creatinina</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="nitrogenoUreico" class="form-control" placeholder="--" autocomplete="off">
                          <span class="input-group-addon">Nitrogeno Ureico</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="urea" class="form-control" placeholder="--" autocomplete="off">
                          <span class="input-group-addon">Urea</span>
                      </div>
                  </div>
                  <div class="form-group">
                      <label>Perfil Metabolico</label>
                      <div class="input-group">
                          <input type="text" name="colesterol" class="form-control" placeholder="--" autocomplete="off">
                          <span class="input-group-addon">Colesterol</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="trigliceridos" class="form-control" placeholder="--" autocomplete="off">
                          <span class="input-group-addon">trigliceridos</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="hdlCol" class="form-control" placeholder="--" autocomplete="off">
                          <span class="input-group-addon">HDL-COL</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="ldlCol" class="form-control" placeholder="--" autocomplete="off">
                          <span class="input-group-addon">LDL-COL</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="vldl" class="form-control" placeholder="--" autocomplete="off">
                          <span class="input-group-addon">VLDL</span>
                      </div>
                  </div>
              </div>
              <div class="col-lg-6">
                  <div class="form-group">
                      <label>Perfil Hepatico</label>
                      <div class="input-group">
                          <input type="text" name="bTotal" class="form-control" placeholder="--" autocomplete="off">
                          <span class="input-group-addon">B. total</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="bDirecta" class="form-control" placeholder="--" autocomplete="off">
                          <span class="input-group-addon">B. Directa</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="bIndirecta" class="form-control" placeholder="--" autocomplete="off">
                          <span class="input-group-addon">B. Indirecta</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="astGot" class="form-control" placeholder="--" autocomplete="off">
                          <span class="input-group-addon">AST/GOT</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="astGpt" class="form-control" placeholder="--" autocomplete="off">
                          <span class="input-group-addon">AST/GPT</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="fAlcalina" class="form-control" placeholder="--" autocomplete="off">
                          <span class="input-group-addon">F. Alcalina</span>
                      </div>
                  </div>
                  <div class="form-group">
                      <label>Perfil Pancreatico</label>
                      <div class="input-group">
                          <input type="text" name="amilasa" class="form-control" placeholder="--" autocomplete="off">
                          <span class="input-group-addon">Amilasa</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="lipasa" class="form-control" placeholder="--" autocomplete="off">
                          <span class="input-group-addon">Lipasa</span>
                      </div>

                  </div>
                  <div class="form-group">
                      <label>Perfil Electrolitico</label>
                      <div class="input-group">
                          <input type="text" name="sodio" class="form-control" placeholder="--" autocomplete="off">
                          <span class="input-group-addon">Sodio (NA)</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="potasio" class="form-control" placeholder="--" autocomplete="off">
                          <span class="input-group-addon">Potasio(K)</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="cloro" class="form-control" placeholder="--" autocomplete="off">
                          <span class="input-group-addon">Cloro(Cl)</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="calcio" class="form-control" placeholder="--" autocomplete="off">
                          <span class="input-group-addon">Calcio(Ca)</span>
                      </div>
                  </div>
              </div>
          </div>
          <hr>
			<button class="btn btn-theme-inverse" type="submit">Registrar</button>
      `;
    //* Coagulograma
    b = `
        <h3>Coagulograma</h3><br>
            <div class="row">
			    <input type="hidden" value="1">
                <div class="col-lg-12">
                    <div class="form-group">
                          <div class="input-group">
                          <input type="text" name="tiempoCoagulacion" class="form-control" placeholder="Tiempo de coagulación" autocomplete="off" required>
                          <span class="input-group-addon">MIN</span>
                    </div>
                    <div class="input-group">
                          <input type="text" name="tiempoSangria" class="form-control" placeholder="Tiempo de sangria" autocomplete="off" required>
                          <span class="input-group-addon">MIN</span>
                    </div>
                    <div class="input-group">
                          <input type="text" name="tiempoProtrombina" class="form-control" placeholder="Tiempo de protombina" autocomplete="off" required>
                          <span class="input-group-addon">#</span>
                    </div>
                    <div class="input-group">
                          <input type="text" name="actividadProtrombina" class="form-control" placeholder="Actividad protrombinica" autocomplete="off">
                          <span class="input-group-addon">#</span>
                    </div>
                    <div class="input-group">
                          <input type="text" name="INR" class="form-control" placeholder="INR" autocomplete="off">
                          <span class="input-group-addon">#</span>
                    </div>
                </div>
            </div>
        <hr>
		<button class="btn btn-theme-inverse" type="submit">Registrar</button>
      `;
    //    *Biometria Hematica
    c = `
      <h3 align="center">Biometria Hematica</h3><br>
      <h4>Cuadro Hematico</h4><br>
          <div class="row">
              <input type="hidden" value="1">
              <div class="col-lg-12">
                  <div class="form-group">
                        <div class="input-group">
                        <input type="text" name="Glóbulos Rojos" class="form-control" placeholder="Glóbulos Rojos" autocomplete="off" required>
                        <span class="input-group-addon">millones/mm3</span>
                  </div>
                  <div class="input-group">
                        <input type="text" name="Hemoglobina" class="form-control" placeholder="Hemoglobina" autocomplete="off" required>
                        <span class="input-group-addon">g/dL</span>
                  </div>
                  <div class="input-group">
                        <input type="text" name="Hematocrito" class="form-control" placeholder="Hematocrito" autocomplete="off" required>
                        <span class="input-group-addon">%</span>
                  </div>
                  <div class="input-group">
                        <input type="text" name="VES" class="form-control" placeholder="VES" autocomplete="off">
                        <span class="input-group-addon">mm/hora</span>
                  </div>
                  <div class="input-group">
                        <input type="text" name="Leucocitos" class="form-control" placeholder="Leucocitos" autocomplete="off">
                        <span class="input-group-addon">x/mm3</span>
                  </div>
                  <div class="input-group">
                        <input type="text" name="Cayados" class="form-control" placeholder="Cayados" autocomplete="off">
                        <span class="input-group-addon">%</span>
                  </div>
                  <div class="input-group">
                        <input type="text" name="Neutrofilos" class="form-control" placeholder="Neutrofilos" autocomplete="off">
                        <span class="input-group-addon">%</span>
                  </div>
                  <div class="input-group">
                        <input type="text" name="Eosinófilos" class="form-control" placeholder="Eosinófilos" autocomplete="off">
                        <span class="input-group-addon">%</span>
                  </div>
                  <div class="input-group">
                        <input type="text" name="Basófilos" class="form-control" placeholder="Basófilos" autocomplete="off">
                        <span class="input-group-addon">%</span>
                  </div>
                  <div class="input-group">
                        <input type="text" name="Linfocitos" class="form-control" placeholder="Linfocitos" autocomplete="off">
                        <span class="input-group-addon">%</span>
                  </div>
                  <div class="input-group">
                        <input type="text" name="Monocitos" class="form-control" placeholder="Monocitos" autocomplete="off">
                        <span class="input-group-addon">%</span>
                  </div>
              </div>
          </div>
      <hr>
      <button class="btn btn-theme-inverse" type="submit">Registrar</button>
    `;
    //    *Grupo Sanguineo
    d = `
      <h3 align="center">Serologia</h3><br>
          <div class="row">
              <input type="hidden" value="1">
              <div class="col-lg-12">
                  <div class="form-group">
                        <div class="input-group">
                        <span class="input-group-addon">Grupo Sanguineo</span>
                        <input type="text" name="grupoSanguineo" class="form-control" placeholder="Glóbulos Rojos" autocomplete="off" required>
                  </div>
                  <div class="input-group">
                  <span class="input-group-addon">Factor Rh</span>
                        <input type="text" name="factorRha" class="form-control" placeholder="Hemoglobina" autocomplete="off" required>
                  </div>   
                  <div class="input-group">
                        <span class="input-group-addon">R.P.R.</span>
                        <input type="text" name="RPR" class="form-control" placeholder="Hematocrito" autocomplete="off" required>
                  </div>
                  <div class="input-group">
                        <span class="input-group-addon">P.C.R.</span>
                        <input type="text" name="pcr" class="form-control" placeholder="VES" autocomplete="off">
                        <span class="input-group-addon">mg/L   &lt; 12mg/L</span>
                  </div>
                  <div class="input-group">
                        <span class="input-group-addon">F. Reumatoide</span>
                        <input type="text" name="fReomatoide" class="form-control" placeholder="Leucocitos" autocomplete="off">
                        <span class="input-group-addon">UI/mL 20-30 UI/mL</span>
                  </div>
                  <div class="input-group">
                  <span class="input-group-addon">A.S.T.O.</span>
                        <input type="text" name="Cayados" class="form-control" placeholder="Cayados" autocomplete="off">
                        <span class="input-group-addon">UI/mL &lt; a 200UI/mL</span>
                  </div>
                  <div class="input-group">
                  <span class="input-group-addon">n</span>
                        <input type="text" name="Neutrofilos" class="form-control" placeholder="Neutrofilos" autocomplete="off">
                        <span class="input-group-addon"></span>
                  </div>
            <br>
            <h4>Prueba Rapida de VIH</h4>      

                  <div class="input-group">
                  <span class="input-group-addon">Muestra</span>
                        <input type="text" name="muestra" class="form-control" placeholder="Eosinófilos" autocomplete="off">
                  </div>
                  <div class="input-group">
                  <span class="input-group-addon">Examen Solicitado</span>
                        <input type="text" name="examenSolicitado" class="form-control" placeholder="Basófilos" autocomplete="off">
                  </div>
                  <div class="input-group">
                  <span class="input-group-addon">Resultado</span>
                        <input type="text" name="resultado" class="form-control" placeholder="Linfocitos" autocomplete="off">
                  </div>
            <br>
            <h4>Antigenos Febriles (WIDAL)</h4>   
                  <div class="input-group">
                  <span class="input-group-addon">Eberth</span>
                  <input type="text" name="resultado" class="form-control" placeholder="Linfocitos" autocomplete="off">
                  <span class="input-group-addon">1/80</span>
                  </div>
                  <div class="input-group">
                  <span class="input-group-addon">Eberth</span>
                  <input type="text" name="resultado" class="form-control" placeholder="Linfocitos" autocomplete="off">
                  <span class="input-group-addon">1/40</span>
                  </div>
                  <div class="input-group">
                  <span class="input-group-addon">Paratifus</span>
                  <input type="text" name="resultado" class="form-control" placeholder="Linfocitos" autocomplete="off">
                  <span class="input-group-addon">1/40</span>
                  </div>
                  <div class="input-group">
                  <span class="input-group-addon">Paratifus</span>
                  <input type="text" name="resultado" class="form-control" placeholder="Linfocitos" autocomplete="off">
                  <span class="input-group-addon">1/80</span>
                  </div>
              </div>
          </div>
      <hr>
      <button class="btn btn-theme-inverse" type="submit">Registrar</button>
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
        case 4:
            return d;
            break;
        default:
            break;
    }
}
