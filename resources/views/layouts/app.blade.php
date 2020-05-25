<!DOCTYPE html>
<html lang="es">

<head>
	<!-- Meta information -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
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
						<a class="btn" data-toggle="modal" href="#md-notification" title="Notification">
							<i class="fa fa-medkit"></i><em class="green"></em>
						</a>
						<a class="btn" onclick="colaPacienteMedAten()" title="Messages">
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
						<section class="panel"></section>
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
		<div id="md-notification" class="modal fade md-stickTop bg-danger" tabindex="-1" data-width="500">
			<div class="modal-header bd-danger-darken">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
				<h4 class="modal-title"><i class="fa fa-bell-o"></i> Notification</h4>
			</div>
			<div class="modal-body" style="padding:0">
				<div class="widget-im notification">
					<ul>
						<li>
							<section class="thumbnail-in">
								<div class="widget-im-tools tooltip-area pull-right">
									<span>
										<time class="timeago lasted" datetime="2014">when you opened the page</time>
									</span>
									<span>
										<a href="javascript:void(0)" class="im-action" data-toggle="tooltip" data-placement="left" title="Action"><i class="fa fa-keyboard-o"></i></a>
									</span>
								</div>
								<h4>Your request approved</h4>
								<div class="im-thumbnail bg-theme-inverse"><i class="fa fa-check"></i></div>
								<div class="pre-text">One Button (click to remove this)</div>
							</section>
							<div class="im-confirm-group">
								<div class=" btn-group btn-group-justified">
									<a class="btn btn-inverse im-confirm" href="javascript:void(0)" data-confirm="accept">Accept.</a>
								</div>
							</div>
						</li>
						<li>
							<section class="thumbnail-in">
								<div class="widget-im-tools tooltip-area pull-right">
									<span>
										<time class="timeago" datetime="2013-11-17T14:24:17Z">timeago</time>
									</span>
									<span>
										<a href="javascript:void(0)" class="im-action" data-toggle="tooltip" data-placement="left" title="Action"><i class="fa fa-keyboard-o"></i></a>
									</span>
								</div>
								<h4>Dashboard new design!! you want to see now ? </h4>
								<div class="im-thumbnail bg-theme"><i class="fa fa-bell-o"></i></div>
								<div class="pre-text">Two Button (with link and click to close this) Lorem ipsum dolor sit amet, consectetur adipisicing elit, </div>
							</section>
							<div class="im-confirm-group">
								<div class=" btn-group btn-group-justified">
									<a class="btn btn-inverse" href="dashboard.html">Go Now.</a>
									<a class="btn btn-theme im-confirm" href="javascript:void(0)" data-confirm="no">Later.</a>
								</div>
							</div>
						</li>
						<li>
							<section class="thumbnail-in">
								<div class="widget-im-tools tooltip-area pull-right">
									<span>
										<time class="timeago" datetime="2013-11-17T01:24:17Z">timeago</time>
									</span>
									<span>
										<a href="javascript:void(0)" class="im-action" data-toggle="tooltip" data-placement="left" title="Action"><i class="fa fa-keyboard-o"></i></a>
									</span>
								</div>
								<h4>Error 404 <small>( File not found )</small></h4>
								<div class="im-thumbnail bg-warning"><i class="fa fa-exclamation-triangle"></i></div>
								<div class="pre-text">Two Button (click to action and remove) </div>
							</section>
							<div class="im-confirm-group">
								<div class=" btn-group btn-group-justified">
									<a class="btn btn-inverse im-confirm" href="javascript:void(0)" data-confirm="accept">Accept.</a>
									<a class="btn btn-theme im-confirm" href="javascript:void(0)" data-confirm="actionNow">Fixed now.</a>
								</div>
							</div>
						</li>
						<li>
							<section class="thumbnail-in">
								<div class="widget-im-tools tooltip-area pull-right">
									<span>
										<time class="timeago" datetime="2013-09-17T09:24:17Z">timeago</time>
									</span>
									<span>
										<a href="javascript:void(0)" class="im-action" data-toggle="tooltip" data-placement="left" title="Action"><i class="fa fa-keyboard-o"></i></a>
									</span>
								</div>
								<h4>Upgrade Premium ?</h4>
								<div class="im-thumbnail bg-inverse">
									<i class="fa fa-cogs"></i></div>
								<div class="pre-text"> Three button (test action) </div>
							</section>
							<div class="im-confirm-group">
								<div class=" btn-group btn-group-justified">
									<a class="btn btn-inverse im-confirm" href="javascript:void(0)" data-confirm="actionNow">Now.</a>
									<a class="btn btn-theme im-confirm" href="javascript:void(0)" data-confirm="no">Later.</a>
									<a class="btn btn-danger im-confirm" href="javascript:void(0)" data-confirm="yes">Delete.</a>
								</div>
							</div>
						</li>
					</ul>
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
												<textarea class="form-control" name="" id=""  rows="2"></textarea>
											</div>
											<div class="col-md-12">
												<span style="color:dimgrey ;font-weight:bolder">Tratamiento </span>
												<textarea class="form-control" name="" id=""  rows="2"></textarea>
											</div>
										</div>
									</div>
								</div>
							</div>
							<button class="btn btn-theme-inverse align-lg-right" >Registrar en Historial Clinico</button>
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
						<li><a href="dashboard.html"><i class="icon  fa fa-rocket"></i> First Design </a></li>
						<li><a href="dashboard2.html"><i class="icon  fa fa-th"></i> Dashboard New </a></li>
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
	<!--  funciones de historias clinicas -->
	<script type="text/javascript" src="{{ asset('resources/js/historiaClinica.js') }}"></script>
</body>

</html>