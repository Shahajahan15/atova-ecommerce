<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Potumia</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    {!! Html::style('/assets/admin_assets/bootstrap/css/bootstrap.css') !!}
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->

    {!! Html::style('/assets/admin_assets/dist/css/AdminLTE.css') !!}
    {!! Html::style('/assets/admin_assets/dist/css/skins/skin-blue.css') !!}

    @yield('head_css')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>





<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue sidebar-collapse ">
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>P</b>M</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Potumia</b></span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">

            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <!-- Menu toggle button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">4</span>
                        </a>

                        <ul class="dropdown-menu">

                            <li class="header">You have 4 messages</li>
                            <li>
                                <!-- inner menu: contains the messages -->
                                <ul class="menu">
                                    <li><!-- start message -->
                                        <a href="#">
                                            <div class="pull-left">
                                                <!-- User Image -->
                                                <img src="{{ URL::to('assets/admin_assets/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                                            </div>
                                            <!-- Message title and timestamp -->
                                            <h4>
                                                Support Team
                                                <small> <i class="fa fa-clock-o"></i> 5 mins </small>
                                            </h4>
                                            <!-- The message -->
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <!-- end message -->
                                </ul>
                                <!-- /.menu -->
                            </li>
                            <li class="footer"><a href="#">See All Messages</a></li>

                        </ul>
                    </li>
                    <!-- /.messages-menu -->

                    <!-- Notifications Menu -->
                    <li class="dropdown notifications-menu">
                        <!-- Menu toggle button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">10</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 10 notifications</li>
                            <li>
                                <!-- Inner Menu: contains the notifications -->
                                <ul class="menu">
                                    <li><!-- start notification -->
                                        <a href="#">
                                            <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                        </a>
                                    </li>
                                    <!-- end notification -->
                                </ul>
                            </li>
                            <li class="footer"><a href="#">View all</a></li>
                        </ul>
                    </li>
                    <!-- Tasks Menu -->
                    <li class="dropdown tasks-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-flag-o"></i>
                            <span class="label label-danger">9</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 9 tasks</li>
                            <li>
                                <!-- Inner menu: contains the tasks -->
                                <ul class="menu">
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <!-- Task title and progress text -->
                                            <h3>
                                                Design some buttons
                                                <small class="pull-right">20%</small>
                                            </h3>
                                            <!-- The progress bar -->
                                            <div class="progress xs">
                                                <!-- Change the css width attribute to simulate progress -->
                                                <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">20% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#">View all tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- User Account Menu -->


                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            @if($user->image == '')
                                <img class="user-image img-responsive img-circle" src="{{URL::to('/uploads/users/user.png') }}" alt="User profile picture">
                            @else
                                <img class="user-image img-responsive img-circle" src="{{URL::to($user->image) }}" alt="User profile picture">
                            @endif

                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">{{ $user->first_name . ' '. $user->last_name }} <i class="fa fa-caret-down pull-right"></i></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="text-center">
                                @if($user->image == '')
                                    <img class="profile-user-img img-responsive img-circle" src="{{URL::to('/uploads/users/user.png') }}" alt="User profile picture">
                                @else
                                    <img class="profile-user-img img-responsive img-circle" src="{{URL::to($user->image) }}" alt="User profile picture">
                                @endif
                                <p class="text-bold text-danger">
                                    {{ $user->first_name .' '. $user->last_name }}
                                </p>
                            </li>

                            <li><a href="#"> <i class="fa fa-user"></i> Setting </a></li>
                            <li><a href="{{ Url::to('user/info') }}"><i class="fa fa-user"></i> Profile</a></li>
                            <li><a href="{{ Url::to('user/logout') }}"> <i class="fa fa-sign-out"></i> Sign out</a></li>

                        </ul>
                    </li>


                </ul>
            </div>
        </nav>
    </header>

    <!-- Full Width Column -->







    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-3">


                    <div class="box box-success">
                        <div class="box-header with-border">
                            {{--<h3 class="box-title">Folders</h3>--}}

                            @if($user->image == '')
                            <img class="profile-user-img img-responsive img-circle" src="{{URL::to('/uploads/users/user.png') }}" alt="User profile picture">
                            @else
                                <img class="profile-user-img img-responsive img-circle" src="{{URL::to($user->image) }}" alt="User profile picture">
                            @endif

                            <h3 class="profile-username text-center">{{ $user->first_name .' '. $user->last_name }}</h3>
                            <p class="text-muted text-center">
                                @if($user->role == 'u')
                                    Customer
                                @elseif($user->role == 'sp')
                                    Service Provider
                                @else
                                    Admin
                                @endif
                            </p>

                            <div class="box-tools">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            </div>

                        </div>
                        <div class="box-body no-padding">
                            <ul class="nav nav-pills nav-stacked">
                                <li class="@if($info->menu == 'Profile') active @endif"><a href="{{ url('user/backend/info') }}"><i class="fa fa-inbox"></i> Profile </a></li>
                                <li class="@if($info->menu == 'Contact info') active @endif"><a href="{{ url('user/backend/contact') }}"><i class="fa fa-envelope-o"></i> Contact info </a></li>
                                <li class="@if($info->menu == 'Jobs') active @endif"><a href="#"><i class="fa fa-file-text-o"></i> Jobs </a></li>
                                <li class="@if($info->menu == 'Message') active @endif"><a href="#"><i class="fa fa-filter"></i> Message <span class="label label-warning pull-right">65</span></a></li>
                                <li class="@if($info->menu == 'Settings') active @endif"><a href="#"><i class="fa fa-trash-o"></i> Settings</a></li>
                            </ul>
                        </div>
                        <!-- /.box-body -->
                    </div>


                    <!-- /. box -->
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title"> Service Provider </h3>

                            <div class="box-tools">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="box-body no-padding">
                            <ul class="nav nav-pills nav-stacked">
                                <li class="@if($info->menu == 'Work Area') active @endif"><a href="{{ url('serviceprovider/backend/work-areas') }}"><i class="fa fa-circle-o text-red"></i> Work area </a></li>
                                <li class="@if($info->menu == 'Accreditation') active @endif"><a href="{{ url('serviceprovider/backend/accreditation') }}"><i class="fa fa-circle-o text-yellow"></i> Accreditation </a></li>
                                <li class="@if($info->menu == 'References') active @endif"><a href="{{ url('serviceprovider/backend/references') }}"><i class="fa fa-circle-o text-light-blue"></i> References </a></li>
                                <li class="@if($info->menu == 'Working Schedule') active @endif"><a href="{{ url('serviceprovider/backend/working-schedule') }}"><i class="fa fa-circle-o text-light-blue"></i> Working Schedule </a></li>
                                <li class="@if($info->menu == 'Education') active @endif"><a href="{{ url('serviceprovider/backend/educations') }}"><i class="fa fa-circle-o text-light-blue"></i> Education </a></li>
                                <li class="@if($info->menu == 'Company Details') active @endif"><a href="{{ url('serviceprovider/backend/company-details') }}"><i class="fa fa-circle-o text-light-blue"></i> Company Details </a></li>
                                <li class="@if($info->menu == 'Portfolio') active @endif"><a href="{{ url('serviceprovider/backend/portfolio') }}"><i class="fa fa-circle-o text-light-blue"></i> Portfolio </a></li>
                            </ul>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">

                    @yield('user_content')

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>











    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="container">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.3.3
            </div>
            <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
            reserved.
        </div>
        <!-- /.container -->
    </footer>





</div>
<!-- ./wrapper -->



<!-- REQUIRED JS SCRIPTS -->

{!! HTML::script('/assets/admin_assets/plugins/jQuery/jQuery-2.2.0.min.js') !!}
{!! HTML::script('/assets/admin_assets/bootstrap/js/bootstrap.min.js') !!}

<!-- AdminLTE App -->
{!! HTML::script('/assets/admin_assets/dist/js/app.min.js') !!}

@yield('foot_js')

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

</body>
</html>