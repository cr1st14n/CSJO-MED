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
		<!--
		/////////////////////////////////////////////////////////////////////////
		//////////     HEADER  CONTENT     ///////////////
		//////////////////////////////////////////////////////////////////////
		-->
		<div id="header">

			<div class="logo-area clearfix">
				<a href="#" class="logo"></a>
			</div>
			<!-- //logo-area-->

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
						<!-- //dropdown-menu-->
					</li>
					<li class="visible-lg">
						<a href="#" class="h-seperate fullscreen" data-toggle="tooltip" title="Full Screen" data-container="body" data-placement="left">
							<i class="fa fa-expand"></i>
						</a>
					</li>
				</ul>
			</div>
			<!-- //tools-bar-->

		</div>
		<!-- //header-->


		<!--
		/////////////////////////////////////////////////////////////////////////
		//////////     SLIDE LEFT CONTENT     //////////
		//////////////////////////////////////////////////////////////////////
		-->
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
						<a class="btn" data-toggle="modal" href="#md-messages" title="Messages">
							<i class="fa fa-stethoscope"></i><em class="active"></em>
						</a>
					</div>
					<!-- //avatar-link-->

				</div>
				<!-- //avatar-slide-->



			</div>
			<!-- //nav-scroller-->
		</div>
		<!-- //nav-->

		<!--
		/////////////////////////////////////////////////////////////////////////
		//////////     MAIN SHOW CONTENT     //////////
		//////////////////////////////////////////////////////////////////////
		-->
		<div id="main">

			<ol class="breadcrumb">
				<li class="active">Inicio</li>
				<!-- <li><a href="#">Home</a></li> -->
			</ol>
			<!-- //breadcrumb-->

			<div id="content">


				<div class="row">
					<div class="col-lg-8">
						<section class="panel"></section>
					</div>

					<div class="col-lg-4">
						<div class="well bg-theme">
							<div class="widget-tile">
								<section>
									<h5><strong>Pacientes </strong> En Espera </h5>
									<h2>4</h2>
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
				<!-- //content > row-->

			</div>
			<!-- //content-->
		</div>
		<!-- //main-->
		<!--
		///////////////////////////////////////////////////////////////////
		//////////     MODAL MESSAGES     //////////
		///////////////////////////////////////////////////////////////
		-->
		<div id="md-messages" class="modal fade md-slideUp bg-theme-inverse" tabindex="-1" data-width="450">
			<div class="modal-header bd-theme-inverse-darken">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
				<h4 class="modal-title"><i class="fa fa-paste"></i> Pacientes en espera</h4>
			</div>
			<!-- //modal-header-->
			<div class="modal-body" style="padding:0">
				<div class="widget-im">
					<ul>
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
				<!-- //widget-im-->
			</div>
			<!-- //modal-body-->
		</div>
		<!-- //modal-->



		<!--
		//////////////////////////////////////////////////////////////////////////
		//////////     MODAL NOTIFICATION     //////////
		//////////////////////////////////////////////////////////////////////
		-->
		<div id="md-notification" class="modal fade md-stickTop bg-danger" tabindex="-1" data-width="500">
			<div class="modal-header bd-danger-darken">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
				<h4 class="modal-title"><i class="fa fa-bell-o"></i> Notification</h4>
			</div>
			<!-- //modal-header-->
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
				<!-- //widget-im-->
			</div>
			<!-- //modal-body-->
		</div>
		<!-- //modal-->



		<!--
		//////////////////////////////////////////////////////////////
		//////////     LEFT NAV MENU     //////////
		///////////////////////////////////////////////////////////
		-->
		<nav id="menu">
			<ul>
				<li><span><i class="icon  fa fa-laptop"></i> Dashboard</span>
					<ul>
						<li><a href="dashboard.html"><i class="icon  fa fa-rocket"></i> First Design </a></li>
						<li><a href="dashboard2.html"><i class="icon  fa fa-th"></i> Dashboard New </a></li>
					</ul>
				</li>
				<li><a href="front/index.html"><i class="icon  fa fa-rocket"></i> Front End </a></li>
				<li><span><i class="icon  fa fa-th-list"></i> Layout</span>
					<ul>
						<li class="Label label-lg">Main Layout</li>
						<li><a href="alwayMenu.html"> Alway Left Menu </a></li>
						<li><a href="hideUserPanel.html"> Hide User Panel </a></li>
						<li><a href="hideUserPanelIn.html"> Show & Hide</a></li>
						<li class="Label label-lg">Other Layout</li>
						<li><a href="topMenu.html"> Top Menu</a></li>
						<li><a href="footerShow.html"> Footer Show</a></li>
						<li><a href="footerMenu.html"> Footer with menu</a></li>
					</ul>
				</li>
				<li><a href="mailBox.html"><i class="icon  fa fa-inbox"></i> Mail</a></li>
				<li><span><i class="icon  fa fa-briefcase"></i> UI Element</span>
					<ul>
						<li><a href="ui.html"> UI </a></li>
						<li><a href="ui_button.html"> Button </a></li>
						<li><a href="ui_icon.html"> Fonts Icon</a></li>
						<li><a href="ui_slide.html"> Slide</a></li>
						<li><a href="ui_modal.html"> Modal</a></li>
						<li><a href="ui_panel.html"> Panel</a></li>
						<li><a href="ui_alert.html"> Alert</a></li>
						<li><a href="ui_typography.html"> Typography</a></li>
						<li><a href="ui_nestable.html"> Nestable</a></li>
					</ul>
				</li>
				<li><span><i class="icon  fa fa-bar-chart-o"></i> Chart </span>
					<ul>
						<li><a href="chartFlot.html"> Flot Chart</a></li>
						<li><a href="chartMorris.html"> Morris Chart</a></li>
						<li><a href="chartOther.html"> Other Chart</a></li>
					</ul>
				</li>
				<li><a href="calendar.html"><i class="icon  fa fa-calendar-o"></i> Calendar </a></li>
				<li><span><i class="icon  fa fa-align-right"></i>Off Canvas Menu</span>
					<ul>
						<li><a href="menu.html"> Position </a></li>
						<li><a href="menuOpen.html"> Touch to open</a></li>
						<li><a href="menuVertical.html"> Vertical Level</a></li>
						<li><span> Unlimited Level </span>
							<ul>
								<li><a href="#"> Level 3 </a></li>
								<li><a href="#"> Level 3 </a></li>
								<li><span> Level 4</span>
									<ul>
										<li><a href="#"> Level 4 </a></li>
										<li><a href="#"> Level 4 </a></li>
									</ul>
								</li>
							</ul>
						</li>
					</ul>
				</li>
				<li><span><i class="icon  fa fa-clipboard"></i> From</span>
					<ul>
						<li><a href="form.html">Form Basic</a></li>
						<li><a href="formComponents.html">Form Components</a></li>
						<li><a href="formValidate.html">Form Validate</a></li>
						<li><a href="formWizard.html">Form Wizard</a></li>
						<li><a href="formMutiselect.html">Form Mutiseletion</a></li>
						<li><a href="form_x_edit.html">Form x-edit</a></li>
						<li><a href="drop_upload.html">Drop Upload</a></li>
					</ul>
				</li>
				<li><a href="fileManager.html"><i class="icon  fa fa-file-text"></i> File Manager </a></li>
				<li><span><i class="icon  fa fa-fire"></i> Table</span>
					<ul>
						<li><a href="table.html">Table Basic</a></li>
						<li><a href="tableResponsive.html">Table Responsive</a></li>
						<li><a href="tableDynamic.html">Data Table</a></li>
					</ul>
				</li>
				<li><span><i class="icon  fa fa-folder-open-o"></i> Other Page</span>
					<ul>
						<li><a href="login.html"> login </a></li>
						<li><a href="lockscreen.html"> Lockscreen </a></li>
						<li><a href="images_manager.html"> Images Manager</a></li>
						<li><a href="gallery.html"> Gallery</a></li>
						<li><a href="timeline.html"> Timeline</a></li>
						<li><a href="profile.html"> Profile</a></li>
						<li><a href="blankPage.html"> Blank Page</a></li>
						<li><a href="page_invoice.html"> Invoice</a></li>
						<li><a href="page_search.html"> Search result</a></li>
						<li><a href="pages_pricing.html"> Pricing Table</a></li>
						<li><a href="register.html"> Register</a></li>
						<li><a href="page_chat.html"> Full Chat</a></li>
					</ul>
				</li>
				<li><a href="map.html"><i class="icon  fa fa-map-marker"></i> Maps</a></li>
				<li><a href="404.html"><i class="icon  fa fa-exclamation-triangle"></i> Error Pages</a></li>
				<li><a href="siteMap.html"><i class="icon  fa fa-sitemap"></i>Site Map</a></li>
			</ul>
		</nav>
		<!-- //nav left menu-->
	</div>
	<!-- //wrapper-->
	<!--
////////////////////////////////////////////////////////////////////////
//////////     JAVASCRIPT  LIBRARY     //////////
/////////////////////////////////////////////////////////////////////
-->
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

</body>

</html>