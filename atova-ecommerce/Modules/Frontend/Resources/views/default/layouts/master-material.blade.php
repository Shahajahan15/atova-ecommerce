<!DOCTYPE html>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    {{ Html::style('assets/frontend/bootstrap/css/bootstrap.min.css') }}
    {{ Html::style('assets/frontend/materialize/css/materialize.min.css') }}

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>


    @yield('content')


<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
{{ Html::script('assets/frontend/bootstrap/js/bootstrap.min.js') }}
{{ Html::script('assets/frontend/materialize/js/materialize.min.js') }}

@yield('foot_js')
</body>
</html>