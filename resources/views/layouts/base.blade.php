<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Icono-->
    <link rel="icon" type="image/png" href={{ URL::asset('images/birrete.ico') }} />

	<!-- Bootstrap CSS 3.3.7-->
	<link href={{ URL::asset('css/bootstrap.min.css') }} rel="stylesheet">
	<!-- Font Awesome -->
	<link href={{ URL::asset('css/font-awesome.min.css') }} rel="stylesheet">
	<!-- NProgress -->
	<link href={{ URL::asset('css/nprogress.css') }} rel="stylesheet">
	<!-- jQuery custom content scroller -->
    <link href={{ URL::asset('css/jquery.mCustomScrollbar.min.css') }} rel="stylesheet"/>
    <!-- iCheck -->
    <link href={{ URL::asset('iCheck/skins/all.css?v=1.0.2') }} rel="stylesheet"/>
  

    <!-- Datatables -->
    <link href={{ URL::asset('table/datatables.net-bs/css/dataTables.bootstrap.min.css') }} rel="stylesheet"/>
    <link href={{ URL::asset('table/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }} rel="stylesheet"/>
    <link href={{ URL::asset('table/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }} rel="stylesheet"/>
    <link href={{ URL::asset('table/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }} rel="stylesheet"/>
    <link href={{ URL::asset('table/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }} rel="stylesheet"/>

	<!-- Custom Theme Style -->
	<link href={{ URL::asset('css/custom.min.css') }} rel="stylesheet">

    {{-- Css personalizados --}}
    @yield("css")

</head>
<body class="nav-md" style="background-color: #2A3F54">
    <div class="container body" >
        <div class="main_container" >
            <div class="col-md-3 left_col menu_fixed">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="{{ route('home_path')}}" class="site_title">
							<i class="fa fa-graduation-cap"></i>
							{{-- <span>Gentelella Alela!</span> --}}
							{{-- <span>{{ config('app.name', 'Laravel') }}</span> --}}
							<span>Ceidin</span>
						</a>
                    </div>
                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        {{-- <div class="profile_pic">
                            <img src={{ URL::asset('images/img.png') }} alt="..." class="img-circle profile_img">
                        </div>  --}}

                        <div class="profile_info menu_section">
                            <h3>
                                {{ Auth::user()->empleado->nombre }} {{ Auth::user()->empleado->apellido }}
                            </h3>
						</div>
                    </div>
                    <!-- /menu profile quick info -->


                     <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="index.html">Dashboard</a></li>
                                        <li><a href="index2.html">Dashboard2</a></li>
                                        <li><a href="index3.html">Dashboard3</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-edit"></i> Inscripción <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ route('inscripciones.index') }}">Inscripción</a></li>
                                        <li><a href="{{ route('alumnos.index') }}">Alumnos</a></li>
                                        <li><a href="{{ route('representantes.index') }}">Padres y Representantes</a></li>
                                        <li><a href="form_advanced.html">Advanced Components</a></li>
                                        <li><a href="form_validation.html">Form Validation</a></li>
                                        <li><a href="form_wizards.html">Form Wizard</a></li>
                                        <li><a href="form_upload.html">Form Upload</a></li>
                                        <li><a href="form_buttons.html">Form Buttons</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-desktop"></i> UI Elements <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="general_elements.html">General Elements</a></li>
                                        <li><a href="media_gallery.html">Media Gallery</a></li>
                                        <li><a href="typography.html">Typography</a></li>
                                        <li><a href="icons.html">Icons</a></li>
                                        <li><a href="glyphicons.html">Glyphicons</a></li>
                                        <li><a href="widgets.html">Widgets</a></li>
                                        <li><a href="invoice.html">Invoice</a></li>
                                        <li><a href="inbox.html">Inbox</a></li>
                                        <li><a href="calendar.html">Calendar</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('dias.show', Date('Y')) }}"><i class="fa fa-calendar"></i> Calendario Escolar</a>
                                </li>
                                <li><a><i class="fa fa-gears fa-spin1 fa-fw"></i> Administración <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ route('cargos.index') }}">Cargos</a></li>
                                        <li><a href="{{ route('empleados.index') }}">Empleados</a></li>
                                        <li><a href="{{ route('estados.index') }}">Estados</a></li>
                                        <li><a href="{{ route('motivos.index') }}">Motivos</a></li>
                                        <li><a href="{{ route('parentescos.index') }}">Parentescos</a></li>
                                        <li><a href="{{ route('periodos.index') }}">Periodos</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-lock"></i> Seguridad <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ route('usuarios.index') }}">Usuarios</a></li>
                                        <li><a href="{{ route('roles.index') }}">Roles</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Salir" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
							</form>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            {{-- <div class="top_nav">
                <div class="nav_menu">
                    <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src={{ URL::asset('images/img.png') }} alt="">John Doe
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li><a href="javascript:;"> Profile</a></li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="badge bg-red pull-right">50%</span>
                                            <span>Settings</span>
                                        </a>
                                    </li>
                                    <li><a href="javascript:;">Help</a></li>
                                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                                </ul>
                            </li>
                            <li role="presentation" class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="badge bg-green">6</span>
                                </a>
                                <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                    <li><a>
                                        <span class="image"><img src={{ URL::asset('images/img.png') }} alt="Profile Image" /></span>
                                        <span>
                                            <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                        </span>
                                        <span class="message">
                                            Film festivals used to be do-or-die moments for movie makers. They were where...
                                        </span>
                                    </a></li>
                                    <li><a>
                                        <span class="image"><img src={{ URL::asset('images/img.png') }} alt="Profile Image" /></span>
                                        <span>
                                            <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                        </span>
                                        <span class="message">
                                            Film festivals used to be do-or-die moments for movie makers. They were where...
                                        </span>
                                    </a></li>
                                    <li><a>
                                        <span class="image"><img src={{ URL::asset('images/img.png') }} alt="Profile Image" /></span>
                                        <span>
                                            <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                        </span>
                                        <span class="message">
                                            Film festivals used to be do-or-die moments for movie makers. They were where...
                                        </span>
                                    </a></li>
                                    <li><a>
                                        <span class="image"><img src={{ URL::asset('images/img.png') }} alt="Profile Image" /></span>
                                        <span>
                                            <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                        </span>
                                        <span class="message">
                                            Film festivals used to be do-or-die moments for movie makers. They were where...
                                        </span>
                                    </a></li>
                                    <li>
                                        <div class="text-center">
                                            <a>
                                                <strong>See All Alerts</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div> --}}
            <!-- /top navigation -->

            <!-- page content -->
            {{-- <div class="right_col" role="main" >
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            @yield("contenido")
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="right_col" role="main" style="min-height: initial;">
                @include('layouts._messages')
                @yield("contenido")
            </div>
            <!-- /page content -->

            {{-- <footer>
                <div class="pull-right">
                    Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
                </div>
                <div class="clearfix"></div>
            </footer> --}}
        </div>
    </div>
    <!-- jQuery -->
    <script src={{ URL::asset('js/jquery.min.js') }}></script>
    <!-- Bootstrap -->
    <script src={{ URL::asset('js/bootstrap.min.js') }}></script>
    <!-- FastClick -->
    <script src={{ URL::asset('js/fastclick.js') }}></script>
    <!-- NProgress -->
    <script src={{ URL::asset('js/nprogress.js') }}></script>
    <!-- jQuery custom content scroller -->
    <script src={{ URL::asset('js/jquery.mCustomScrollbar.concat.min.js') }}></script>

    <!-- idCheck -->
    <script src={{ URL::asset('iCheck/icheck.min.js?v=1.0.2') }}></script>

    <!-- Datatables -->
    <script src={{ URL::asset('table/datatables.net/js/jquery.dataTables.min.js') }}></script>
    <script src={{ URL::asset('table/datatables.net-bs/js/dataTables.bootstrap.min.js') }}></script>
    <script src={{ URL::asset('table/datatables.net-buttons/js/dataTables.buttons.min.js') }}></script>
    <script src={{ URL::asset('table/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}></script>
    <script src={{ URL::asset('table/datatables.net-buttons/js/buttons.flash.min.js') }}></script>
    <script src={{ URL::asset('table/datatables.net-buttons/js/buttons.html5.min.js') }}></script>
    <script src={{ URL::asset('table/datatables.net-buttons/js/buttons.print.min.js') }}></script>
    <script src={{ URL::asset('table/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}></script>
    <script src={{ URL::asset('table/datatables.net-keytable/js/dataTables.keyTable.min.js') }}></script>
    <script src={{ URL::asset('table/datatables.net-responsive/js/dataTables.responsive.min.js') }}></script>
    <script src={{ URL::asset('table/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}></script>
    <script src={{ URL::asset('table/datatables.net-scroller/js/dataTables.scroller.min.js') }}></script>
    <script src={{ URL::asset('table/jszip/dist/jszip.min.js') }}></script>

    <!-- Custom Theme Scripts -->
    <script src={{ URL::asset('js/custom.min.js') }}></script>

    {{-- checkbox --}}
    <script src={{ URL::asset('js/checkbox.js') }}></script>

    {{-- Scripts personalizados --}}
    @yield("js")
</body>
</html>
