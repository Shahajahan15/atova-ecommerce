<!DOCTYPE html>
<html><head>
    <meta charset="utf-8">
    <title>Divider</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    {!! Html::style('/css/bootstrap.css') !!}

    <!-- Edit CSS -->
    {!! Html::style('/css/default.css') !!}
    {!! Html::style('/css/main.css') !!}

    <!-- Font Awesome -->
    {!! Html::style('/css/font-awesome.css') !!}
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web:400,900,700,600,300,200" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700" rel="stylesheet">
    <link rel="shortcut icon" href="images/favicon.ico">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>



<div id="page" class="page">


    <header class="header9" id="header9">

        <nav role="navigation" class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button data-target="#navbar-collapse-02" data-toggle="collapse" class="navbar-toggle" type="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="{{ url('/') }}" class="navbar-brand brand"><i class="fa fa-font"></i><span>ArtOfCSE</span><span>Learn Computing</span></a>
                </div>

                <div id="navbar-collapse-02" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('about') }}">About</a></li>
                        <li><a href="{{ url('courses') }}">Courses</a></li>
                        <li><a href="{{ url('instructors') }}">Instructors</a></li>
                        <li><a href="{{ url('services') }}">Services</a></li>
                        <li><a href="{{ url('contact') }}">Contact</a></li>


                        @if (Auth::guest())
                            <li><a class="nav-button" href="{{ url('login') }}">Sign In</a></li>
                            {{--<li><a class="nav-button" href="{{ url('/register') }}">Register</a></li>--}}
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->last_name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif

                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>
        </nav>
    </header><!-- header -->



    @yield('content')




    <section class="footer1">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h1><i class="fa fa-codepen"></i> Eden </h1>
                    <p>sapiente, nam sunt rem beatae architecto cupiditate.</p>
                    <div class="media">
                        <div class="media-left"><a href="#"><i class="fa fa-home"></i></a></div>
                        <div class="media-body">
                            <h5 class="media-heading">Address</h5>
                            <p>Lebel 2, 13 Elezabe St, Melbounire, Victoria 3000 </p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#"><i class="fa fa-envelope-o"></i></a>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading">Having any questions?</h5>
                            <p>support@settletheme.com</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#"><i class="fa fa-phone"></i></a>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading">Call us &amp; Hair us</h5>
                            <p>+61(0)7 9180 3458</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#"><i class="fa fa-fax"></i></a>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading">Fax</h5>
                            <p>+(921) 34256537893</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <h4>Fresh Tweets</h4>
                    <div class="media">
                        <div class="media-left">
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </div>
                        <div class="media-body">
                            <p><a href="#">@Steeltheme,</a> Porton HTML various out now</p>
                            <strong>10 Mins Ago</strong>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </div>
                        <div class="media-body">
                            <p><a href="#">@envato,</a> Porton HTML various out now, search more market</p>
                            <strong>10 Mins Ago</strong>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </div>
                        <div class="media-body">
                            <p><a href="#">@collins,</a> Porton HTML various out now</p>
                            <strong>10 Mins Ago</strong>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </div>
                        <div class="media-body">
                            <p><a href="#">@Steeltheme,</a> Porton HTML various out now</p>
                            <strong>10 Mins Ago</strong>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <h4>Latest Updates</h4>
                    <div class="media">
                        <div class="media-left">
                            <a href="#"><img class="media-object" src="images/feed-1.png" alt=""></a>
                        </div>
                        <div class="media-body">
                            <p class="update">An engaging video a the post</p>
                            <strong class="update-info"><i class="fa fa-user"></i>Mano <i class="fa fa-eye"></i>22 Viwes</strong>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#"><img class="media-object" src="images/feed-1.png" alt=""></a>
                        </div>
                        <div class="media-body">
                            <p class="update">An engaging video a the post</p>
                            <strong class="update-info"><i class="fa fa-user"></i>Mano <i class="fa fa-eye"></i>72 Viwes</strong>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#"><img class="media-object" src="images/feed-1.png" alt=""></a>
                        </div>
                        <div class="media-body">
                            <p class="update">An engaging video a the post</p>
                            <strong class="update-info"><i class="fa fa-user"></i>Mano <i class="fa fa-eye"></i>32 Viwes</strong>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#"><img class="media-object" src="images/feed-1.png" alt=""></a>
                        </div>
                        <div class="media-body">
                            <p class="update">An engaging video a Nam sunt</p>
                            <strong class="update-info"><i class="fa fa-user"></i>Mano <i class="fa fa-eye"></i>27 Viwes</strong>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <h4>Popular tags</h4>
                    <div class="tags" style="padding-top: 8px;">
                        <a class="btn btn-default btn-sm" href="#">Amazing</a>
                        <a class="btn btn-default btn-sm" href="#">Design</a>
                        <a class="btn btn-default btn-sm" href="#">Jequery</a>
                        <a class="btn btn-default btn-sm" href="#">Photoshop</a>
                        <a class="btn btn-default btn-sm" href="#">art</a>
                        <a class="btn btn-default btn-sm" href="#">wordpres</a>
                    </div>

                    <div class="subscribe">
                        <h4>subscribe us</h4>
                        <p>Nam sunt rem beatae architecto cupiditate numquam.</p>
                        <div class="input-group">
                            <input type="text" class="form-control input-sm" placeholder="Email Address">
                            <span class="input-group-btn">
                                        <button class="btn btn-default input-sm" type="button"><i class="fa fa-check"></i></button>
                                    </span>
                        </div>
                        <p>We respect your privacy.</p>
                    </div>
                    <ul class="list-inline social-link">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- END TOP FOOTER -->




    <!-- BOTTOM FOOTER -->
    <section class="footer1 bottom-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    Copyrights 2015 All Reseved by <a href="bootultra.com">Bootultra.com</a>
                </div>
                <div class="col-md-6 text-right">
                    <a href="#">Terms of use</a>
                    <a href="#">Privacy &amp; Security Statement</a>
                </div>
            </div>
        </div>
    </section>
    <!-- END BOTTOM FOOTER -->




</div><!-- /#page -->


<!--=== Load JS here for greater good ====-->
<script src="js/jquery-1.8.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/isotope.pkgd.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/jquery.flexslider.js"></script>
<script src="js/jquery.nivo.slider.pack.js"></script>
<script src="js/portfolio-custom1.js"></script>
<script src="js/portfolio-custom2.js"></script>
<script src="js/main.js"></script>


</body></html>