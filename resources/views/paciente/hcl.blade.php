<section class="panel ">
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
					<li class="active"><a href="#tab1" data-toggle="tab">Historico de recetas </a></li>
					<li><a href="#tab2" data-toggle="tab">Consulta Medica</a></li>
					<li><a href="#tab3" data-toggle="tab"> Laboratorios</a></li>
					<li><a href="#tab4" data-toggle="tab"> Rayos X</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane fade in active" id="tab1">
						<table class="table table-bordered">
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
									<td>{{$r->usu_nombre }} {{$r->usu_appaterno }} {{$r->usu_apmaterno  }}</td>
									<td>
										<button class="btn btn-theme-inverse" onclick='showHCL2("{{$r->id}}")'><i class="fa fa-chain"></i></button>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					</div>
					<div class="tab-pane fade" id="tab2">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					</div>
					<div class="tab-pane fade" id="tab3">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					</div>
					<div class="tab-pane fade" id="tab4">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					</div>
				</div>
			</div>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th class="text-center">ANTECEDENTES</th>

					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="text-center"></td>
					</tr>
					<tr>
						<td class="text-center"></td>
					</tr>
					<tr>
						<td class="text-center"></td>
					</tr>
					<tr>
						<td class="text-center"></td>
					</tr>

				</tbody>
			</table>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th width="20%"> FECHA</th>
						<th class="text-center">DESCRIPCION</th>

					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="text-center"></td>
						<td class="text-center"></td>
					</tr>
					<tr>
						<td class="text-center"></td>
						<td class="text-center"></td>
					</tr>
					<tr>
						<td class="text-center"></td>
						<td class="text-center"></td>
					</tr>
					<tr>
						<td class="text-center"></td>
						<td class="text-center"></td>
					</tr>

					<tr>
						<td class="text-center"></td>
						<td class="text-center"></td>
					</tr>
					<tr>
						<td class="text-center"></td>
						<td class="text-center"></td>
					</tr>
					<tr>
						<td class="text-center"></td>
						<td class="text-center"></td>
					</tr>
					<tr>
						<td class="text-center"></td>
						<td class="text-center"></td>
					</tr>
					<tr>
						<td class="text-center"></td>
						<td class="text-center"></td>
					</tr>
					<tr>
						<td class="text-center"></td>
						<td class="text-center"></td>
					</tr>
					<tr>
						<td class="text-center"></td>
						<td class="text-center"></td>
					</tr>
				</tbody>
			</table>
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