<section class="panel">
	<div class="panel-body">
		<div class="invoice">
			<div class="row">
				<div class="col-sm-6">
					<a href="#"><img src="{{ asset('Plantilla/assets/img/logo_reporte.png')}}"></a>
				</div>
				<div class="col-sm-6 align-lg-center">
					<h4>HISTORIA CLINICA <br>CONSULTA EXTERNA <br># HCL.:{{$paciente->pa_hcl}} </h4>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-sm-12">

					<table width="100%" style="text-transform: uppercase;">

						<tbody>
							<tr>
								<td>
									<input type="number" id="paciente_id_HCL" value="{{$paciente->pa_id}}" hidden>
									<label id="paciente_id_HCL"></label>
									<h5>NOMBRE : {{$paciente->pa_appaterno }} {{$paciente->pa_apmaterno }} {{$paciente->pa_nombre }}</h5>
								</td>
								<td>
									<h5>C.I.: {{$paciente->pa_ci}} </h5>
								</td>
							</tr>
							<tr>
								<td>
									<h5>DIRECCION : {{$paciente->pa_zona}} - {{$paciente->pa_domicilio}} </h5>
								</td>
								<td>
									<h5>TELF/CEL: {{$paciente->pa_telf}}</h5>
								</td>
							</tr>
							<tr>
								<td>
									<h5>LUGAR DE NACIMIENTO: {{$paciente->pa_pais_nac}} / {{ $paciente->pa_ciudad_nac}} </h5>
								</td>
								<td>
									<h5>FECHA DE NACIMIENTO: {{$fechnac}} </h5>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<hr>
			<div class="tabbable">
				<ul class="nav nav-tabs" data-provide="tabdrop">
					<li class="active"><a href="#tab1" data-toggle="tab">Recetas Medicas </a></li>
					<li><a href="#tab2" data-toggle="tab" onclick="btn_listConsultasMedicas()">Consulta Medica</a></li>
					<li><a href="#tab3" data-toggle="tab"> Laboratorios</a></li>
					<li><a href="#tab4" data-toggle="tab" onclick="btn_funlistserRX()"> Rayos X</a></li>
					<li><a href="#tab5" data-toggle="tab" onclick="btn_listSV()"> Signos Vitales</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane fade in active" id="tab1">
						<button class="btn btn-theme-inverse btn-block btn-sm" onclick="showFormRcetario()"><i class="fa fa-plus"></i></button>
						<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Fecha</th>
									<th>Especialidad</th>
									<th>Medico</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($receta as $r)
								<tr>
									<td>{{$r->created_at}}</td>
									<td>Medicina Familiar</td>
									<td>{{$r->usu_nombre }} {{$r->usu_appaterno }} {{$r->usu_apmaterno }}</td>
									<td>
										<span class="tooltip-area">
											<button onclick='showHCL2("{{$r->id}}")' class="btn btn-default btn-sm" title="Edit"><i class=" glyphicon glyphicon-eye-open"></i></button>
										</span>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<div class="tab-pane fade" id="tab2">
						<button class="btn btn-theme-inverse btn-block btn-sm" onclick="showModalFormConsulta()"><i class="fa fa-plus"></i></button>
						<div class="table-responsive">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Fecha</th>
										<th>Motivo</th>
										<th>Diagnostico</th>
										<th>Medico</th>
										<th width="10%"></th>
									</tr>
								</thead>
								<tbody align="center" id="listConsultasMedicas">
									<tr>
										<td>1</td>
										<td>dd-mm-yyyy</td>
										<td valign="middle">Medicina Familiar</td>
										<td><span class="label label-success">Nombre del medico</span></td>
										<td>
											<span class="tooltip-area">
												<a href="javascript:void(0)" class="btn btn-default btn-sm" title="Edit"><i class="fa fa-pencil"></i></a>
												<a href="javascript:void(0)" class="btn btn-default btn-sm" title="Delete"><i class="fa fa-trash-o"></i></a>
											</span>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="tab-pane fade" id="tab3">
						<div class="table-responsive">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>No.</th>
										<th>Fecha</th>
										<th>Descripcion</th>
										<th width="30%"></th>
									</tr>
								</thead>
								<tbody align="center">
									<tr>
										<td>1</td>
										<td>dd-mm-yyyy</td>
										<td>Prueva de sangre</td>
										<td>
											<span class="tooltip-area">
												<a href="javascript:void(0)" class="btn btn-default btn-sm" title="Edit"><i class="fa fa-pencil"></i></a>
												<a href="javascript:void(0)" class="btn btn-default btn-sm" title="Delete"><i class="fa fa-trash-o"></i></a>
											</span>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="tab-pane fade" id="tab4">
						<div class="table-responsive">
							<button class="btn btn-theme-inverse btn-block btn-sm" onclick="showModalRegisterfunlistserRX()"><i class="fa fa-plus"></i></button>

							<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th># factura</th>
										<th>Fecha</th>
										<th>Medico</th>
										<th>Detalle</th>
										<th width="20%"></th>
									</tr>
								</thead>
								<tbody align="center" id="table_listServRX">
								</tbody>
							</table>
						</div>
					</div>
					<div class="tab-pane fade" id="tab5">
						<div class="table-responsive">
							<button class="btn btn-theme-inverse btn-block btn-sm" onclick="showFormSignosVitales()"><i class="fa fa-plus"></i></button>
							<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Fecha</th>
										<th>P. A.</th>
										<th>F. C.</th>
										<th>F. R.</th>
										<th>Sat.</th>
										<th>Tempe</th>
										<th>Peso</th>
										<th>Talla</th>
										<th>IMC</th>
										<th width="10%"></th>
									</tr>
								</thead>
								<tbody align="center" id="table_listSV">
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td>
											<span class="tooltip-area">
												<button class="btn btn-default btn-sm" title="Edit" onclick="show_modalPlacaRX(55)"><i class="fa fa-eye-slash"></i></button>
											</span>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="btn-group btn-group-justified" id="btn_consulta_imprimir">
						<a href="#" onclick="showModalTipoConsulta('{{$paciente->pa_id}}' )" class="btn btn-theme-inverse btn-transparent "><i class="fa fa-stethoscope"></i>Registrar atencion</a>
						<a href="javascript:window.print();" class="btn btn-theme-inverse btn-transparent  "><i class="fa fa-print"></i> Imprimir</a>
					</div>
				</div>
			</div>
		</div>
		<!-- //invoice -->
	</div>
</section>