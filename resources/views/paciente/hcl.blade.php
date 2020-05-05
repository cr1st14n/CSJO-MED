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
						<th class="text-center">EVOLUCION</th>

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