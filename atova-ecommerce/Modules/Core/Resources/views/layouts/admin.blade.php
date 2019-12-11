@extends('core::layouts.master')

@section('title', $info->title)


@section('wrapper')

<div ng-app="myApp">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel (optional) -->
            {{--<div class="user-panel">--}}
                {{--<div class="pull-left image">--}}
                    {{--<img src="{{ URL::to('/assets/admin_assets/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">--}}
                {{--</div>--}}
                {{--<div class="pull-left info">--}}
                    {{--<p>Alexander Pierce</p>--}}
                    {{--<!-- Status -->--}}
                    {{--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>--}}
                {{--</div>--}}
            {{--</div>--}}


            <!-- Sidebar Menu -->
            <ul class="sidebar-menu">
                <li class="header">HEADER</li>
                @include('statistics::includes.menu')
                @include('hr::includes.menu')
                @include('settings::admin.includes.menu')

                <li class="header"> INVENTORY </li>
                @include('product::admin.includes.menu')
                @include('receiving::admin.includes.menu')
                @include('deliver::admin.includes.menu')

                <li class="header"> ACCOUNTS </li>
                @include('invest::admin.includes.menu')
                @include('accounts::admin.includes.menu')
                @include('bank::admin.includes.menu')
                @include('expenditure::admin.includes.menu')

            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" ng-controller="AppController">
        <!-- Content Header (Page header) -->
        {{--<section class="content-header">--}}
            {{--<h1>--}}
                {{--Page Header--}}
                {{--<small>Optional description</small>--}}
            {{--</h1>--}}
            {{--<ol class="breadcrumb">--}}
                {{--<li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>--}}
                {{--<li class="active">Here</li>--}}
            {{--</ol>--}}
        {{--</section>--}}


            @yield('content')


    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
            Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2015 <a href="#">Company</a>.</strong> All rights reserved.
    </footer>


    <div class="control-sidebar-bg"></div>
</div>
@endsection