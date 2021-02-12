<!DOCTYPE html>
<html lang="es">

<head>

	<!-- Meta information -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- Title-->
	<title>{{ config('app.name', 'Laravel') }} | Med</title>
	<!-- Favicons -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('Plantilla/assets/ico/apple-touch-icon-144-precomposed.png')}}">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('Plantilla/assets/ico/apple-touch-icon-114-precomposed.png')}}">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('Plantilla/assets/ico/apple-touch-icon-72-precomposed.png')}}">
	<link rel="apple-touch-icon-precomposed" href="{{ asset('Plantilla/assets/ico/apple-touch-icon-57-precomposed.png')}}">
	<link rel="shortcut icon" href="{{ asset('Plantilla/assets/ico/CSJO.ico')}}">

	<!-- CSS Stylesheet-->
	<link type="text/css" rel="stylesheet" href="{{ asset('Plantilla/assets/css/bootstrap/bootstrap.min.css')}}" />
	<link type="text/css" rel="stylesheet" href="{{ asset('Plantilla/assets/css/bootstrap/bootstrap-themes.css')}}" />
	<link type="text/css" rel="stylesheet" href="{{ asset('Plantilla/assets/css/style.css')}}" />

	<!-- Styleswitch if  you don't chang theme , you can delete -->
	<link type="text/css" rel="alternate stylesheet" media="screen" title="style1" href="{{ asset('Plantilla/assets/css/styleTheme1.css')}}" />
	<link type="text/css" rel="alternate stylesheet" media="screen" title="style2" href="{{ asset('Plantilla/assets/css/styleTheme2.css')}}" />
	<link type="text/css" rel="alternate stylesheet" media="screen" title="style3" href="{{ asset('Plantilla/assets/css/styleTheme3.css')}}" />
	<link type="text/css" rel="alternate stylesheet" media="screen" title="style4" href="{{ asset('Plantilla/assets/css/styleTheme4.css')}}" />


	<style>
		/* styles unrelated to zoom */
		* {
			border: 0;
			margin: 0;
			padding: 0;
		}

		/* p {
			position: absolute;
			top: 3px;
			right: 28px;
			color: #555;
			font: bold 13px/1 sans-serif;
		} */

		/* these styles are for the demo, but are not required for the plugin */
		.zoom {
			display: inline-block;
			position: relative;
		}

		/* magnifying glass icon */
		.zoom:after {
			content: '';
			display: block;
			width: 33px;
			height: 33px;
			position: absolute;
			top: 0;
			right: 0;
			background: url(icon.png);
		}

		.zoom img {
			display: block;
		}

		.zoom img::selection {
			background-color: transparent;
		}

		#ex2 img:hover {
			cursor: url(grab.cur), default;
		}

		#ex2 img:active {
			cursor: url(grabbed.cur), default;
		}
	</style>
	<!-- css de dropzone para carga de imagenes -->
	<link href="{{ asset('Plantilla/dropzone/dist/dropzone.css')}}" rel="stylesheet" />


</head>

<body>
	<div id="wrapper">
		<div id="header">
			<div class="logo-area clearfix">
				<a href="#" class="logo"></a>
			</div>

			<div class="tools-bar">
				<ul class="nav navbar-nav nav-main-xs">
					<li><a href="#menu" class="icon-toolsbar"><i class="fa fa-bars"></i></a></li>
				</ul>
				<ul class="nav navbar-nav nav-top-xs hidden-xs tooltip-area">
					<li class="h-seperate"></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i class="fa fa-th-large"></i></a>
						<ul class="dropdown-menu arrow animated fadeInDown fast">
							<li><a href="#"> Cotizaciones Realizadas</a></li>
						</ul>
						<!-- //dropdown-menu-->
					</li>
					<li class="h-seperate"></li>
				</ul>
				<ul class="nav navbar-nav navbar-right tooltip-area">
					<li><a href="#" class="nav-collapse avatar-header" data-toggle="tooltip" title="Show / hide  menu" data-container="body" data-placement="bottom">
							<img alt="" src="{{asset('Plantilla/assets/img/usuMed1.png')}}" class="circle">
							<span class="badge">3</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
							<em><strong>Hola</strong>, {{Auth::user()->usu_nombre}} {{Auth::user()->usu_appaterno}} </em> <i class="dropdown-icon fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu pull-right icon-right arrow">
							<li><a href="#"><i class="fa fa-user"></i> Perfil </a></li>
							<li class="divider"></li>
							<li><a href="" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
									<i class="fa fa-sign-out"></i>salir
								</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
								</form>
							</li>
						</ul>
					</li>
					<li class="visible-lg">
						<a href="#" class="h-seperate fullscreen" data-toggle="tooltip" title="Full Screen" data-container="body" data-placement="left">
							<i class="fa fa-expand"></i>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<div id="nav">
			<div id="nav-scroll">
				<div class="avatar-slide">

					<span class="easy-chart avatar-chart" data-color="theme-inverse" data-percent="100" data-track-color="rgba(255,255,255,0.1)" data-line-width="5" data-size="118">
						<span class="percent"></span>
						<img alt="" src="{{asset('Plantilla/assets/img/usuMed1.png')}}" class="circle">
					</span>
					<!-- //avatar-chart-->

					<div class="avatar-detail">
						<p><strong>Dr.</strong>, {{Auth::user()->usu_nombre}} {{Auth::user()->usu_appaterno}}</p>
					</div>
					<!-- //avatar-detail-->

					<div class="avatar-link btn-group btn-group-justified">
						<a class="btn" href="#" onclick="show_modal_corizacion_formulario(1)" title="Formulario de Cotizacion">
							<i class="fa fa-medkit"></i><em class="green"></em>
						</a>
						<a class="btn" onclick="colaPacienteMedAten()" title="Pacientes en Espera">
							<i class="fa fa-stethoscope"></i><em class="active"></em>
						</a>
					</div>
				</div>
				<div class="widget-collapse dark">
					<header>
						<a href="#"><i class="collapse-caret fa fa-cloud-download "></i> Actual Pacientes en espera </a>
					</header>
					<section class="" id="collapseSummary">
						<div class="collapse-boby" style="padding:0">
						</div>
					</section>
				</div>
			</div>
		</div>
		<div id="main">
			<ol class="breadcrumb">
				<li class="active">Inicio</li>
				<!-- <li><a href="#">Home</a></li> -->
			</ol>
			<div id="content">
				<div class="row">
					<div class="col-lg-8" id="panel1">
						<section class="panel">

						</section>
					</div>
					<div class="col-lg-4">
						<div class="well bg-theme">
							<div class="widget-tile">
								<section>
									<h5><strong>Pacientes </strong> En Espera </h5>
									<h2 id="nroPacientesFila">...</h2>
								</section>
								<div class="hold-icon"><i class="fa fa-wheelchair"></i></div>
							</div>
						</div>
						<section class="panel">
							<div class="widget-clock">
								<div id="clock"></div>
							</div>
						</section>
						<section class="panel">
							<header class="panel-heading">
							</header>
							<div class=" panel-body align-xs-center">
								<ul class=" bs-glyphicons">
								</ul>
							</div>
						</section>
						<section class="panel">
							<div class="panel-body align-xs-center">
								<h4>Funciones Medicas</h4>
								<br>
								<button type="button" id="btn_showFormSignosVitales" class="btn btn-theme-inverse btn-transparent"><i class="glyphicon glyphicon-signal"></i></button>
								<button type="button" id="btn_showFormConsulta" class="btn btn-theme-inverse btn-transparent"><i class="glyphicon glyphicon-plus-sign"></i></button>
								<button type="button" id="form_resetarioMedico" class="btn btn-theme-inverse btn-transparent"><i class="glyphicon glyphicon-file"></i></button>
								<button type="button" class="btn btn-theme-inverse btn-transparent"><i class="glyphicon glyphicon-headphones"></i></button>
								<button type="button" id="btn_showFormRx" class="btn btn-theme-inverse btn-transparent"><i class="glyphicon  glyphicon-camera "></i></button>
							</div>
						</section>
					</div>
				</div>
			</div>
		</div>
		
		<div id="md-listPacientesEspera" class="modal fade md-slideUp bg-theme-inverse" tabindex="-1" data-width="450">
			<div class="modal-header bd-theme-inverse-darken">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
				<h4 class="modal-title"><i class="fa fa-paste"></i> Pacientes en espera</h4>
			</div>
			<div class="modal-body" style="padding:0">
				<div class="widget-im">
					<ul id="list_PacientesEspera">
						<li>
							<section class="thumbnail-in">
								<div class="widget-im-tools tooltip-area pull-right">
									<span>
										<time datetime="2013-11-16">1 : 52 am</time>
									</span>
								</div>
								<h4><a href="#" onclick="showHistoriaClinica(1)">Nombre del paciente</a>
								</h4>
								<div class="im-thumbnail"><img alt="" src="{{('Plantilla/assets/img/paciente.png')}}" /></div>
								<label></label>
								<div class="pre-text">Tipo de procedimiento requerido</div>
							</section>
						</li>
						<li>
							<section class="thumbnail-in">
								<div class="widget-im-tools tooltip-area pull-right">
									<span>
										<time datetime="2013-11-16">1 : 52 am</time>
									</span>
								</div>
								<h4><a href="javascript:void(0)">Nombre del paciente</a>
								</h4>
								<div class="im-thumbnail"><img alt="" src="{{('Plantilla/assets/img/paciente.png')}}" /></div>
								<label></label>
								<div class="pre-text">Tipo de procedimiento requerido</div>
							</section>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- start modal modal list tipos de procedimientos -->
		<div id="md-tipoConsulta" class="modal fade md-stickTop bg-danger" tabindex="-1" data-width="300">
			<div class="modal-header bg-theme-inverse-darken">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
				<h4 class="modal-title"><i class="fa fa-plus-square"></i> Tipo de procedimiento</h4>
			</div>
			<div class="modal-body" style="padding:0">
				<div class="widget-im notification">
					<ul>
						<li>
							<section class="thumbnail-in">
								<div class=" pull-right ">
									<button class="btn btn-circle bg-inverse" onclick="ShowModalAtencion(1)"><i class="fa fa-arrow-right "></i></button>
								</div>
								<h4>Consulta Externa</h4><br>
								<div class="im-thumbnail btn-theme-inverse "><img src="Plantilla/assets/img/consultaExterna.png" alt="" style="height: 40px; width:50px "></div>
							</section>
						</li>
						<li>
							<section class="thumbnail-in">
								<div class=" pull-right ">
									<button class="btn btn-circle btn-theme-inverse" onclick="ShowModalAtencion(2)"><i class="fa fa-arrow-right"></i></button>
								</div>
								<h4>Prenatal, Parto <br> y Puerperio</h4><br>
								<div class="im-thumbnail bg-warning-gradient"><img src="Plantilla/assets/img/prenatal.png" alt="" style="height: 40px; width:50px "></div>
							</section>
						</li>
						<li>
							<section class="thumbnail-in">
								<div class=" pull-right ">
									<button class="btn btn-circle btn-theme-inverse" onclick="ShowModalAtencion(3)"><i class="fa fa-arrow-right"></i></button>
								</div>
								<h4>Anticoncepcion</h4><br>
								<div class="im-thumbnail bg-primary-gradient"><img src="Plantilla/assets/img/vacunas.png" alt="" style="height: 40px; width:50px "></div>
							</section>
						</li>
						<li>
							<section class="thumbnail-in">
								<div class=" pull-right ">
									<button class="btn btn-circle btn-theme-inverse" onclick="ShowModalAtencion(4)"><i class="fa fa-arrow-right"></i></button>
								</div>
								<h4>Internacines</h4><br>
								<div class="im-thumbnail bg-theme-inverse-gradient"><img src="Plantilla/assets/img/internaciones.png" alt="" style="height: 40px; width:50px "></div>
							</section>
						</li>
						<li>
							<section class="thumbnail-in">
								<div class=" pull-right ">
									<button class="btn btn-circle btn-theme-inverse" onclick="ShowModalAtencion(5)"><i class="fa fa-arrow-right"></i></button>
								</div>
								<h4>Odontologia</h4><br>
								<div class="im-thumbnail bg-theme-inverse-gradient"><img src="Plantilla/assets/img/odontologia.png" alt="" style="height: 40px; width:50px "></div>
							</section>
						</li>
						<li>
							<section class="thumbnail-in">
								<div class=" pull-right ">
									<button class="btn btn-circle btn-theme-inverse" onclick="ShowModalAtencion(6)"><i class="fa fa-arrow-right"></i></button>
								</div>
								<h4>Vacunas</h4><br>
								<div class="im-thumbnail bg-danger-gradient"><img src="Plantilla/assets/img/vacunas.png" style="height: 40px; width:50px "></div>
							</section>
						</li>

					</ul>
				</div>
			</div>
		</div>

		<!-- modal de cotizaciones -->
		<div id="md-notification" class="modal fade md-stickTop bg-gradient-blue " tabindex="-1" data-width="500">
			<div class="modal-header bd-danger-darken">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
				<h4 class="modal-title"><i class="fa fa-bell-o"></i> Formularios para cotizaciones</h4>
			</div>
			<div class="modal-body" style="padding:0">
				<div class="widget-im notification">
					<ul>
						<li>
							<section class="thumbnail-in">
								<div class=" pull-right ">
									<button class="btn btn-circle btn-theme-inverse" onclick="show_modal_corizacion_formulario(1)"><i class="fa fa-arrow-right"></i></button>
								</div>
								<h4>Formulario Basico</h4><br>
								<div class="im-thumbnail bg-danger-gradient"><img src="Plantilla/assets/img/vacunas.png" style="height: 40px; width:50px "></div>
							</section>
						</li>
						<li>
							<section class="thumbnail-in">
								<div class=" pull-right ">
									<button class="btn btn-circle btn-theme-inverse" onclick="ShowModalAtencion(6)"><i class="fa fa-arrow-right"></i></button>
								</div>
								<h4>Gastroenterología</h4><br>
								<div class="im-thumbnail bg-danger-gradient"><img src="Plantilla/assets/img/vacunas.png" style="height: 40px; width:50px "></div>
							</section>
						</li>
						<li>
							<section class="thumbnail-in">
								<div class=" pull-right ">
									<button class="btn btn-circle btn-theme-inverse" onclick="ShowModalAtencion(6)"><i class="fa fa-arrow-right"></i></button>
								</div>
								<h4>Traumatologia</h4><br>
								<div class="im-thumbnail bg-danger-gradient"><img src="Plantilla/assets/img/vacunas.png" style="height: 40px; width:50px "></div>
							</section>
						</li>
						<li>
							<section class="thumbnail-in">
								<div class=" pull-right ">
									<button class="btn btn-circle btn-theme-inverse" onclick="ShowModalAtencion(6)"><i class="fa fa-arrow-right"></i></button>
								</div>
								<h4>Ginecologia</h4><br>
								<div class="im-thumbnail bg-danger-gradient"><img src="Plantilla/assets/img/vacunas.png" style="height: 40px; width:50px "></div>
							</section>
						</li>
						<li>
							<section class="thumbnail-in">
								<div class=" pull-right ">
									<button class="btn btn-circle btn-theme-inverse" onclick="ShowModalAtencion(6)"><i class="fa fa-arrow-right"></i></button>
								</div>
								<h4>Pediatria</h4><br>
								<div class="im-thumbnail bg-danger-gradient"><img src="Plantilla/assets/img/vacunas.png" style="height: 40px; width:50px "></div>
							</section>
						</li>
						<li>
							<section class="thumbnail-in">
								<div class=" pull-right ">
									<button class="btn btn-circle btn-theme-inverse" onclick="ShowModalAtencion(6)"><i class="fa fa-arrow-right"></i></button>
								</div>
								<h4>Medicina familiar</h4><br>
								<div class="im-thumbnail bg-danger-gradient"><img src="Plantilla/assets/img/vacunas.png" style="height: 40px; width:50px "></div>
							</section>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<!-- modal form registro de signos vitales -->

		<div id="md-formSignosVitales" class="modal fade md-flipVer bg-theme-inverse-lighten" tabindex="-1" data-width="800">
			<div class="modal-header ">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
				<h4 class="modal-title"><i class="fa fa-bell-o"></i> Registro de signos vitales</h4>
			</div>
			<div class="modal-body" style="padding:0">
				<div class="widget-im notification">
					<div class="panel-body">
						<form id="form_create_signosVitales">
							@csrf
							<div class="row">
								<div class="col-md-6">
									<span style="color:dimgrey ;font-weight:bolder">Precion Arterial </span>
									<div class="input-group">
										<input type="text" class="form-control" tabindex="1" name="pa">
										<span class="input-group-addon">P.A.</span>
									</div>
								</div>
								<div class="col-md-6">
									<span style="color:dimgrey ;font-weight:bolder">Frecuencia Cardiaca</span>
									<div class="input-group">
										<input type="text" class="form-control" tabindex="2" name="fc">
										<span class="input-group-addon">F.C.</span>
									</div>
								</div>
								<div class="col-md-6">
									<span style="color:dimgrey ;font-weight:bolder">Frecuencia Respiratoria </span>
									<div class="input-group">
										<input type="text" class="form-control" tabindex="3" name="fr">
										<span class="input-group-addon">F.R.</span>
									</div>
								</div>
								<div class="col-md-6">
									<span style="color:dimgrey ;font-weight:bolder">Saturacion</span>
									<div class="input-group">
										<input type="text" class="form-control" tabindex="4" name="st">
										<span class="input-group-addon">SAT.</span>
									</div>
								</div>
								<div class="col-md-6">
									<span style="color:dimgrey ;font-weight:bolder">Peso</span>
									<div class="input-group">
										<input type="number" class="form-control" id="pesoPaciente" name="pe" onkeyup="calcularIMC()" tabindex="5">
										<span class="input-group-addon">Kg.</span>
									</div>
								</div>
								<div class="col-md-6">
									<span style="color:dimgrey ;font-weight:bolder">Temperatura</span>
									<div class="input-group">
										<input type="text" class="form-control" tabindex="7" name="te">
										<span class="input-group-addon">°C</span>
									</div>
								</div>
								<div class="col-md-6">
									<span style="color:dimgrey ;font-weight:bolder">Talla</span>
									<div class="input-group">
										<input type="number" class="form-control" id="tallaPaciente" name="ta" onkeyup="calcularIMC()" tabindex="6" placeholder="Medica en Centimetros">
										<span class="input-group-addon">Cm.</span>
									</div>
								</div>
								<div class="col-md-6" style="color: black;">
									<h2>Indice de masa corporal: <strong id="icmPaciente">44</strong></h2>
								</div>
							</div>
							<br>
							<button class="btn btn-theme-inverse align-lg-right" id="btn_submitFormCreateSV" tabindex="8">Registrar en Historial Clinico</button>
							<button class="btn btn-danger">Cancelar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- modal form carga de imagen de RX -->

		<div id="md-formCargaRX" class="modal fade md-flipVer" tabindex="-1" data-width="550">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
				<h3>Imagen radiografica</h3>
			</div>
			<div class="modal-body">
				<div class="panel panel-primary">

					<input type="text" class="form-control" onkeyup="clonar(this.value)" placeholder="Descripcion del archivo a cargar">
					<hr>
					<div class="panel-body" id="myId" style="padding: 0;">
						<form id="subImagen" class="dropzone">
							<input type="text" id="textRX2" name="rxDescImagen" hidden>
							<div class="fallback" id="2121">
								<input name="file" type="file" multiple />
							</div>
						</form>
					</div>
				</div>
				<div>
				</div>
			</div>
		</div>
		<div id="md-formCarga-imagenRX" class="modal fade md-flipVer" tabindex="-1" data-width="500">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
				<h4>Placa radiografica:</h4><br>
				<h4 id="md_body_show_desc"></h4>
			</div>
			<div class="modal-body" id="md_body_show_imagen">
				<span class='zoom' id='ex1'>
					<img id="srcImagenPlacaRX" src='' width='455' height='' alt='Daisy on the Ohoopee' />
				</span>
			</div>
		</div>


		<div id="md-stack" class="modal fade" tabindex="-1" data-width="600">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
				<h3>Stack One</h3>
			</div>
			<div class="modal-body">
				<p>One fine body…</p>
				<p>Two fine body…</p>
				<p>Three fine body…</p>

			</div>
			<div class="modal-footer">
				<button type="button" data-dismiss="modal" class="btn btn-inverse">Close</button>

				<button class="btn btn-theme" data-toggle="modal" data-target="#md-stack2">Launch modal</button>
			</div>
		</div>
		<!-- modal recetario virtual -->
		<div id="md-form1_recetario" class="modal fade md-slideRight " tabindex="-1" data-width="1000">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
				<h3>Crear Nueva receta</h3>
			</div>
			<div class="modal-body">
				<div class="row">
					<form id="form-createRecetario">
						<div class="form-group col-lg-2">
							<label>Farmaceutico</label>
							<select class="form-control" data-size="10" data-live-search="true" name="c_medi" id="c_medi" require>
								<option value="">Selecionar ... </option>
								<option value="paracetamol">paracetamol</option>
								<option value="ibuprofeno">ibuprofeno</option>
								<option value="ibuprofeno">iboprofeno</option>
								<option value="quetorolaco">quetorolaco </option>
							</select>
						</div>
						<div class="form-group col-lg-3">
							<label>Forma Farmaceutica</label>
							<input type="text" class="form-control rounded" id="c_forma" name="c_forma" required>
						</div>
						<div class="form-group col-lg-2">
							<label>Via de administración</label>
							<select class="form-control" data-size="10" data-live-search="true" name="c_via" id="c_via" require>
								<option value="">Selecionar ... </option>
								<option value="I.M.">I.M.</option>
								<option value="I.V">I.V</option>
								<option value="Sub. Cut.">Sub. Cut.</option>
								<option value="V.O.">V.O.</option>
								<option value="Canalización">Canalización</option>
							</select>
						</div>
						<div class="form-group col-lg-4">
							<label>Dosis Duración</label>
							<input type="text" class="form-control rounded" id="c_dosis" name="c_dosis" required>
						</div>
						<div class="form-group col-lg-1">
							<br>
							<button class="btn btn-theme-inverse" type="submit" id="btn-addMedicamento"><i class="fa fa-check"></i></button>
						</div>
						<div class="form-group col-lg-12">
							<textarea class="form-control" name="c_otroTra" id="c_otroTra" cols="60" rows="2"></textarea>
							<span class="help-block "><strong>Datos del tratamiento</strong></span>
						</div>
					</form>
				</div>
				<table class="table">
					<thead>
						<th>Medicamento </th>
						<th>Forma farmaceutica</th>
						<th>Via</th>
						<th>Dosis</th>
						<th></th>
					</thead>
					<tbody align="center" id="tableBodilistMedicamentos">
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-inverse"><i class="fa fa-refresh" id="refreshRecetario"></i></button>
				<button class="btn btn-primary" onclick="registerReceta(1)">Registrar</button>
				<button class="btn btn-theme-inverse" onclick="registerReceta(2)">Registrar e Imprimir <i class="fa fa-print"></i></button>
			</div>
		</div>

		<!-- modal para vista previa de la receta medica -->
		<div id="md-form1_vistaReceta" class="modal fade md-stickTop" tabindex="-1" data-width="800">

			<div class="moda-body" height=800 id="" style="background-color: black;">
				<div align="center" id="loadingAni">
					<svg width="51px" height="50px" viewBox="0 0 51 50">

						<rect y="0" width="13" height="50" fill="#1fa2ff">
							<animate attributeName="height" values="50;10;50" begin="0s" dur="1s" repeatCount="indefinite" />
							<animate attributeName="y" values="0;20;0" begin="0s" dur="1s" repeatCount="indefinite" />
						</rect>

						<rect x="19" y="0" width="13" height="50" fill="#12d8fa">
							<animate attributeName="height" values="50;10;50" begin="0.2s" dur="1s" repeatCount="indefinite" />
							<animate attributeName="y" values="0;20;0" begin="0.2s" dur="1s" repeatCount="indefinite" />
						</rect>

						<rect x="38" y="0" width="13" height="50" fill="#06ffcb">
							<animate attributeName="height" values="50;10;50" begin="0.4s" dur="1s" repeatCount="indefinite" />
							<animate attributeName="y" values="0;20;0" begin="0.4s" dur="1s" repeatCount="indefinite" />
						</rect>

					</svg>
				</div>
				<embed src="" type="" width="800" height="400" id="linkUrlPdf">
			</div>

		</div>

		<!-- start modal cotizacianes -->
		<div id="md_cotizacion_fomr_1" class="modal fade md-flipVer bg-theme-inverse-lighten" tabindex="-1" data-width="60%">
			<div class="modal-header ">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
				<h4 class="modal-title"><i class="fa fa-bell-o"></i> Formulario PRE-COTIZACION</h4>
			</div>
			<div class="modal-body" style="padding:0">
				<div class="widget-im notification">
					<div class="panel-body">
						<h5 style="color: black;">- Dia de internacion 100 Bs. <br>- Procedimientos de enfermeria se cobra segun el consumo <br>- RX, Lab, Medicamentos en SALA: Tienen un costo adicional </h5>
						<h4 style="color: black;"></h4>
						<hr>
						<form class="form-horizontal" data-collabel="4" data-alignlabel="left" id="form_new_cotizacion">@csrf
							<input type="text" id="id_paciente_new_cotizacion" name="id_paciente_new_cotizacion" hidden>
							<div class=" col-lg-6">
								<div class="form-group">
									<label class="control-label col-md-3" style="text-align: left;">Especialidad Medica*</label>
									<div class="col-md-9">
										<input type="text" class="form-control rounded" name="EspecialidadMedica" autocomplete="off" required>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3" style="text-align: left;">Nombre de la Cirugia*</label>
									<div class="col-md-9">
										<input type="text" class="form-control rounded" name="nombreCirugia" required>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3" style="text-align: left;">Tiempo Aproximado</label>
									<div class="col-md-9">
										<!-- <input type=" number" class="form-control rounded" name="tiempoAproximado"> -->
										<div class="input-group">
											<input type="number" class="form-control" name="tiempoAproximado">
											<span class="input-group-addon">Hora </span>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3" style="text-align: left;">Cirujano (Honorarios Solicitados)</label>
									<div class="col-md-9">
										<input type="number" class="form-control rounded" name="cirujanoHonorarios">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3" style="text-align: left;">Procedimiento</label>
									<div class="col-md-9">
										<select class="form-control" name="procedimiento">
											<option value="1">Mayor</option>
											<option value="2">Mediana</option>
											<option value="3">Menor</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3" for="otros" style="text-align: left;">Otros</label>
									<div class="col-md-9">
										<textarea name="otros" cols="25" rows="2" class="form-control"></textarea>
									</div>
								</div>
							</div>
							<div class=" col-lg-6">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="anesteseologo" value="1">
										Anesteseologo </label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="quirofano_mayor" value="1">
										Quirofano mayor </label>
								</div>

								<div class="checkbox">
									<label>
										<input type="checkbox" name="sala_endoscopia" value="1">
										Sala de endoscopia </label>
								</div>

								<div class="checkbox">
									<label>
										<input type="checkbox" name="sala_partos" value="1">
										Sala de Partos </label>
								</div>

								<div class="checkbox">
									<label>
										<input type="checkbox" name="equipo_laparoscopia" value="1">
										Equipo de laparoscopia </label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="ayudante_1" value="1">
										Un Ayudante </label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="ayudante_2" value="1">
										Dos Ayudantes </label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="instrumentador" value="1">
										Intrumentador</label>
								</div>

								<div class="checkbox">
									<label>
										<input type="checkbox" name="circulante" value="1">
										Circulante </label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="oxigeno" value="1">
										Oxigeno </label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="aguja_k" value="1">
										Aguja K </label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="insumos_quirofano" value="1">
										Insumos en Quirofano </label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="medicamentos_quirofano" value="1">
										Medicamentos en quirofano </label>
								</div>



							</div>
							<hr>
							<div class="form-group offset">
								<div class="col-md-offset-3 col-md-9">
									<button type="submit" class="btn btn-theme-inverse">Registrar</button>
									<button type="reset" class="btn btn-danger">Cancelar</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div id="md-atencion_consultaExterna" class="modal fade md-flipVer bg-theme-inverse-lighten" tabindex="-1" data-width="1000">
			<div class="modal-header ">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
				<h4 class="modal-title"><i class="fa fa-bell-o"></i> Consulta externa</h4>
			</div>
			<div class="modal-body" style="padding:0">
				<div class="widget-im notification">
					<div class="panel-body">
						<form class="form-horizontal ">
							<div class="form-group">
								<!-- <label class="control-label col-md-2">Signos Vitales</label> -->
								<div class="col-md-2">
									<label>Signos Vitales</label>
								</div>
								<div class="col-md-10">
									<div class="row">
										<div class="col-sm-7">
											<div class="col-md-4">
												<span style="color:dimgrey ;font-weight:bolder">Peso (KG) </span>
												<input type="text" class="form-control">
											</div>
											<div class="col-md-8">
												<span style="color:dimgrey ;font-weight:bolder">Estado nutricional IMC </span>
												<select name="estadoNutricional" class="form-control">
													<option value="1">Bajo peso</option>
													<option value="2">Peso normal</option>
													<option value="3">Sobre peso</option>
													<option value="4">Obesidad</option>
												</select>
											</div>
											<div class="col-md-4">
												<span style="color:dimgrey ;font-weight:bolder">Talla (CM) </span>
												<input type="text" class="form-control">
											</div>
											<div class="col-md-8">
												<span style="color:dimgrey ;font-weight:bolder">Talla Edad </span>
												<select name="estadoNutricional" class="form-control">
													<option value="1">Talla Normal</option>
													<option value="2">Talla Baja</option>
												</select>
											</div>
										</div>
										<div class="col-sm-5">
											<div class="col-md-6">
												<span style="color:dimgrey ;font-weight:bolder">Temperatura </span>
												<div class="input-group">
													<input type="text" class="form-control">
													<span class="input-group-addon">°C</span>
												</div>
											</div>
											<div class="col-md-6">
												<span style="color:dimgrey ;font-weight:bolder">Fercuencia Cardiaca</span>
												<div class="input-group">
													<input type="text" class="form-control">
													<span class="input-group-addon">Pul/Min</span>
												</div>
											</div>
											<div class="col-md-6">
												<span style="color:dimgrey ;font-weight:bolder">Frecuencia respiratoria</span>
												<div class="input-group">
													<input type="text" class="form-control">
													<span class="input-group-addon">RPM</span>
												</div>
											</div>
											<div class="col-md-6">
												<span style="color:dimgrey ;font-weight:bolder">Precion arterial</span>
												<div class="input-group">
													<input type="text" class="form-control">
													<span class="input-group-addon">mmHg</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<!-- <label class="control-label col-md-2">Signos Vitales</label> -->
								<div class="col-md-2">
									<label>Consulta Medica</label>
								</div>
								<div class="col-md-10">
									<div class="row">
										<div class="col-sm-7">
											<div class="col-md-12">
												<span style="color:dimgrey ;font-weight:bolder"> Motivo de la consulta </span>
												<input type="text" class="form-control">
											</div>
											<div class="col-md-12">
												<span style="color:dimgrey ;font-weight:bolder">Examen fisico </span>
												<input type="text" class="form-control">
											</div>
										</div>
										<div class="col-sm-5">
											<div class="col-md-6">
												<span style="color:dimgrey ;font-weight:bolder">Inyectable </span>
												<input type="text" class="form-control">

											</div>
											<div class="col-md-6">
												<span style="color:dimgrey ;font-weight:bolder">Suero<span>
														<input type="text" class="form-control">
											</div>
											<div class="col-md-6">
												<span style="color:dimgrey ;font-weight:bolder">Curaciones o suturas</span>
												<input type="text" class="form-control">

											</div>
											<div class="col-md-6">
												<span style="color:dimgrey ;font-weight:bolder">Otras actividades de enfermeria</span>
												<input type="text" class="form-control">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<!-- <label class="control-label col-md-2">Signos Vitales</label> -->
								<div class="col-md-2">
									<label></label>
								</div>
								<div class="col-md-10">
									<div class="row">
										<div class="col-sm-7">
											<div class="col-md-12">
												<span style="color:dimgrey ;font-weight:bolder"> Diagnostico </span>
												<textarea class="form-control" name="" rows="2"></textarea>
											</div>
											<div class="col-md-12">
												<span style="color:dimgrey ;font-weight:bolder">Tratamiento </span>
												<textarea class="form-control" name="" rows="2"></textarea>
											</div>
										</div>
									</div>
								</div>
							</div>
							<button class="btn btn-theme-inverse align-lg-right">Registrar en Historial Clinico</button>
							<button class="btn btn-danger">Cancelar</button>
						</form>
					</div>
				</div>
			</div>
		</div>


		<!-- End Cotizaciones -->
		<div id="md-atencion_consultaExterna" class="modal fade md-flipVer bg-theme-inverse-lighten" tabindex="-1" data-width="1000">
			<div class="modal-header ">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
				<h4 class="modal-title"><i class="fa fa-bell-o"></i> Consulta externa</h4>
			</div>
			<div class="modal-body" style="padding:0">
				<div class="widget-im notification">
					<div class="panel-body">
						<form class="form-horizontal ">
							<div class="form-group">
								<!-- <label class="control-label col-md-2">Signos Vitales</label> -->
								<div class="col-md-2">
									<label>Signos Vitales</label>
								</div>
								<div class="col-md-10">
									<div class="row">
										<div class="col-sm-7">
											<div class="col-md-4">
												<span style="color:dimgrey ;font-weight:bolder">Peso (KG) </span>
												<input type="text" class="form-control">
											</div>
											<div class="col-md-8">
												<span style="color:dimgrey ;font-weight:bolder">Estado nutricional IMC </span>
												<select name="estadoNutricional" class="form-control">
													<option value="1">Bajo peso</option>
													<option value="2">Peso normal</option>
													<option value="3">Sobre peso</option>
													<option value="4">Obesidad</option>
												</select>
											</div>
											<div class="col-md-4">
												<span style="color:dimgrey ;font-weight:bolder">Talla (CM) </span>
												<input type="text" class="form-control">
											</div>
											<div class="col-md-8">
												<span style="color:dimgrey ;font-weight:bolder">Talla Edad </span>
												<select name="estadoNutricional" class="form-control">
													<option value="1">Talla Normal</option>
													<option value="2">Talla Baja</option>
												</select>
											</div>
										</div>
										<div class="col-sm-5">
											<div class="col-md-6">
												<span style="color:dimgrey ;font-weight:bolder">Temperatura </span>
												<div class="input-group">
													<input type="text" class="form-control">
													<span class="input-group-addon">°C</span>
												</div>
											</div>
											<div class="col-md-6">
												<span style="color:dimgrey ;font-weight:bolder">Fercuencia Cardiaca</span>
												<div class="input-group">
													<input type="text" class="form-control">
													<span class="input-group-addon">Pul/Min</span>
												</div>
											</div>
											<div class="col-md-6">
												<span style="color:dimgrey ;font-weight:bolder">Frecuencia respiratoria</span>
												<div class="input-group">
													<input type="text" class="form-control">
													<span class="input-group-addon">RPM</span>
												</div>
											</div>
											<div class="col-md-6">
												<span style="color:dimgrey ;font-weight:bolder">Precion arterial</span>
												<div class="input-group">
													<input type="text" class="form-control">
													<span class="input-group-addon">mmHg</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<!-- <label class="control-label col-md-2">Signos Vitales</label> -->
								<div class="col-md-2">
									<label>Consulta Medica</label>
								</div>
								<div class="col-md-10">
									<div class="row">
										<div class="col-sm-7">
											<div class="col-md-12">
												<span style="color:dimgrey ;font-weight:bolder"> Motivo de la consulta </span>
												<input type="text" class="form-control">
											</div>
											<div class="col-md-12">
												<span style="color:dimgrey ;font-weight:bolder">Examen fisico </span>
												<input type="text" class="form-control">
											</div>
										</div>
										<div class="col-sm-5">
											<div class="col-md-6">
												<span style="color:dimgrey ;font-weight:bolder">Inyectable </span>
												<input type="text" class="form-control">

											</div>
											<div class="col-md-6">
												<span style="color:dimgrey ;font-weight:bolder">Suero<span>
														<input type="text" class="form-control">
											</div>
											<div class="col-md-6">
												<span style="color:dimgrey ;font-weight:bolder">Curaciones o suturas</span>
												<input type="text" class="form-control">

											</div>
											<div class="col-md-6">
												<span style="color:dimgrey ;font-weight:bolder">Otras actividades de enfermeria</span>
												<input type="text" class="form-control">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<!-- <label class="control-label col-md-2">Signos Vitales</label> -->
								<div class="col-md-2">
									<label></label>
								</div>
								<div class="col-md-10">
									<div class="row">
										<div class="col-sm-7">
											<div class="col-md-12">
												<span style="color:dimgrey ;font-weight:bolder"> Diagnostico </span>
												<textarea class="form-control" name="" rows="2"></textarea>
											</div>
											<div class="col-md-12">
												<span style="color:dimgrey ;font-weight:bolder">Tratamiento </span>
												<textarea class="form-control" name="" rows="2"></textarea>
											</div>
										</div>
									</div>
								</div>
							</div>
							<button class="btn btn-theme-inverse align-lg-right">Registrar en Historial Clinico</button>
							<button class="btn btn-danger">Cancelar</button>
						</form>
					</div>
				</div>

			</div>

		</div>
		<div id="md-atencion_prenatal" class="modal fade md-flipVer bg-theme-inverse-lighten" tabindex="-1" data-width="96%">
			<div class="modal-header ">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
				<h4 class="modal-title"><i class="fa fa-bell-o"></i> Control Prenatal</h4>
			</div>
			<div class="modal-body" style="padding:0">
				<div class="widget-im notification">
					<div class="panel-body">
						<form class="form-horizontal ">
							<div class="form-group">
								<!-- <label class="control-label col-md-2">Signos Vitales</label> -->
								<div class="col-md-2">
									<label>Signos Vitales</label>
								</div>
								<div class="col-md-10">
									<div class="row">
										<div class="col-sm-7">
											<div class="col-md-4">
												<span style="color:dimgrey ;font-weight:bolder">Peso (KG) </span>
												<input type="text" class="form-control">
											</div>
											<div class="col-md-8">
												<span style="color:dimgrey ;font-weight:bolder">Estado nutricional IMC </span>
												<select name="estadoNutricional" class="form-control">
													<option value="1">Bajo peso</option>
													<option value="2">Peso normal</option>
													<option value="3">Sobre peso</option>
													<option value="4">Obesidad</option>
												</select>
											</div>
											<div class="col-md-4">
												<span style="color:dimgrey ;font-weight:bolder">Talla (CM) </span>
												<input type="text" class="form-control">
											</div>
											<div class="col-md-8">
												<span style="color:dimgrey ;font-weight:bolder">FUM </span>
												<input type="text" class="form-control">
											</div>
										</div>
										<div class="col-sm-5">
											<div class="col-md-6">
												<span style="color:dimgrey ;font-weight:bolder">Temperatura </span>
												<div class="input-group">
													<input type="text" class="form-control">
													<span class="input-group-addon">°C</span>
												</div>
											</div>
											<div class="col-md-6">
												<span style="color:dimgrey ;font-weight:bolder">Fercuencia Cardiaca</span>
												<div class="input-group">
													<input type="text" class="form-control">
													<span class="input-group-addon">Pul/Min</span>
												</div>
											</div>
											<div class="col-md-6">
												<span style="color:dimgrey ;font-weight:bolder">Frecuencia respiratoria</span>
												<div class="input-group">
													<input type="text" class="form-control">
													<span class="input-group-addon">RPM</span>
												</div>
											</div>
											<div class="col-md-6">
												<span style="color:dimgrey ;font-weight:bolder">Precion arterial</span>
												<div class="input-group">
													<input type="text" class="form-control">
													<span class="input-group-addon">mmHg</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<!-- <label class="control-label col-md-2">Signos Vitales</label> -->
								<div class="col-md-2">
									<label>Consulta Medica</label>
								</div>
								<div class="col-md-10">
									<div class="row">
										<div class="col-sm-5">
											<div class="col-md-6">
												<span style="color:dimgrey ;font-weight:bolder">Control Prenatal </span>
												<select class="form-control" name="">
													<option value="1">Nuevos antes del 5to Mes-Dentro</option>
													<option value="2">Nuevos antes del 5to Mes-Fuera</option>
													<option value="3">Nuevos a partir del 5to Mes-Dentro</option>
													<option value="4">Nuevos a partir del 5to Mes-Fuera</option>
													<option value="5">Repetidos Dentro</option>
													<option value="6">Rpetidos Fuera</option>
												</select>
											</div>
											<div class="col-md-6">
												<span style="color:dimgrey ;font-weight:bolder">Con cuatro controles<span>
														<select class="form-control" name="">
															<option value="1">Dentro</option>
															<option value="2">Fuera</option>
														</select>
											</div>
											<div class="col-md-6">
												<span style="color:dimgrey ;font-weight:bolder">Curaciones o suturas</span>
												<input type="text" class="form-control">

											</div>
											<div class="col-md-6">
												<span style="color:dimgrey ;font-weight:bolder">Otras actividades de enfermeria</span>
												<input type="text" class="form-control">
											</div>
										</div>
										<div class="col-sm-7">
											<div class="col-md-12">
												<span style="color:dimgrey ;font-weight:bolder"> </span>
												<input type="text" class="form-control">
											</div>
											<div class="col-md-12">
												<span style="color:dimgrey ;font-weight:bolder">Examen fisico </span>
												<input type="text" class="form-control">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<!-- <label class="control-label col-md-2">Signos Vitales</label> -->
								<div class="col-md-2">
									<label></label>
								</div>
								<div class="col-md-10">
									<div class="row">
										<div class="col-sm-7">
											<div class="col-md-12">
												<span style="color:dimgrey ;font-weight:bolder"> Diagnostico </span>
												<textarea class="form-control" name="" rows="2"></textarea>
											</div>
											<div class="col-md-12">
												<span style="color:dimgrey ;font-weight:bolder">Tratamiento </span>
												<textarea class="form-control" name="" rows="2"></textarea>
											</div>
										</div>
									</div>
								</div>
							</div>
						</form>
						<button class="btn btn-theme-inverse align-lg-right">Registrar en Historial Clinico</button>
						<button class="btn btn-danger">Cancelar</button>
					</div>
				</div>

			</div>

		</div>
		<div id="md-atencion_anticoncepcion" class="modal fade md-flipVer bg-theme-inverse-lighten" tabindex="-1" data-width="50%">
			<div class="modal-header ">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
				<h4 class="modal-title"><i class="fa fa-bell-o"></i> Anticoncepción</h4>
			</div>
			<div class="modal-body" style="padding:0">
				<div class="widget-im notification">
					<div class="panel-body">
						<form class="form-horizontal ">
							<div class="form-group">
								<!-- <label class="control-label col-md-2">Signos Vitales</label> -->
								<div class="col-md-2">
									<label>Signos Vitales</label>
								</div>
								<div class="col-md-10">
									<div class="row">
										<div class="col-sm-7">
											<div class="col-md-4">
												<span style="color:dimgrey ;font-weight:bolder">Peso (KG) </span>
												<input type="text" class="form-control">
											</div>
											<div class="col-md-8">
												<span style="color:dimgrey ;font-weight:bolder">Estado nutricional IMC </span>
												<select name="estadoNutricional" class="form-control">
													<option value="1">Bajo peso</option>
													<option value="2">Peso normal</option>
													<option value="3">Sobre peso</option>
													<option value="4">Obesidad</option>
												</select>
											</div>
											<div class="col-md-4">
												<span style="color:dimgrey ;font-weight:bolder">Talla (CM) </span>
												<input type="text" class="form-control">
											</div>
											<div class="col-md-8">
												<span style="color:dimgrey ;font-weight:bolder">FUM </span>
												<input type="text" class="form-control">
											</div>
										</div>
										<div class="col-sm-5">
											<div class="col-md-6">
												<span style="color:dimgrey ;font-weight:bolder">Temperatura </span>
												<div class="input-group">
													<input type="text" class="form-control">
													<span class="input-group-addon">°C</span>
												</div>
											</div>
											<div class="col-md-6">
												<span style="color:dimgrey ;font-weight:bolder">Fercuencia Cardiaca</span>
												<div class="input-group">
													<input type="text" class="form-control">
													<span class="input-group-addon">Pul/Min</span>
												</div>
											</div>
											<div class="col-md-6">
												<span style="color:dimgrey ;font-weight:bolder">Frecuencia respiratoria</span>
												<div class="input-group">
													<input type="text" class="form-control">
													<span class="input-group-addon">RPM</span>
												</div>
											</div>
											<div class="col-md-6">
												<span style="color:dimgrey ;font-weight:bolder">Precion arterial</span>
												<div class="input-group">
													<input type="text" class="form-control">
													<span class="input-group-addon">mmHg</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<button class="btn btn-theme-inverse align-lg-right">Registrar en Historial Clinico</button>
							<button class="btn btn-danger">Cancelar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<nav id="menu">
			<ul>
				<li><span><i class="icon  fa fa-laptop"></i> Registor de atencion</span>
					<ul>
						<li><a href="dashboard.html"><i class="icon  fa fa-rocket"></i> Pre-Cotizaciones registradas </a></li>
						<li><a href="dashboard2.html"><i class="icon  fa fa-th"></i> </a></li>
					</ul>
				</li>
				<li><a href="front/index.html"><i class="icon  fa fa-rocket"></i> Front End </a></li>
			</ul>
		</nav>
	</div>
	<!-- Jquery Library -->
	<script type="text/javascript" src="{{ asset('Plantilla/assets/js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('Plantilla/assets/js/jquery.ui.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('Plantilla/assets/plugins/bootstrap/bootstrap.min.js')}}"></script>
	<!-- Modernizr Library For HTML5 And CSS3 -->
	<script type="text/javascript" src="{{ asset('Plantilla/assets/js/modernizr/modernizr.js')}}"></script>
	<script type="text/javascript" src="{{ asset('Plantilla/assets/plugins/mmenu/jquery.mmenu.js')}}"></script>
	<script type="text/javascript" src="{{ asset('Plantilla/assets/js/styleswitch.js')}}"></script>
	<script type="text/javascript" src="{{ asset('Plantilla/assets/js/styleswitch.js')}}"></script>
	<!-- Library 10+ Form plugins-->
	<script type="text/javascript" src="{{ asset('Plantilla/assets/plugins/form/form.js')}}"></script>
	<!-- Datetime plugins -->
	<script type="text/javascript" src="{{ asset('Plantilla/assets/plugins/datetime/datetime.js')}}"></script>
	<!-- Library Chart-->
	<script type="text/javascript" src="{{ asset('Plantilla/assets/plugins/chart/chart.js')}}"></script>
	<!-- Library  5+ plugins for bootstrap -->
	<script type="text/javascript" src="{{ asset('Plantilla/assets/plugins/pluginsForBS/pluginsForBS.js')}}"></script>
	<!-- Library 10+ miscellaneous plugins -->
	<script type="text/javascript" src="{{ asset('Plantilla/assets/plugins/miscellaneous/miscellaneous.js')}}"></script>
	<!-- Library Themes Customize-->
	<script type="text/javascript" src="{{ asset('Plantilla/assets/js/caplet.custom.js')}}"></script>

	<script type="text/javascript" src="{{ asset('Plantilla/zoom/jquery.zoom.js')}}"></script>


	<!--  funciones de historias clinicas -->
	<script type="text/javascript" src="{{ asset('resources/js/funIniciales.js') }}"></script>
	<script type="text/javascript" src="{{ asset('resources/js/historiaClinica.js') }}"></script>
	<script type="text/javascript" src="{{ asset('resources/js/cotizacion.js') }}"></script>
	<script type="text/javascript" src="{{ asset('resources/js/resetarioMedico.js') }}"></script>
	<script type="text/javascript" src="{{ asset('resources/js/signosVitales.js') }}"></script>
	<!-- js de dropzone -->
	<script type="text/javascript" src="{{ asset('Plantilla/dropzone/dist/dropzone.js')}}"></script>
	<script type="text/javascript" src="{{ asset('resources/js/servrx.js') }}"></script>
	<script>
		
	</script>
</body>

</html>