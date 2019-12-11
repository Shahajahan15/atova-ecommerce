<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    {!! Html::style('/assets/admin_assets/bootstrap/css/bootstrap.css') !!}
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    {!! Html::style('/assets/admin_assets/dist/css/AdminLTE.min.css') !!}
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->

    {!! Html::style('/assets/admin_assets/dist/css/AdminLTE.css') !!}
    {!! Html::style('/assets/admin_assets/dist/css/custom.css') !!}
    {!! Html::style('/assets/admin_assets/dist/css/skins/skin-blue.css') !!}

    @yield('head_js')


    @yield('head_css')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="hold-transition skin-blue sidebar-mini" >
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="{{ url('hr/admin/employees') }}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>TM</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b> E-commerce </b></span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">


                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="{{URL::to('/assets/admin_assets/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">Mamun Sarkar <i class="fa fa-caret-down pull-right"></i></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="text-center">
                                <img src="{{URL::to('/assets/admin_assets/dist/img/user2-160x160.jpg') }}" width="60" class="img-thumbnail img-responsive center-block" alt="User Image">

                                <p class="text-bold text-danger">
                                    Mamun Sarkar
                                </p>
                            </li>

                            <li><a href="{{ url('settings/admin/company-info') }}"> <i class="fa fa-user"></i> Setting </a></li>
                            {{--<li><a href="{{ Url::to('user/info') }}"><i class="fa fa-user"></i> Profile </a></li>--}}
                            {{--<li><a href="{{ route('logout') }}"> <i class="fa fa-sign-out"></i> Logout </a></li>--}}

                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i> Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>

                        </ul>
                    </li>


                    <!-- Control Sidebar Toggle Button -->
                    {{--<li>--}}
                        {{--<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>--}}
                    {{--</li>--}}

                </ul>
            </div>
        </nav>
    </header>




    @yield('wrapper')


</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

{!! HTML::script('/assets/admin_assets/plugins/jQuery/jQuery-2.2.0.min.js') !!}
{!! HTML::script('/assets/admin_assets/bootstrap/js/bootstrap.min.js') !!}

<!-- AdminLTE App -->
{!! HTML::script('/assets/admin_assets/dist/js/app.min.js') !!}

@yield('foot_js')

</body>
</html>
