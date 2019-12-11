@extends('frontend::' . $info->template . '.layouts.master')


@section('main_content')




    <!-- Header Start -->
    <div class="top_header">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <p><i class="fa fa-phone phone_icon" aria-hidden="true"></i>Contact No: 01722609999</p>
                </div>

                <div class="col-md-3 col-sm-3 col-xs-12">
                    <p><i class="fa fa-skype phone_icon" aria-hidden="true"></i> Skype Id :finchdatasoft</p>
                </div>


                <div class="col-md-3 col-sm-3 col-xs-12">
                    <p><i class="fa fa-envelope-o phone_icon" aria-hidden="true"></i>Email: druto.com.bd@gmail.com</p>
                </div>

                <div class="col-md-3 col-sm-3 col-xs-12">
                    {{--<ul class="nav navbar-nav navbar-right">--}}

                        {{--<li class="dropdown">--}}
                            {{--<a href="#" class="dropdown-toggle toplogin" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>--}}
                            {{--<ul id="login-dp" class="dropdown-menu">--}}
                                {{--<li>--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="col-md-12">--}}
                                            {{--Login via--}}
                                            {{--<div class="social-buttons">--}}
                                                {{--<a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>--}}
                                                {{--<a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>--}}
                                            {{--</div>--}}
                                            {{--or--}}
                                            {{--<form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">--}}
                                                {{--<div class="form-group">--}}
                                                    {{--<label class="sr-only" for="exampleInputEmail2">Email address</label>--}}
                                                    {{--<input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email address" required>--}}
                                                {{--</div>--}}
                                                {{--<div class="form-group">--}}
                                                    {{--<label class="sr-only" for="exampleInputPassword2">Password</label>--}}
                                                    {{--<input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required>--}}
                                                    {{--<div class="help-block text-right"><a href="">Forget the password ?</a></div>--}}
                                                {{--</div>--}}
                                                {{--<div class="form-group">--}}
                                                    {{--<button type="submit" class="btn btn-primary btn-block">Sign in</button>--}}
                                                {{--</div>--}}
                                                {{--<div class="checkbox">--}}
                                                    {{--<label>--}}
                                                        {{--<input type="checkbox"> keep me logged-in--}}
                                                    {{--</label>--}}
                                                {{--</div>--}}
                                            {{--</form>--}}
                                        {{--</div>--}}
                                        {{--<div class="bottom text-center">--}}
                                            {{--New here ? <a href="#"><b>Join Us</b></a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                </div>


            </div>
        </div>
    </div>
    <!-- Header End -->






    <!-- Logo Start -->
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="logo">
                        <a href="{{ url('/') }}"><img src="{{ url('assets/frontend/finch/img/logo.png') }}" alt="Logo" class="img-responsive"/></a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-5 col-xs-12">
                    <div class="input-group search_product_cat">
                        <div class="input-group-btn search-panel">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
							<span id="search_concept"><i class="fa fa-bars" aria-hidden="true"></i>
								Select a category</span>
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#contains">Contains</a></li>
                                <li><a href="#its_equal">It's equal</a></li>
                                <li><a href="#greather_than">Greather than ></a></li>
                                <li><a href="#less_than">Less than < </a></li>
                                <li class="divider"></li>
                                <li><a href="#all">Anything</a></li>
                            </ul>
                        </div>
                        <input type="hidden" name="search_param" value="all" id="search_param">
                        <input type="text" class="form-control" name="x" placeholder="Search Products...">
                        <span class="input-group-btn">
						<button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
					</span>
                    </div>
                </div>
                <div class="col-md-2 col-sm-3 col-xs-12">
                    <div class="addtocard">
                        <a href=""><span class="glyphicon glyphicon-shopping-cart shopping-cart_cus"></span> 0 Item-$0.00</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Logo End -->







    <!-- Main Menu Start -->
    <div class="main_menu">

        <nav class="navbar navbar-inverse menu ">
            <div class="container no-padding no-margin">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <ul class="nav navbar-nav">
                        <li><a @if($info->selectedMenu == "Home")id="active"@endif href="{{ url('/') }}">HOME</a></li>
                        @foreach($info->categories as $category)
                            <li>
                                <a @if($info->selectedMenu == $category->title)id="active"@endif href="{{ route('product_list', ['id'=>$category->id, 'slug'=>strtolower(str_replace(' ','-', $category->title))]) }}">
                                    {{ $category->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>
        </nav>
    </div>
    <!-- Main Menu End -->



    @yield('content')


    <!--Brand section-->

    <div class="slider_section bg_color">
        <div class="container slider_info">
            <div class="project-text">
                <h2><button class="btn brand_back">TOP BRAND</button></h2>

            </div>
            <div id="carousel-example-generic1" class="carousel slide" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active row">
                        <div class="col-md-2 col-sm-4 single_brand"><img data-u="image" src="{{ url('assets/frontend/finch') }}/img/b1.png" /></div>
                        <div class="col-md-2 col-sm-4 single_brand"><img data-u="image" src="{{ url('assets/frontend/finch') }}/img/b2.png" /> </div>
                        <div class="col-md-2 col-sm-4 single_brand"> <img data-u="image" src="{{ url('assets/frontend/finch') }}/img/b3.png" /></div>
                        <div class="col-md-2 col-sm-4 single_brand"><img data-u="image" src="{{ url('assets/frontend/finch') }}/img/b4.png" /></div>
                        <div class="col-md-2 col-sm-4 single_brand"><img data-u="image" src="{{ url('assets/frontend/finch') }}/img/b4.png" /></div>
                        <div class="col-md-2 col-sm-4 single_brand"><img data-u="image" src="{{ url('assets/frontend/finch') }}/img/b4.png" /></div>
                    </div>
                    <div class="item row">
                        <div class="col-md-2 col-sm-4 single_brand"> <img data-u="image" src="{{ url('assets/frontend/finch') }}/img/b1.png" /></div>
                        <div class="col-md-2 col-sm-4 single_brand"> <img data-u="image" src="{{ url('assets/frontend/finch') }}/img/b2.png" /> </div>
                        <div class="col-md-2 col-sm-4 single_brand"> <img data-u="image" src="{{ url('assets/frontend/finch') }}/img/b3.png" /> </div>
                        <div class="col-md-2 col-sm-4 single_brand"> <img data-u="image" src="{{ url('assets/frontend/finch') }}/img/b5.png" /> </div>
                        <div class="col-md-2 col-sm-4 single_brand"> <img data-u="image" src="{{ url('assets/frontend/finch') }}/img/b5.png" /> </div>
                        <div class="col-md-2 col-sm-4 single_brand"> <img data-u="image" src="{{ url('assets/frontend/finch') }}/img/b5.png" /> </div>
                    </div>

                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic1" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic1" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>
    </div>
    <!--End of Brand section-->





    <!-- Footer Start -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footerone">
                        <h4>CONTACT US</h4>
                        <span class="footer_widget_title"> Office :</span>
                        <p>Jabal-e-Rehmat<br />
                            Home # 152, Road # 01<br />
                            College Road,Alamnagar, Rangpur.</p>
                        <p class="footeroneinfo"><span class="footer_widget_title">Phone:</span> 01722609999 <br />
                            {{--<span class="footer_widget_title">Fax: </span>01974107979<br />--}}
                            <span class="footer_widget_title">Email:</span> druto.com.bd@gmail.com </p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="footertwo">
                        <h4>MY ACCOUNT</h4>
                        <ul>
                            <li><a href="">Login</a></li>
                            <li><a href="">Mycart</a></li>
                            <li><a href="">Wishlist</a></li>
                            <li><a href="">Checkout</a></li>

                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="footertwo">
                        <h4>INFORMATION</h4>
                        <ul>
                            <li><a href="">Login</a></li>
                            <li><a href="">New Products</a></li>
                            <li><a href="">Best Sellers</a></li>
                            <li><a href="">Our Stores</a></li>

                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="footertwo">
                        <h4>ORDERS</h4>
                        <ul>
                            <li><a href="">Payment options</a></li>
                            <li><a href="">Shipping and delivery</a></li>
                            <li><a href="">Returns</a></li>
                            <li><a href="">Shipping</a></li>

                        </ul>
                        <img src="{{ url('assets/frontend/finch') }}/img/paymenticon.png" class="img-responsive" alt=""/>
                    </div>
                </div>
            </div>
        </div>
    </div>







    <!--copyright section-->
    <div class="copywrite">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="copyright_content">
                        <p>©Copyright 2017 Compony Name | All Rights Reserved|Privacy Policy</p>
                    </div>
                </div>
                <div class="col-md-3"></div>
                <div class="col-md-3">
                    <div class="footer_social_icon">
                        <li><a href=""><i class="fa fa-facebook footer_icon" aria-hidden="true"></i></a></li>
                        <li><a href=""><i class="fa fa-twitter footer_icon" aria-hidden="true"></i></a></li>
                        <li><a href=""><i class="fa fa-google-plus footer_icon" aria-hidden="true"></i></a></li>
                        <li><a href=""><i class="fa fa-youtube footer_icon" aria-hidden="true"></i></a></li>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end of footer-->
    <!-- Footer End-->






@stop

