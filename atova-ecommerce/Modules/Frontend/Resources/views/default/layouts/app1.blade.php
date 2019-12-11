@extends('frontend::' . $info->template . '.layouts.master')


@section('main_content')

    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Brand</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                    <li><a href="#">Link</a></li>
                </ul>




                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Link</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>




    <div class="container">
        <div class="row clearfix">
            <div class="col-md-3">
                <a href="{{ url('/') }}">
                    <img class="img-responsive" src="http://promarketinglinks.com/wp-content/uploads/2016/01/Logo-e-commerce-good.png" alt="">
                </a>
            </div>
            <div class="col-md-8">
                <form class="form-inline">
                    <div class="form-group">
                        <input type="text" class="form-control" id="exampleInputName2" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Search</button>
                </form>
            </div>
        </div>
    </div>




    <div class="container">
        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                {{--<a class="navbar-brand" href="#">MegaMenu</a>--}}
            </div>


            <div class="collapse navbar-collapse js-navbar-collapse">
                <ul class="nav navbar-nav">



                    <li class="dropdown mega-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Men</a>

                        <ul class="dropdown-menu mega-dropdown-menu row">
                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header">New in Stores</li>
                                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="item active">
                                                <a href="#"><img src="http://placehold.it/254x150/3498db/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 1"></a>
                                                <h4><small>Summer dress floral prints</small></h4>
                                                <button class="btn btn-primary" type="button">49,99 €</button>
                                                <md-button class="md-raised md-warn">Primary</md-button>
                                                {{--<button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>--}}
                                            </div>
                                            <!-- End Item -->
                                            <div class="item">
                                                <a href="#"><img src="http://placehold.it/254x150/ef5e55/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 2"></a>
                                                <h4><small>Gold sandals with shiny touch</small></h4>
                                                <button class="btn btn-primary" type="button">9,99 €</button>
                                                <md-button class="md-raised md-primary">Primary</md-button>
                                                {{--<button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>--}}
                                            </div>
                                            <!-- End Item -->
                                            <div class="item">
                                                <a href="#"><img src="http://placehold.it/254x150/2ecc71/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 3"></a>
                                                <h4><small>Denin jacket stamped</small></h4>
                                                <button class="btn btn-primary" type="button">49,99 €</button>
                                                <md-button class="md-raised md-primary">Primary</md-button>
                                                {{--<button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>--}}
                                            </div>
                                            <!-- End Item -->
                                        </div>
                                        <!-- End Carousel Inner -->
                                    </div>
                                    <!-- /.carousel -->
                                    <li class="divider"></li>
                                    <li><a href="#">View all Collection <span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
                                </ul>
                            </li>
                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header">Dresses</li>
                                    <li><a href="#">Unique Features</a></li>
                                    <li><a href="#">Image Responsive</a></li>
                                    <li><a href="#">Auto Carousel</a></li>
                                    <li><a href="#">Newsletter Form</a></li>
                                    <li><a href="#">Four columns</a></li>
                                    <li class="divider"></li>
                                    <li class="dropdown-header">Tops</li>
                                    <li><a href="#">Good Typography</a></li>
                                </ul>
                            </li>
                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header">Jackets</li>
                                    <li><a href="#">Easy to customize</a></li>
                                    <li><a href="#">Glyphicons</a></li>
                                    <li><a href="#">Pull Right Elements</a></li>
                                    <li class="divider"></li>
                                    <li class="dropdown-header">Pants</li>
                                    <li><a href="#">Coloured Headers</a></li>
                                    <li><a href="#">Primary Buttons & Default</a></li>
                                    <li><a href="#">Calls to action</a></li>
                                </ul>
                            </li>
                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header">Accessories</li>
                                    <li><a href="#">Default Navbar</a></li>
                                    <li><a href="#">Lovely Fonts</a></li>
                                    <li><a href="#">Responsive Dropdown </a></li>
                                    <li class="divider"></li>
                                    <li class="dropdown-header">Newsletter</li>
                                    <form class="form" role="form">
                                        <div class="form-group">
                                            <label class="sr-only" for="email">Email address</label>
                                            <input type="email" class="form-control" id="email" placeholder="Enter email">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                                    </form>
                                </ul>
                            </li>
                        </ul>

                    </li>




                    <li class="dropdown mega-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Women</a>

                        <ul class="dropdown-menu mega-dropdown-menu row">

                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header">Dresses</li>
                                    <li><a href="#">Unique Features</a></li>
                                    <li><a href="#">Image Responsive</a></li>
                                    <li><a href="#">Auto Carousel</a></li>
                                    <li><a href="#">Newsletter Form</a></li>
                                    <li><a href="#">Four columns</a></li>
                                    <li class="divider"></li>
                                    <li class="dropdown-header">Tops</li>
                                    <li><a href="#">Good Typography</a></li>
                                </ul>
                            </li>
                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header">Jackets</li>
                                    <li><a href="#">Easy to customize</a></li>
                                    <li><a href="#">Glyphicons</a></li>
                                    <li><a href="#">Pull Right Elements</a></li>
                                    <li class="divider"></li>
                                    <li class="dropdown-header">Pants</li>
                                    <li><a href="#">Coloured Headers</a></li>
                                    <li><a href="#">Primary Buttons & Default</a></li>
                                    <li><a href="#">Calls to action</a></li>
                                </ul>
                            </li>
                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header">Accessories</li>
                                    <li><a href="#">Default Navbar</a></li>
                                    <li><a href="#">Lovely Fonts</a></li>
                                    <li><a href="#">Responsive Dropdown </a></li>
                                    <li class="divider"></li>
                                    <li class="dropdown-header">Newsletter</li>
                                    <form class="form" role="form">
                                        <div class="form-group">
                                            <label class="sr-only" for="email">Email address</label>
                                            <input type="email" class="form-control" id="email" placeholder="Enter email">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                                    </form>
                                </ul>
                            </li>

                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header">welcome</li>
                                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="item active">
                                                <a href="#"><img src="http://placehold.it/254x150/3498db/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 1"></a>
                                                <h4><small>Summer dress floral prints</small></h4>
                                                <button class="btn btn-primary" type="button">49,99 €</button>
                                                <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>
                                            </div>
                                            <!-- End Item -->
                                            <div class="item">
                                                <a href="#"><img src="http://placehold.it/254x150/ef5e55/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 2"></a>
                                                <h4><small>Gold sandals with shiny touch</small></h4>
                                                <button class="btn btn-primary" type="button">9,99 €</button>
                                                <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>
                                            </div>
                                            <!-- End Item -->
                                            <div class="item">
                                                <a href="#"><img src="http://placehold.it/254x150/2ecc71/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 3"></a>
                                                <h4><small>Denin jacket stamped</small></h4>
                                                <button class="btn btn-primary" type="button">49,99 €</button>
                                                <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>
                                            </div>
                                            <!-- End Item -->
                                        </div>
                                        <!-- End Carousel Inner -->
                                    </div>
                                    <!-- /.carousel -->
                                    <li class="divider"></li>
                                    <li><a href="#">View all Collection <span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
                                </ul>
                            </li>


                        </ul>

                    </li>



                </ul>

            </div>
            <!-- /.nav-collapse -->
        </nav>
    </div>


    @yield('content')


@stop

