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
						<form class="form-horizontal labelcustomize" data-collabel="2" data-label="color">
							<div class="form-group">
								<label class="control-label col-md-2"><span class="color">Select Normal</span></label>
								<div class="col-md-10">
									<div class="row">
										<div class="col-sm-4">
											<select class="selectpicker form-control" style="display: none;">
												<option value=""> Normal </option>
												<option value="United States">United States</option>
												<option value="United Kingdom">United Kingdom</option>
												<option value="Australia">Australia</option>
												<option value="China">China</option>
												<option value="Japan">Japan</option>
												<option value="Thailand">Thailand</option>
											</select>
											<div class="btn-group bootstrap-select form-control"><button type="button" class="btn dropdown-toggle selectpicker btn-default" data-toggle="dropdown">
													<div class="filter-option pull-left"> Normal </div>&nbsp;<div class="caret"></div>
												</button>
												<div class="dropdown-menu open">
													<ul class="dropdown-menu inner selectpicker" role="menu">
														<li rel="0" class="selected"><a tabindex="0" class="" style=""><span class="text"> Normal </span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="1"><a tabindex="0" class="" style=""><span class="text">United States</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="2"><a tabindex="0" class="" style=""><span class="text">United Kingdom</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="3"><a tabindex="0" class="" style=""><span class="text">Australia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="4"><a tabindex="0" class="" style=""><span class="text">China</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="5"><a tabindex="0" class="" style=""><span class="text">Japan</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="6"><a tabindex="0" class="" style=""><span class="text">Thailand</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
													</ul>
												</div>
											</div>
										</div>
										<div class="col-sm-4">
											<select class="selectpicker form-control" data-size="10" style="display: none;">
												<option value="">Limit Size</option>
												<option data-divider="true"></option>
												<option value="United States">United States</option>
												
											</select>
											<div class="btn-group bootstrap-select form-control"><button type="button" class="btn dropdown-toggle selectpicker btn-default" data-toggle="dropdown">
													<div class="filter-option pull-left">Limit Size</div>&nbsp;<div class="caret"></div>
												</button>
												<div class="dropdown-menu open">
													<ul class="dropdown-menu inner selectpicker" role="menu">
														<li rel="0" class="selected"><a tabindex="0" class="" style=""><span class="text">Limit Size</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="1">
															<div class="div-contain">
																<div class="divider"></div>
															</div>
														</li>
														<li rel="2"><a tabindex="0" class="" style=""><span class="text">United States</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="3"><a tabindex="0" class="" style=""><span class="text">United Kingdom</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="4"><a tabindex="0" class="" style=""><span class="text">Afghanistan</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="5"><a tabindex="0" class="" style=""><span class="text">Aland Islands</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="6"><a tabindex="0" class="" style=""><span class="text">Albania</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="7"><a tabindex="0" class="" style=""><span class="text">Algeria</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="8"><a tabindex="0" class="" style=""><span class="text">American Samoa</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="9"><a tabindex="0" class="" style=""><span class="text">Andorra</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="10"><a tabindex="0" class="" style=""><span class="text">Angola</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="11"><a tabindex="0" class="" style=""><span class="text">Anguilla</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="12"><a tabindex="0" class="" style=""><span class="text">Antarctica</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="13"><a tabindex="0" class="" style=""><span class="text">Antigua and Barbuda</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="14"><a tabindex="0" class="" style=""><span class="text">Argentina</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="15"><a tabindex="0" class="" style=""><span class="text">Armenia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="16"><a tabindex="0" class="" style=""><span class="text">Aruba</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="17"><a tabindex="0" class="" style=""><span class="text">Australia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="18"><a tabindex="0" class="" style=""><span class="text">Austria</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="19"><a tabindex="0" class="" style=""><span class="text">Azerbaijan</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="20"><a tabindex="0" class="" style=""><span class="text">Bahamas</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="21"><a tabindex="0" class="" style=""><span class="text">Bahrain</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="22"><a tabindex="0" class="" style=""><span class="text">Bangladesh</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="23"><a tabindex="0" class="" style=""><span class="text">Barbados</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="24"><a tabindex="0" class="" style=""><span class="text">Belarus</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="25"><a tabindex="0" class="" style=""><span class="text">Belgium</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="26"><a tabindex="0" class="" style=""><span class="text">Belize</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="27"><a tabindex="0" class="" style=""><span class="text">Benin</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="28"><a tabindex="0" class="" style=""><span class="text">Bermuda</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="29"><a tabindex="0" class="" style=""><span class="text">Bhutan</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="30"><a tabindex="0" class="" style=""><span class="text">Botswana</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="31"><a tabindex="0" class="" style=""><span class="text">Bouvet Island</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="32"><a tabindex="0" class="" style=""><span class="text">Brazil</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="33"><a tabindex="0" class="" style=""><span class="text">Brunei Darussalam</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="34"><a tabindex="0" class="" style=""><span class="text">Bulgaria</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="35"><a tabindex="0" class="" style=""><span class="text">Burkina Faso</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="36"><a tabindex="0" class="" style=""><span class="text">Burundi</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="37"><a tabindex="0" class="" style=""><span class="text">Cambodia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="38"><a tabindex="0" class="" style=""><span class="text">Cameroon</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="39"><a tabindex="0" class="" style=""><span class="text">Canada</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="40"><a tabindex="0" class="" style=""><span class="text">Cape Verde</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="41"><a tabindex="0" class="" style=""><span class="text">Cayman Islands</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="42"><a tabindex="0" class="" style=""><span class="text">Central African Republic</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="43"><a tabindex="0" class="" style=""><span class="text">Chad</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="44"><a tabindex="0" class="" style=""><span class="text">Chile</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="45"><a tabindex="0" class="" style=""><span class="text">China</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="46"><a tabindex="0" class="" style=""><span class="text">Christmas Island</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="47"><a tabindex="0" class="" style=""><span class="text">Cocos (Keeling) Islands</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="48"><a tabindex="0" class="" style=""><span class="text">Colombia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="49"><a tabindex="0" class="" style=""><span class="text">Comoros</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="50"><a tabindex="0" class="" style=""><span class="text">Congo</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="51"><a tabindex="0" class="" style=""><span class="text">Cook Islands</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="52"><a tabindex="0" class="" style=""><span class="text">Costa Rica</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="53"><a tabindex="0" class="" style=""><span class="text">Cote D'ivoire</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="54"><a tabindex="0" class="" style=""><span class="text">Croatia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="55"><a tabindex="0" class="" style=""><span class="text">Cuba</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="56"><a tabindex="0" class="" style=""><span class="text">Curacao</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="57"><a tabindex="0" class="" style=""><span class="text">Cyprus</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="58"><a tabindex="0" class="" style=""><span class="text">Czech Republic</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="59"><a tabindex="0" class="" style=""><span class="text">Denmark</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="60"><a tabindex="0" class="" style=""><span class="text">Djibouti</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="61"><a tabindex="0" class="" style=""><span class="text">Dominica</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="62"><a tabindex="0" class="" style=""><span class="text">Dominican Republic</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="63"><a tabindex="0" class="" style=""><span class="text">Ecuador</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="64"><a tabindex="0" class="" style=""><span class="text">Egypt</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="65"><a tabindex="0" class="" style=""><span class="text">El Salvador</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="66"><a tabindex="0" class="" style=""><span class="text">Equatorial Guinea</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="67"><a tabindex="0" class="" style=""><span class="text">Eritrea</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="68"><a tabindex="0" class="" style=""><span class="text">Estonia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="69"><a tabindex="0" class="" style=""><span class="text">Ethiopia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="70"><a tabindex="0" class="" style=""><span class="text">Falkland Islands (Malvinas)</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="71"><a tabindex="0" class="" style=""><span class="text">Faroe Islands</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="72"><a tabindex="0" class="" style=""><span class="text">Fiji</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="73"><a tabindex="0" class="" style=""><span class="text">Finland</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="74"><a tabindex="0" class="" style=""><span class="text">France</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="75"><a tabindex="0" class="" style=""><span class="text">French Guiana</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="76"><a tabindex="0" class="" style=""><span class="text">French Polynesia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="77"><a tabindex="0" class="" style=""><span class="text">French Southern Territories</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="78"><a tabindex="0" class="" style=""><span class="text">Gabon</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="79"><a tabindex="0" class="" style=""><span class="text">Gambia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="80"><a tabindex="0" class="" style=""><span class="text">Georgia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="81"><a tabindex="0" class="" style=""><span class="text">Germany</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="82"><a tabindex="0" class="" style=""><span class="text">Ghana</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="83"><a tabindex="0" class="" style=""><span class="text">Gibraltar</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="84"><a tabindex="0" class="" style=""><span class="text">Greece</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="85"><a tabindex="0" class="" style=""><span class="text">Greenland</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="86"><a tabindex="0" class="" style=""><span class="text">Grenada</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="87"><a tabindex="0" class="" style=""><span class="text">Guadeloupe</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="88"><a tabindex="0" class="" style=""><span class="text">Guam</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="89"><a tabindex="0" class="" style=""><span class="text">Guatemala</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="90"><a tabindex="0" class="" style=""><span class="text">Guernsey</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="91"><a tabindex="0" class="" style=""><span class="text">Guinea</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="92"><a tabindex="0" class="" style=""><span class="text">Guinea-bissau</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="93"><a tabindex="0" class="" style=""><span class="text">Guyana</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="94"><a tabindex="0" class="" style=""><span class="text">Haiti</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="95"><a tabindex="0" class="" style=""><span class="text">Holy See (Vatican City State)</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="96"><a tabindex="0" class="" style=""><span class="text">Honduras</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="97"><a tabindex="0" class="" style=""><span class="text">Hong Kong</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="98"><a tabindex="0" class="" style=""><span class="text">Hungary</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="99"><a tabindex="0" class="" style=""><span class="text">Iceland</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="100"><a tabindex="0" class="" style=""><span class="text">India</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="101"><a tabindex="0" class="" style=""><span class="text">Indonesia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="102"><a tabindex="0" class="" style=""><span class="text">Iran, Islamic Republic of</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="103"><a tabindex="0" class="" style=""><span class="text">Iraq</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="104"><a tabindex="0" class="" style=""><span class="text">Ireland</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="105"><a tabindex="0" class="" style=""><span class="text">Isle of Man</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="106"><a tabindex="0" class="" style=""><span class="text">Israel</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="107"><a tabindex="0" class="" style=""><span class="text">Italy</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="108"><a tabindex="0" class="" style=""><span class="text">Jamaica</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="109"><a tabindex="0" class="" style=""><span class="text">Japan</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="110"><a tabindex="0" class="" style=""><span class="text">Jersey</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="111"><a tabindex="0" class="" style=""><span class="text">Jordan</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="112"><a tabindex="0" class="" style=""><span class="text">Kazakhstan</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="113"><a tabindex="0" class="" style=""><span class="text">Kenya</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="114"><a tabindex="0" class="" style=""><span class="text">Kiribati</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="115"><a tabindex="0" class="" style=""><span class="text">Korea, Republic of</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="116"><a tabindex="0" class="" style=""><span class="text">Kuwait</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="117"><a tabindex="0" class="" style=""><span class="text">Kyrgyzstan</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="118"><a tabindex="0" class="" style=""><span class="text">Latvia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="119"><a tabindex="0" class="" style=""><span class="text">Lebanon</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="120"><a tabindex="0" class="" style=""><span class="text">Lesotho</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="121"><a tabindex="0" class="" style=""><span class="text">Liberia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="122"><a tabindex="0" class="" style=""><span class="text">Libya</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="123"><a tabindex="0" class="" style=""><span class="text">Liechtenstein</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="124"><a tabindex="0" class="" style=""><span class="text">Lithuania</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="125"><a tabindex="0" class="" style=""><span class="text">Luxembourg</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="126"><a tabindex="0" class="" style=""><span class="text">Macao</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="127"><a tabindex="0" class="" style=""><span class="text">Madagascar</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="128"><a tabindex="0" class="" style=""><span class="text">Malawi</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="129"><a tabindex="0" class="" style=""><span class="text">Malaysia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="130"><a tabindex="0" class="" style=""><span class="text">Maldives</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="131"><a tabindex="0" class="" style=""><span class="text">Mali</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="132"><a tabindex="0" class="" style=""><span class="text">Malta</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="133"><a tabindex="0" class="" style=""><span class="text">Marshall Islands</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="134"><a tabindex="0" class="" style=""><span class="text">Martinique</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="135"><a tabindex="0" class="" style=""><span class="text">Mauritania</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="136"><a tabindex="0" class="" style=""><span class="text">Mauritius</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="137"><a tabindex="0" class="" style=""><span class="text">Mayotte</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="138"><a tabindex="0" class="" style=""><span class="text">Mexico</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="139"><a tabindex="0" class="" style=""><span class="text">Moldova, Republic of</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="140"><a tabindex="0" class="" style=""><span class="text">Monaco</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="141"><a tabindex="0" class="" style=""><span class="text">Mongolia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="142"><a tabindex="0" class="" style=""><span class="text">Montenegro</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="143"><a tabindex="0" class="" style=""><span class="text">Montserrat</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="144"><a tabindex="0" class="" style=""><span class="text">Morocco</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="145"><a tabindex="0" class="" style=""><span class="text">Mozambique</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="146"><a tabindex="0" class="" style=""><span class="text">Myanmar</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="147"><a tabindex="0" class="" style=""><span class="text">Namibia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="148"><a tabindex="0" class="" style=""><span class="text">Nauru</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="149"><a tabindex="0" class="" style=""><span class="text">Nepal</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="150"><a tabindex="0" class="" style=""><span class="text">Netherlands</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="151"><a tabindex="0" class="" style=""><span class="text">New Caledonia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="152"><a tabindex="0" class="" style=""><span class="text">New Zealand</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="153"><a tabindex="0" class="" style=""><span class="text">Nicaragua</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="154"><a tabindex="0" class="" style=""><span class="text">Niger</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="155"><a tabindex="0" class="" style=""><span class="text">Nigeria</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="156"><a tabindex="0" class="" style=""><span class="text">Niue</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="157"><a tabindex="0" class="" style=""><span class="text">Norfolk Island</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="158"><a tabindex="0" class="" style=""><span class="text">Northern Mariana Islands</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="159"><a tabindex="0" class="" style=""><span class="text">Norway</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="160"><a tabindex="0" class="" style=""><span class="text">Oman</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="161"><a tabindex="0" class="" style=""><span class="text">Pakistan</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="162"><a tabindex="0" class="" style=""><span class="text">Palau</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="163"><a tabindex="0" class="" style=""><span class="text">Palestinian Territory, Occupied</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="164"><a tabindex="0" class="" style=""><span class="text">Panama</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="165"><a tabindex="0" class="" style=""><span class="text">Papua New Guinea</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="166"><a tabindex="0" class="" style=""><span class="text">Paraguay</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="167"><a tabindex="0" class="" style=""><span class="text">Peru</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="168"><a tabindex="0" class="" style=""><span class="text">Philippines</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="169"><a tabindex="0" class="" style=""><span class="text">Pitcairn</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="170"><a tabindex="0" class="" style=""><span class="text">Poland</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="171"><a tabindex="0" class="" style=""><span class="text">Portugal</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="172"><a tabindex="0" class="" style=""><span class="text">Puerto Rico</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="173"><a tabindex="0" class="" style=""><span class="text">Qatar</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="174"><a tabindex="0" class="" style=""><span class="text">Reunion</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="175"><a tabindex="0" class="" style=""><span class="text">Romania</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="176"><a tabindex="0" class="" style=""><span class="text">Russian Federation</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="177"><a tabindex="0" class="" style=""><span class="text">Rwanda</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="178"><a tabindex="0" class="" style=""><span class="text">Saint Barthelemy</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="179"><a tabindex="0" class="" style=""><span class="text">Samoa</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="180"><a tabindex="0" class="" style=""><span class="text">San Marino</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="181"><a tabindex="0" class="" style=""><span class="text">Sao Tome and Principe</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="182"><a tabindex="0" class="" style=""><span class="text">Saudi Arabia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="183"><a tabindex="0" class="" style=""><span class="text">Senegal</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="184"><a tabindex="0" class="" style=""><span class="text">Serbia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="185"><a tabindex="0" class="" style=""><span class="text">Seychelles</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="186"><a tabindex="0" class="" style=""><span class="text">Sierra Leone</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="187"><a tabindex="0" class="" style=""><span class="text">Singapore</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="188"><a tabindex="0" class="" style=""><span class="text">Sint Maarten (Dutch part)</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="189"><a tabindex="0" class="" style=""><span class="text">Slovakia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="190"><a tabindex="0" class="" style=""><span class="text">Slovenia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="191"><a tabindex="0" class="" style=""><span class="text">Solomon Islands</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="192"><a tabindex="0" class="" style=""><span class="text">Somalia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="193"><a tabindex="0" class="" style=""><span class="text">South Africa</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="194"><a tabindex="0" class="" style=""><span class="text">South Sudan</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="195"><a tabindex="0" class="" style=""><span class="text">Spain</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="196"><a tabindex="0" class="" style=""><span class="text">Sri Lanka</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="197"><a tabindex="0" class="" style=""><span class="text">Sudan</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="198"><a tabindex="0" class="" style=""><span class="text">Suriname</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="199"><a tabindex="0" class="" style=""><span class="text">Svalbard and Jan Mayen</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="200"><a tabindex="0" class="" style=""><span class="text">Swaziland</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="201"><a tabindex="0" class="" style=""><span class="text">Sweden</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="202"><a tabindex="0" class="" style=""><span class="text">Switzerland</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="203"><a tabindex="0" class="" style=""><span class="text">Syrian Arab Republic</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="204"><a tabindex="0" class="" style=""><span class="text">Taiwan, Province of China</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="205"><a tabindex="0" class="" style=""><span class="text">Tajikistan</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="206"><a tabindex="0" class="" style=""><span class="text">Tanzania, United Republic of</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="207"><a tabindex="0" class="" style=""><span class="text">Thailand</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="208"><a tabindex="0" class="" style=""><span class="text">Timor-leste</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="209"><a tabindex="0" class="" style=""><span class="text">Togo</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="210"><a tabindex="0" class="" style=""><span class="text">Tokelau</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="211"><a tabindex="0" class="" style=""><span class="text">Tonga</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="212"><a tabindex="0" class="" style=""><span class="text">Trinidad and Tobago</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="213"><a tabindex="0" class="" style=""><span class="text">Tunisia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="214"><a tabindex="0" class="" style=""><span class="text">Turkey</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="215"><a tabindex="0" class="" style=""><span class="text">Turkmenistan</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="216"><a tabindex="0" class="" style=""><span class="text">Turks and Caicos Islands</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="217"><a tabindex="0" class="" style=""><span class="text">Tuvalu</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="218"><a tabindex="0" class="" style=""><span class="text">Uganda</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="219"><a tabindex="0" class="" style=""><span class="text">Ukraine</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="220"><a tabindex="0" class="" style=""><span class="text">United Arab Emirates</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="221"><a tabindex="0" class="" style=""><span class="text">United Kingdom</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="222"><a tabindex="0" class="" style=""><span class="text">United States</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="223"><a tabindex="0" class="" style=""><span class="text">Uruguay</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="224"><a tabindex="0" class="" style=""><span class="text">Uzbekistan</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="225"><a tabindex="0" class="" style=""><span class="text">Vanuatu</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="226"><a tabindex="0" class="" style=""><span class="text">Viet Nam</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="227"><a tabindex="0" class="" style=""><span class="text">Virgin Islands, British</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="228"><a tabindex="0" class="" style=""><span class="text">Virgin Islands, U.S.</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="229"><a tabindex="0" class="" style=""><span class="text">Wallis and Futuna</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="230"><a tabindex="0" class="" style=""><span class="text">Western Sahara</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="231"><a tabindex="0" class="" style=""><span class="text">Yemen</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="232"><a tabindex="0" class="" style=""><span class="text">Zambia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="233"><a tabindex="0" class="" style=""><span class="text">Zimbabwe</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
													</ul>
												</div>
											</div>
										</div>
										<div class="col-sm-4">
											<select class="selectpicker form-control" data-size="10" data-live-search="true" style="display: none;">
												<option value="">Live search </option>
												<option value="United States">United States</option>
												<option value="United Kingdom">United Kingdom</option>
												<option value="Afghanistan">Afghanistan</option>
												<option value="Aland Islands">Aland Islands</option>
												<option value="Albania">Albania</option>
												<option value="Algeria">Algeria</option>
												<option value="American Samoa">American Samoa</option>
												<option value="Andorra">Andorra</option>
												<option value="Angola">Angola</option>
												<option value="Anguilla">Anguilla</option>
												<option value="Antarctica">Antarctica</option>
												<option value="Antigua and Barbuda">Antigua and Barbuda</option>
												<option value="Argentina">Argentina</option>
												<option value="Armenia">Armenia</option>
												<option value="Aruba">Aruba</option>
												<option value="Australia">Australia</option>
												<option value="Austria">Austria</option>
												<option value="Azerbaijan">Azerbaijan</option>
												<option value="Bahamas">Bahamas</option>
												<option value="Bahrain">Bahrain</option>
												<option value="Bangladesh">Bangladesh</option>
												<option value="Barbados">Barbados</option>
												<option value="Belarus">Belarus</option>
												<option value="Belgium">Belgium</option>
												<option value="Belize">Belize</option>
												<option value="Benin">Benin</option>
												<option value="Bermuda">Bermuda</option>
												<option value="Bhutan">Bhutan</option>
												<option value="Botswana">Botswana</option>
												<option value="Bouvet Island">Bouvet Island</option>
												<option value="Brazil">Brazil</option>
												<option value="Brunei Darussalam">Brunei Darussalam</option>
												<option value="Bulgaria">Bulgaria</option>
												<option value="Burkina Faso">Burkina Faso</option>
												<option value="Burundi">Burundi</option>
												<option value="Cambodia">Cambodia</option>
												<option value="Cameroon">Cameroon</option>
												<option value="Canada">Canada</option>
												<option value="Cape Verde">Cape Verde</option>
												<option value="Cayman Islands">Cayman Islands</option>
												<option value="Central African Republic">Central African Republic</option>
												<option value="Chad">Chad</option>
												<option value="Chile">Chile</option>
												<option value="China">China</option>
												<option value="Christmas Island">Christmas Island</option>
												<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
												<option value="Colombia">Colombia</option>
												<option value="Comoros">Comoros</option>
												<option value="Congo">Congo</option>
												<option value="Cook Islands">Cook Islands</option>
												<option value="Costa Rica">Costa Rica</option>
												<option value="Cote D'ivoire">Cote D'ivoire</option>
												<option value="Croatia">Croatia</option>
												<option value="Cuba">Cuba</option>
												<option value="Curacao">Curacao</option>
												<option value="Cyprus">Cyprus</option>
												<option value="Czech Republic">Czech Republic</option>
												<option value="Denmark">Denmark</option>
												<option value="Djibouti">Djibouti</option>
												<option value="Dominica">Dominica</option>
												<option value="Dominican Republic">Dominican Republic</option>
												<option value="Ecuador">Ecuador</option>
												<option value="Egypt">Egypt</option>
												<option value="El Salvador">El Salvador</option>
												<option value="Equatorial Guinea">Equatorial Guinea</option>
												<option value="Eritrea">Eritrea</option>
												<option value="Estonia">Estonia</option>
												<option value="Ethiopia">Ethiopia</option>
												<option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
												<option value="Faroe Islands">Faroe Islands</option>
												<option value="Fiji">Fiji</option>
												<option value="Finland">Finland</option>
												<option value="France">France</option>
												<option value="French Guiana">French Guiana</option>
												<option value="French Polynesia">French Polynesia</option>
												<option value="French Southern Territories">French Southern Territories</option>
												<option value="Gabon">Gabon</option>
												<option value="Gambia">Gambia</option>
												<option value="Georgia">Georgia</option>
												<option value="Germany">Germany</option>
												<option value="Ghana">Ghana</option>
												<option value="Gibraltar">Gibraltar</option>
												<option value="Greece">Greece</option>
												<option value="Greenland">Greenland</option>
												<option value="Grenada">Grenada</option>
												<option value="Guadeloupe">Guadeloupe</option>
												<option value="Guam">Guam</option>
												<option value="Guatemala">Guatemala</option>
												<option value="Guernsey">Guernsey</option>
												<option value="Guinea">Guinea</option>
												<option value="Guinea-bissau">Guinea-bissau</option>
												<option value="Guyana">Guyana</option>
												<option value="Haiti">Haiti</option>
												<option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
												<option value="Honduras">Honduras</option>
												<option value="Hong Kong">Hong Kong</option>
												<option value="Hungary">Hungary</option>
												<option value="Iceland">Iceland</option>
												<option value="India">India</option>
												<option value="Indonesia">Indonesia</option>
												<option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
												<option value="Iraq">Iraq</option>
												<option value="Ireland">Ireland</option>
												<option value="Isle of Man">Isle of Man</option>
												<option value="Israel">Israel</option>
												<option value="Italy">Italy</option>
												<option value="Jamaica">Jamaica</option>
												<option value="Japan">Japan</option>
												<option value="Jersey">Jersey</option>
												<option value="Jordan">Jordan</option>
												<option value="Kazakhstan">Kazakhstan</option>
												<option value="Kenya">Kenya</option>
												<option value="Kiribati">Kiribati</option>
												<option value="Korea, Republic of">Korea, Republic of</option>
												<option value="Kuwait">Kuwait</option>
												<option value="Kyrgyzstan">Kyrgyzstan</option>
												<option value="Latvia">Latvia</option>
												<option value="Lebanon">Lebanon</option>
												<option value="Lesotho">Lesotho</option>
												<option value="Liberia">Liberia</option>
												<option value="Libya">Libya</option>
												<option value="Liechtenstein">Liechtenstein</option>
												<option value="Lithuania">Lithuania</option>
												<option value="Luxembourg">Luxembourg</option>
												<option value="Macao">Macao</option>
												<option value="Madagascar">Madagascar</option>
												<option value="Malawi">Malawi</option>
												<option value="Malaysia">Malaysia</option>
												<option value="Maldives">Maldives</option>
												<option value="Mali">Mali</option>
												<option value="Malta">Malta</option>
												<option value="Marshall Islands">Marshall Islands</option>
												<option value="Martinique">Martinique</option>
												<option value="Mauritania">Mauritania</option>
												<option value="Mauritius">Mauritius</option>
												<option value="Mayotte">Mayotte</option>
												<option value="Mexico">Mexico</option>
												<option value="Moldova, Republic of">Moldova, Republic of</option>
												<option value="Monaco">Monaco</option>
												<option value="Mongolia">Mongolia</option>
												<option value="Montenegro">Montenegro</option>
												<option value="Montserrat">Montserrat</option>
												<option value="Morocco">Morocco</option>
												<option value="Mozambique">Mozambique</option>
												<option value="Myanmar">Myanmar</option>
												<option value="Namibia">Namibia</option>
												<option value="Nauru">Nauru</option>
												<option value="Nepal">Nepal</option>
												<option value="Netherlands">Netherlands</option>
												<option value="New Caledonia">New Caledonia</option>
												<option value="New Zealand">New Zealand</option>
												<option value="Nicaragua">Nicaragua</option>
												<option value="Niger">Niger</option>
												<option value="Nigeria">Nigeria</option>
												<option value="Niue">Niue</option>
												<option value="Norfolk Island">Norfolk Island</option>
												<option value="Northern Mariana Islands">Northern Mariana Islands</option>
												<option value="Norway">Norway</option>
												<option value="Oman">Oman</option>
												<option value="Pakistan">Pakistan</option>
												<option value="Palau">Palau</option>
												<option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
												<option value="Panama">Panama</option>
												<option value="Papua New Guinea">Papua New Guinea</option>
												<option value="Paraguay">Paraguay</option>
												<option value="Peru">Peru</option>
												<option value="Philippines">Philippines</option>
												<option value="Pitcairn">Pitcairn</option>
												<option value="Poland">Poland</option>
												<option value="Portugal">Portugal</option>
												<option value="Puerto Rico">Puerto Rico</option>
												<option value="Qatar">Qatar</option>
												<option value="Reunion">Reunion</option>
												<option value="Romania">Romania</option>
												<option value="Russian Federation">Russian Federation</option>
												<option value="Rwanda">Rwanda</option>
												<option value="Saint Barthelemy">Saint Barthelemy</option>
												<option value="Samoa">Samoa</option>
												<option value="San Marino">San Marino</option>
												<option value="Sao Tome and Principe">Sao Tome and Principe</option>
												<option value="Saudi Arabia">Saudi Arabia</option>
												<option value="Senegal">Senegal</option>
												<option value="Serbia">Serbia</option>
												<option value="Seychelles">Seychelles</option>
												<option value="Sierra Leone">Sierra Leone</option>
												<option value="Singapore">Singapore</option>
												<option value="Sint Maarten (Dutch part)">Sint Maarten (Dutch part)</option>
												<option value="Slovakia">Slovakia</option>
												<option value="Slovenia">Slovenia</option>
												<option value="Solomon Islands">Solomon Islands</option>
												<option value="Somalia">Somalia</option>
												<option value="South Africa">South Africa</option>
												<option value="South Sudan">South Sudan</option>
												<option value="Spain">Spain</option>
												<option value="Sri Lanka">Sri Lanka</option>
												<option value="Sudan">Sudan</option>
												<option value="Suriname">Suriname</option>
												<option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
												<option value="Swaziland">Swaziland</option>
												<option value="Sweden">Sweden</option>
												<option value="Switzerland">Switzerland</option>
												<option value="Syrian Arab Republic">Syrian Arab Republic</option>
												<option value="Taiwan, Province of China">Taiwan, Province of China</option>
												<option value="Tajikistan">Tajikistan</option>
												<option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
												<option value="Thailand">Thailand</option>
												<option value="Timor-leste">Timor-leste</option>
												<option value="Togo">Togo</option>
												<option value="Tokelau">Tokelau</option>
												<option value="Tonga">Tonga</option>
												<option value="Trinidad and Tobago">Trinidad and Tobago</option>
												<option value="Tunisia">Tunisia</option>
												<option value="Turkey">Turkey</option>
												<option value="Turkmenistan">Turkmenistan</option>
												<option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
												<option value="Tuvalu">Tuvalu</option>
												<option value="Uganda">Uganda</option>
												<option value="Ukraine">Ukraine</option>
												<option value="United Arab Emirates">United Arab Emirates</option>
												<option value="United Kingdom">United Kingdom</option>
												<option value="United States">United States</option>
												<option value="Uruguay">Uruguay</option>
												<option value="Uzbekistan">Uzbekistan</option>
												<option value="Vanuatu">Vanuatu</option>
												<option value="Viet Nam">Viet Nam</option>
												<option value="Virgin Islands, British">Virgin Islands, British</option>
												<option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
												<option value="Wallis and Futuna">Wallis and Futuna</option>
												<option value="Western Sahara">Western Sahara</option>
												<option value="Yemen">Yemen</option>
												<option value="Zambia">Zambia</option>
												<option value="Zimbabwe">Zimbabwe</option>
											</select>
											<div class="btn-group bootstrap-select form-control"><button type="button" class="btn dropdown-toggle selectpicker btn-default" data-toggle="dropdown">
													<div class="filter-option pull-left">Live search </div>&nbsp;<div class="caret"></div>
												</button>
												<div class="dropdown-menu open">
													<div class="bootstrap-select-searchbox"><input type="text" class="input-block-level form-control"></div>
													<ul class="dropdown-menu inner selectpicker" role="menu">
														<li rel="0" class="selected"><a tabindex="0" class="" style=""><span class="text">Live search </span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="1"><a tabindex="0" class="" style=""><span class="text">United States</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="2"><a tabindex="0" class="" style=""><span class="text">United Kingdom</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="3"><a tabindex="0" class="" style=""><span class="text">Afghanistan</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="4"><a tabindex="0" class="" style=""><span class="text">Aland Islands</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="5"><a tabindex="0" class="" style=""><span class="text">Albania</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="6"><a tabindex="0" class="" style=""><span class="text">Algeria</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="7"><a tabindex="0" class="" style=""><span class="text">American Samoa</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="8"><a tabindex="0" class="" style=""><span class="text">Andorra</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="9"><a tabindex="0" class="" style=""><span class="text">Angola</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="10"><a tabindex="0" class="" style=""><span class="text">Anguilla</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="11"><a tabindex="0" class="" style=""><span class="text">Antarctica</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="12"><a tabindex="0" class="" style=""><span class="text">Antigua and Barbuda</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="13"><a tabindex="0" class="" style=""><span class="text">Argentina</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="14"><a tabindex="0" class="" style=""><span class="text">Armenia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="15"><a tabindex="0" class="" style=""><span class="text">Aruba</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="16"><a tabindex="0" class="" style=""><span class="text">Australia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="17"><a tabindex="0" class="" style=""><span class="text">Austria</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="18"><a tabindex="0" class="" style=""><span class="text">Azerbaijan</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="19"><a tabindex="0" class="" style=""><span class="text">Bahamas</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="20"><a tabindex="0" class="" style=""><span class="text">Bahrain</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="21"><a tabindex="0" class="" style=""><span class="text">Bangladesh</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="22"><a tabindex="0" class="" style=""><span class="text">Barbados</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="23"><a tabindex="0" class="" style=""><span class="text">Belarus</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="24"><a tabindex="0" class="" style=""><span class="text">Belgium</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="25"><a tabindex="0" class="" style=""><span class="text">Belize</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="26"><a tabindex="0" class="" style=""><span class="text">Benin</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="27"><a tabindex="0" class="" style=""><span class="text">Bermuda</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="28"><a tabindex="0" class="" style=""><span class="text">Bhutan</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="29"><a tabindex="0" class="" style=""><span class="text">Botswana</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="30"><a tabindex="0" class="" style=""><span class="text">Bouvet Island</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="31"><a tabindex="0" class="" style=""><span class="text">Brazil</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="32"><a tabindex="0" class="" style=""><span class="text">Brunei Darussalam</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="33"><a tabindex="0" class="" style=""><span class="text">Bulgaria</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="34"><a tabindex="0" class="" style=""><span class="text">Burkina Faso</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="35"><a tabindex="0" class="" style=""><span class="text">Burundi</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="36"><a tabindex="0" class="" style=""><span class="text">Cambodia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="37"><a tabindex="0" class="" style=""><span class="text">Cameroon</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="38"><a tabindex="0" class="" style=""><span class="text">Canada</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="39"><a tabindex="0" class="" style=""><span class="text">Cape Verde</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="40"><a tabindex="0" class="" style=""><span class="text">Cayman Islands</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="41"><a tabindex="0" class="" style=""><span class="text">Central African Republic</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="42"><a tabindex="0" class="" style=""><span class="text">Chad</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="43"><a tabindex="0" class="" style=""><span class="text">Chile</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="44"><a tabindex="0" class="" style=""><span class="text">China</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="45"><a tabindex="0" class="" style=""><span class="text">Christmas Island</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="46"><a tabindex="0" class="" style=""><span class="text">Cocos (Keeling) Islands</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="47"><a tabindex="0" class="" style=""><span class="text">Colombia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="48"><a tabindex="0" class="" style=""><span class="text">Comoros</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="49"><a tabindex="0" class="" style=""><span class="text">Congo</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="50"><a tabindex="0" class="" style=""><span class="text">Cook Islands</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="51"><a tabindex="0" class="" style=""><span class="text">Costa Rica</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="52"><a tabindex="0" class="" style=""><span class="text">Cote D'ivoire</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="53"><a tabindex="0" class="" style=""><span class="text">Croatia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="54"><a tabindex="0" class="" style=""><span class="text">Cuba</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="55"><a tabindex="0" class="" style=""><span class="text">Curacao</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="56"><a tabindex="0" class="" style=""><span class="text">Cyprus</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="57"><a tabindex="0" class="" style=""><span class="text">Czech Republic</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="58"><a tabindex="0" class="" style=""><span class="text">Denmark</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="59"><a tabindex="0" class="" style=""><span class="text">Djibouti</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="60"><a tabindex="0" class="" style=""><span class="text">Dominica</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="61"><a tabindex="0" class="" style=""><span class="text">Dominican Republic</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="62"><a tabindex="0" class="" style=""><span class="text">Ecuador</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="63"><a tabindex="0" class="" style=""><span class="text">Egypt</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="64"><a tabindex="0" class="" style=""><span class="text">El Salvador</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="65"><a tabindex="0" class="" style=""><span class="text">Equatorial Guinea</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="66"><a tabindex="0" class="" style=""><span class="text">Eritrea</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="67"><a tabindex="0" class="" style=""><span class="text">Estonia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="68"><a tabindex="0" class="" style=""><span class="text">Ethiopia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="69"><a tabindex="0" class="" style=""><span class="text">Falkland Islands (Malvinas)</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="70"><a tabindex="0" class="" style=""><span class="text">Faroe Islands</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="71"><a tabindex="0" class="" style=""><span class="text">Fiji</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="72"><a tabindex="0" class="" style=""><span class="text">Finland</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="73"><a tabindex="0" class="" style=""><span class="text">France</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="74"><a tabindex="0" class="" style=""><span class="text">French Guiana</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="75"><a tabindex="0" class="" style=""><span class="text">French Polynesia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="76"><a tabindex="0" class="" style=""><span class="text">French Southern Territories</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="77"><a tabindex="0" class="" style=""><span class="text">Gabon</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="78"><a tabindex="0" class="" style=""><span class="text">Gambia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="79"><a tabindex="0" class="" style=""><span class="text">Georgia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="80"><a tabindex="0" class="" style=""><span class="text">Germany</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="81"><a tabindex="0" class="" style=""><span class="text">Ghana</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="82"><a tabindex="0" class="" style=""><span class="text">Gibraltar</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="83"><a tabindex="0" class="" style=""><span class="text">Greece</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="84"><a tabindex="0" class="" style=""><span class="text">Greenland</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="85"><a tabindex="0" class="" style=""><span class="text">Grenada</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="86"><a tabindex="0" class="" style=""><span class="text">Guadeloupe</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="87"><a tabindex="0" class="" style=""><span class="text">Guam</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="88"><a tabindex="0" class="" style=""><span class="text">Guatemala</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="89"><a tabindex="0" class="" style=""><span class="text">Guernsey</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="90"><a tabindex="0" class="" style=""><span class="text">Guinea</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="91"><a tabindex="0" class="" style=""><span class="text">Guinea-bissau</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="92"><a tabindex="0" class="" style=""><span class="text">Guyana</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="93"><a tabindex="0" class="" style=""><span class="text">Haiti</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="94"><a tabindex="0" class="" style=""><span class="text">Holy See (Vatican City State)</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="95"><a tabindex="0" class="" style=""><span class="text">Honduras</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="96"><a tabindex="0" class="" style=""><span class="text">Hong Kong</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="97"><a tabindex="0" class="" style=""><span class="text">Hungary</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="98"><a tabindex="0" class="" style=""><span class="text">Iceland</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="99"><a tabindex="0" class="" style=""><span class="text">India</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="100"><a tabindex="0" class="" style=""><span class="text">Indonesia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="101"><a tabindex="0" class="" style=""><span class="text">Iran, Islamic Republic of</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="102"><a tabindex="0" class="" style=""><span class="text">Iraq</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="103"><a tabindex="0" class="" style=""><span class="text">Ireland</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="104"><a tabindex="0" class="" style=""><span class="text">Isle of Man</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="105"><a tabindex="0" class="" style=""><span class="text">Israel</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="106"><a tabindex="0" class="" style=""><span class="text">Italy</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="107"><a tabindex="0" class="" style=""><span class="text">Jamaica</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="108"><a tabindex="0" class="" style=""><span class="text">Japan</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="109"><a tabindex="0" class="" style=""><span class="text">Jersey</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="110"><a tabindex="0" class="" style=""><span class="text">Jordan</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="111"><a tabindex="0" class="" style=""><span class="text">Kazakhstan</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="112"><a tabindex="0" class="" style=""><span class="text">Kenya</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="113"><a tabindex="0" class="" style=""><span class="text">Kiribati</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="114"><a tabindex="0" class="" style=""><span class="text">Korea, Republic of</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="115"><a tabindex="0" class="" style=""><span class="text">Kuwait</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="116"><a tabindex="0" class="" style=""><span class="text">Kyrgyzstan</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="117"><a tabindex="0" class="" style=""><span class="text">Latvia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="118"><a tabindex="0" class="" style=""><span class="text">Lebanon</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="119"><a tabindex="0" class="" style=""><span class="text">Lesotho</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="120"><a tabindex="0" class="" style=""><span class="text">Liberia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="121"><a tabindex="0" class="" style=""><span class="text">Libya</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="122"><a tabindex="0" class="" style=""><span class="text">Liechtenstein</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="123"><a tabindex="0" class="" style=""><span class="text">Lithuania</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="124"><a tabindex="0" class="" style=""><span class="text">Luxembourg</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="125"><a tabindex="0" class="" style=""><span class="text">Macao</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="126"><a tabindex="0" class="" style=""><span class="text">Madagascar</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="127"><a tabindex="0" class="" style=""><span class="text">Malawi</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="128"><a tabindex="0" class="" style=""><span class="text">Malaysia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="129"><a tabindex="0" class="" style=""><span class="text">Maldives</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="130"><a tabindex="0" class="" style=""><span class="text">Mali</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="131"><a tabindex="0" class="" style=""><span class="text">Malta</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="132"><a tabindex="0" class="" style=""><span class="text">Marshall Islands</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="133"><a tabindex="0" class="" style=""><span class="text">Martinique</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="134"><a tabindex="0" class="" style=""><span class="text">Mauritania</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="135"><a tabindex="0" class="" style=""><span class="text">Mauritius</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="136"><a tabindex="0" class="" style=""><span class="text">Mayotte</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="137"><a tabindex="0" class="" style=""><span class="text">Mexico</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="138"><a tabindex="0" class="" style=""><span class="text">Moldova, Republic of</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="139"><a tabindex="0" class="" style=""><span class="text">Monaco</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="140"><a tabindex="0" class="" style=""><span class="text">Mongolia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="141"><a tabindex="0" class="" style=""><span class="text">Montenegro</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="142"><a tabindex="0" class="" style=""><span class="text">Montserrat</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="143"><a tabindex="0" class="" style=""><span class="text">Morocco</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="144"><a tabindex="0" class="" style=""><span class="text">Mozambique</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="145"><a tabindex="0" class="" style=""><span class="text">Myanmar</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="146"><a tabindex="0" class="" style=""><span class="text">Namibia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="147"><a tabindex="0" class="" style=""><span class="text">Nauru</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="148"><a tabindex="0" class="" style=""><span class="text">Nepal</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="149"><a tabindex="0" class="" style=""><span class="text">Netherlands</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="150"><a tabindex="0" class="" style=""><span class="text">New Caledonia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="151"><a tabindex="0" class="" style=""><span class="text">New Zealand</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="152"><a tabindex="0" class="" style=""><span class="text">Nicaragua</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="153"><a tabindex="0" class="" style=""><span class="text">Niger</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="154"><a tabindex="0" class="" style=""><span class="text">Nigeria</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="155"><a tabindex="0" class="" style=""><span class="text">Niue</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="156"><a tabindex="0" class="" style=""><span class="text">Norfolk Island</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="157"><a tabindex="0" class="" style=""><span class="text">Northern Mariana Islands</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="158"><a tabindex="0" class="" style=""><span class="text">Norway</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="159"><a tabindex="0" class="" style=""><span class="text">Oman</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="160"><a tabindex="0" class="" style=""><span class="text">Pakistan</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="161"><a tabindex="0" class="" style=""><span class="text">Palau</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="162"><a tabindex="0" class="" style=""><span class="text">Palestinian Territory, Occupied</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="163"><a tabindex="0" class="" style=""><span class="text">Panama</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="164"><a tabindex="0" class="" style=""><span class="text">Papua New Guinea</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="165"><a tabindex="0" class="" style=""><span class="text">Paraguay</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="166"><a tabindex="0" class="" style=""><span class="text">Peru</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="167"><a tabindex="0" class="" style=""><span class="text">Philippines</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="168"><a tabindex="0" class="" style=""><span class="text">Pitcairn</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="169"><a tabindex="0" class="" style=""><span class="text">Poland</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="170"><a tabindex="0" class="" style=""><span class="text">Portugal</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="171"><a tabindex="0" class="" style=""><span class="text">Puerto Rico</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="172"><a tabindex="0" class="" style=""><span class="text">Qatar</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="173"><a tabindex="0" class="" style=""><span class="text">Reunion</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="174"><a tabindex="0" class="" style=""><span class="text">Romania</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="175"><a tabindex="0" class="" style=""><span class="text">Russian Federation</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="176"><a tabindex="0" class="" style=""><span class="text">Rwanda</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="177"><a tabindex="0" class="" style=""><span class="text">Saint Barthelemy</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="178"><a tabindex="0" class="" style=""><span class="text">Samoa</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="179"><a tabindex="0" class="" style=""><span class="text">San Marino</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="180"><a tabindex="0" class="" style=""><span class="text">Sao Tome and Principe</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="181"><a tabindex="0" class="" style=""><span class="text">Saudi Arabia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="182"><a tabindex="0" class="" style=""><span class="text">Senegal</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="183"><a tabindex="0" class="" style=""><span class="text">Serbia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="184"><a tabindex="0" class="" style=""><span class="text">Seychelles</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="185"><a tabindex="0" class="" style=""><span class="text">Sierra Leone</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="186"><a tabindex="0" class="" style=""><span class="text">Singapore</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="187"><a tabindex="0" class="" style=""><span class="text">Sint Maarten (Dutch part)</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="188"><a tabindex="0" class="" style=""><span class="text">Slovakia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="189"><a tabindex="0" class="" style=""><span class="text">Slovenia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="190"><a tabindex="0" class="" style=""><span class="text">Solomon Islands</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="191"><a tabindex="0" class="" style=""><span class="text">Somalia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="192"><a tabindex="0" class="" style=""><span class="text">South Africa</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="193"><a tabindex="0" class="" style=""><span class="text">South Sudan</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="194"><a tabindex="0" class="" style=""><span class="text">Spain</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="195"><a tabindex="0" class="" style=""><span class="text">Sri Lanka</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="196"><a tabindex="0" class="" style=""><span class="text">Sudan</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="197"><a tabindex="0" class="" style=""><span class="text">Suriname</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="198"><a tabindex="0" class="" style=""><span class="text">Svalbard and Jan Mayen</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="199"><a tabindex="0" class="" style=""><span class="text">Swaziland</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="200"><a tabindex="0" class="" style=""><span class="text">Sweden</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="201"><a tabindex="0" class="" style=""><span class="text">Switzerland</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="202"><a tabindex="0" class="" style=""><span class="text">Syrian Arab Republic</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="203"><a tabindex="0" class="" style=""><span class="text">Taiwan, Province of China</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="204"><a tabindex="0" class="" style=""><span class="text">Tajikistan</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="205"><a tabindex="0" class="" style=""><span class="text">Tanzania, United Republic of</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="206"><a tabindex="0" class="" style=""><span class="text">Thailand</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="207"><a tabindex="0" class="" style=""><span class="text">Timor-leste</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="208"><a tabindex="0" class="" style=""><span class="text">Togo</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="209"><a tabindex="0" class="" style=""><span class="text">Tokelau</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="210"><a tabindex="0" class="" style=""><span class="text">Tonga</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="211"><a tabindex="0" class="" style=""><span class="text">Trinidad and Tobago</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="212"><a tabindex="0" class="" style=""><span class="text">Tunisia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="213"><a tabindex="0" class="" style=""><span class="text">Turkey</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="214"><a tabindex="0" class="" style=""><span class="text">Turkmenistan</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="215"><a tabindex="0" class="" style=""><span class="text">Turks and Caicos Islands</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="216"><a tabindex="0" class="" style=""><span class="text">Tuvalu</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="217"><a tabindex="0" class="" style=""><span class="text">Uganda</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="218"><a tabindex="0" class="" style=""><span class="text">Ukraine</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="219"><a tabindex="0" class="" style=""><span class="text">United Arab Emirates</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="220"><a tabindex="0" class="" style=""><span class="text">United Kingdom</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="221"><a tabindex="0" class="" style=""><span class="text">United States</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="222"><a tabindex="0" class="" style=""><span class="text">Uruguay</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="223"><a tabindex="0" class="" style=""><span class="text">Uzbekistan</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="224"><a tabindex="0" class="" style=""><span class="text">Vanuatu</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="225"><a tabindex="0" class="" style=""><span class="text">Viet Nam</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="226"><a tabindex="0" class="" style=""><span class="text">Virgin Islands, British</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="227"><a tabindex="0" class="" style=""><span class="text">Virgin Islands, U.S.</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="228"><a tabindex="0" class="" style=""><span class="text">Wallis and Futuna</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="229"><a tabindex="0" class="" style=""><span class="text">Western Sahara</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="230"><a tabindex="0" class="" style=""><span class="text">Yemen</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="231"><a tabindex="0" class="" style=""><span class="text">Zambia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="232"><a tabindex="0" class="" style=""><span class="text">Zimbabwe</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div><!-- //form-group-->
							<div class="form-group">
								<label class="control-label col-md-2"><span class="color">Multiple</span></label>
								<div class="col-md-10">
									<div class="row">
										<div class="col-sm-4">
											<select class="selectpicker form-control" multiple="" style="display: none;">
												<option value="Australia">Australia</option>
												<option value="China">China</option>
												<option value="Japan">Japan</option>
												<option value="Thailand">Thailand</option>
												<option value="United States">United States</option>
												<option value="United Kingdom">United Kingdom</option>
											</select>
											<div class="btn-group bootstrap-select show-tick form-control"><button type="button" class="btn dropdown-toggle selectpicker btn-default" data-toggle="dropdown">
													<div class="filter-option pull-left">Nothing selected</div>&nbsp;<div class="caret"></div>
												</button>
												<div class="dropdown-menu open">
													<ul class="dropdown-menu inner selectpicker" role="menu">
														<li rel="0"><a tabindex="0" class="" style=""><span class="text">Australia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="1"><a tabindex="0" class="" style=""><span class="text">China</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="2"><a tabindex="0" class="" style=""><span class="text">Japan</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="3"><a tabindex="0" class="" style=""><span class="text">Thailand</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="4"><a tabindex="0" class="" style=""><span class="text">United States</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="5"><a tabindex="0" class="" style=""><span class="text">United Kingdom</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
													</ul>
												</div>
											</div>
										</div>
										<div class="col-sm-4">
											<select class="selectpicker form-control" multiple="" title="Title Text" style="display: none;">
												<option value="Australia">Australia</option>
												<option value="China">China</option>
												<option value="Japan">Japan</option>
												<option value="Thailand">Thailand</option>
												<option value="United States">United States</option>
												<option value="United Kingdom">United Kingdom</option>
											</select>
											<div class="btn-group bootstrap-select show-tick form-control"><button type="button" class="btn dropdown-toggle selectpicker btn-default" data-toggle="dropdown">
													<div class="filter-option pull-left">Title Text</div>&nbsp;<div class="caret"></div>
												</button>
												<div class="dropdown-menu open">
													<ul class="dropdown-menu inner selectpicker" role="menu">
														<li rel="0"><a tabindex="0" class="" style=""><span class="text">Australia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="1"><a tabindex="0" class="" style=""><span class="text">China</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="2"><a tabindex="0" class="" style=""><span class="text">Japan</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="3"><a tabindex="0" class="" style=""><span class="text">Thailand</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="4"><a tabindex="0" class="" style=""><span class="text">United States</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="5"><a tabindex="0" class="" style=""><span class="text">United Kingdom</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
													</ul>
												</div>
											</div>
										</div>
										<div class="col-sm-4">
											<select class="selectpicker form-control" multiple="" title="Count Selected" data-selected-text-format="count" style="display: none;">
												<option value="Australia">Australia</option>
												<option value="China">China</option>
												<option value="Japan">Japan</option>
												<option value="Thailand">Thailand</option>
												<option value="United States">United States</option>
												<option value="United Kingdom">United Kingdom</option>
											</select>
											<div class="btn-group bootstrap-select show-tick form-control"><button type="button" class="btn dropdown-toggle selectpicker btn-default" data-toggle="dropdown">
													<div class="filter-option pull-left">Count Selected</div>&nbsp;<div class="caret"></div>
												</button>
												<div class="dropdown-menu open">
													<ul class="dropdown-menu inner selectpicker" role="menu">
														<li rel="0"><a tabindex="0" class="" style=""><span class="text">Australia</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="1"><a tabindex="0" class="" style=""><span class="text">China</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="2"><a tabindex="0" class="" style=""><span class="text">Japan</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="3"><a tabindex="0" class="" style=""><span class="text">Thailand</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="4"><a tabindex="0" class="" style=""><span class="text">United States</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
														<li rel="5"><a tabindex="0" class="" style=""><span class="text">United Kingdom</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div><!-- //form-group-->
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