<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Buy Your Product From Druto.com.bd</title>

    <!-- Bootstrap -->
    {{ Html::style('assets/frontend/finch/css/bootstrap.min.css') }}
    {{ Html::style('assets/frontend/finch/css/font-awesome.min.css') }}
    {{ Html::style('assets/frontend/finch/css/megamenu.css') }}

    {{ Html::script('assets/frontend/finch/js/modernizr.js') }}

    {{ Html::style('assets/frontend/finch/css/star-rating-svg.css') }}
    {{ Html::style('assets/frontend/finch/style.css') }}

    @yield('extra_css')


    @yield('head_css')

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{ url('assets/frontend/finch') }}/https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="{{ url('assets/frontend/finch') }}/https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>



@yield('main_content')



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->

{{ Html::script('assets/frontend/finch/js/bootstrap.min.js') }}
{{ Html::script('assets/frontend/finch/js/custom.js') }}
{{ Html::script('assets/frontend/finch/js/jquery.menu-aim.js') }}
{{ Html::script('assets/frontend/finch/js/jquery.star-rating-svg.js') }}
{{ Html::script('assets/frontend/finch/js/main.js') }}

@yield('extra_js')

@yield('foot_js')

</body>
</html>