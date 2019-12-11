@extends('frontend::' . $info->template . '.layouts.master')


@section('main_content')

    <nav class="navbar navbar-top">
        <div class="container no-padding">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                {{--<a class="navbar-brand" href="#">Brand</a>--}}
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li> <span class="phone-no"> <i class="fa fa-phone"></i> HOTLINE : 01979 67 33 67, <i class="fa fa-phone text-info"></i> 01979 67 44 67</span></li>
                    {{--<li><a href="#">Link</a></li>--}}
                </ul>


                <ul class="nav navbar-nav navbar-right">
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




    <div class="container no-padding">
        <div class="row clearfix">

            <div class="col-md-3">
                <a href="{{ url('/') }}" class="twite-logo">
                    <img class="img-responsive" src="http://promarketinglinks.com/wp-content/uploads/2016/01/Logo-e-commerce-good.png" alt="">
                    {{--<img class="img-responsive" src="{{ url('/assets/frontend/default/img/logo1.png') }}" alt="">--}}
                </a>
            </div>


            <div class="col-md-1"></div>

            <form>
                <div class="col-md-4 no-margin no-padding">
                    <span class="search-form">
                        <input type="text" class="form-control br0" id="exampleInputName2" placeholder="Search">
                    </span>
                </div>
                <div class="col-md-1 no-margin no-padding">
                    <span class="search-form">
                        <button type="submit" class="btn btn-default br0">Search</button>
                    </span>
                </div>
            </form>

            <div class="col-md-3 text-right header-right-buttons">

                {{--<md-button class="md-fab md-mini md-primary" aria-label="Eat cake">--}}
                    {{--<i class="fa fa-heart"></i>--}}
                {{--</md-button>--}}

                {{--<md-button class="md-fab md-mini" aria-label="Eat cake">--}}
                    {{--<i class="fa fa-shopping-cart"></i>--}}
                {{--</md-button>--}}

                {{--<md-button class="md-fab md-mini" aria-label="Eat cake">--}}
                    {{--<i class="fa fa-shopping-cart"></i>--}}
                {{--</md-button>--}}

                {{--<md-button class="md-raised md-warn"> <i class="fa fa-shopping-cart"></i> Shopping Cart</md-button>--}}

            </div>


        </div>
    </div>




    <div class="container no-padding">

        <nav class="navbar navbar-default">

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
                    <li><a href="{{ url('/') }}"> Home </a></li>

                    @foreach($info->categories as $category)
                        @if(count($category->subCategories) > 0)
                            <li class="dropdown mega-dropdown">

                                <a href="{{ route('product_list', ['id'=>$category->id, 'slug'=>strtolower(str_replace(' ','-', $category->title))]) }}" class="dropdown-toggle" data-toggle="dropdown">{{ $category->title }}</a>

                                <ul class="dropdown-menu mega-dropdown-menu row">
                                    @foreach($category->subCategories as $subCategory)
                                        @if(count($subCategory->subCategories) > 0)
                                            <li class="col-sm-2">
                                                <ul>
                                                    <li class="dropdown-header menu-dropdown-header">
                                                        <a href="{{ route('product_list', ['id'=>$subCategory->id, 'slug'=>strtolower(str_replace(' ','-', $subCategory->title))]) }}">
                                                            {{ $subCategory->title }}
                                                        </a>
                                                    </li>
                                                    @foreach($subCategory->subCategories as $subCat)
                                                        <li><a href="{{ route('product_list', ['id'=>$subCat->id, 'slug'=>strtolower(str_replace(' ','-', $subCat->title))]) }}" title="">{{ $subCat->title }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @else
                                            <li class="col-sm-2">
                                                <ul>
                                                    <li>
                                                        <a href="{{ route('product_list', ['id'=>$subCategory->id, 'slug'=>strtolower(str_replace(' ','-', $subCategory->title))]) }}">
                                                            {{ $subCategory->title }}
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        @endif

                                    @endforeach

                                    {{--<li class="col-sm-3">--}}
                                        {{--<ul>--}}
                                            {{--<li class="dropdown-header">welcome</li>--}}
                                            {{--<div id="myCarousel" class="carousel slide" data-ride="carousel">--}}
                                                {{--<div class="carousel-inner">--}}
                                                    {{--<div class="item active">--}}
                                                        {{--<a href="#"><img src="http://placehold.it/254x150/3498db/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 1"></a>--}}
                                                        {{--<h4><small>Summer dress floral prints</small></h4>--}}
                                                        {{--<button class="btn btn-primary" type="button">49,99 €</button>--}}
                                                        {{--<button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>--}}
                                                    {{--</div>--}}
                                                    {{--<!-- End Item -->--}}
                                                    {{--<div class="item">--}}
                                                        {{--<a href="#"><img src="http://placehold.it/254x150/ef5e55/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 2"></a>--}}
                                                        {{--<h4><small>Gold sandals with shiny touch</small></h4>--}}
                                                        {{--<button class="btn btn-primary" type="button">9,99 €</button>--}}
                                                        {{--<button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>--}}
                                                    {{--</div>--}}
                                                    {{--<!-- End Item -->--}}
                                                    {{--<div class="item">--}}
                                                        {{--<a href="#"><img src="http://placehold.it/254x150/2ecc71/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 3"></a>--}}
                                                        {{--<h4><small>Denin jacket stamped</small></h4>--}}
                                                        {{--<button class="btn btn-primary" type="button">49,99 €</button>--}}
                                                        {{--<button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>--}}
                                                    {{--</div>--}}
                                                    {{--<!-- End Item -->--}}
                                                {{--</div>--}}
                                                {{--<!-- End Carousel Inner -->--}}
                                            {{--</div>--}}
                                            {{--<!-- /.carousel -->--}}
                                            {{--<li class="divider"></li>--}}
                                            {{--<li><a href="#">View all Collection <span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}


                                </ul>

                            </li>
                        @else
                            <li><a href="{{ route('product_list', ['id'=>$category->id, 'slug'=>strtolower(str_replace(' ','-', $category->title))]) }}">{{ $category->title }}</a></li>
                        @endif
                    @endforeach

                </ul>

            </div>
            <!-- /.nav-collapse -->

        </nav>

    </div>


    @yield('content')



    {{-- Start coding for footer Section --}}

            <!--footer start from here-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 footerleft ">
                    <div class="logofooter"> Logo</div>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley.</p>
                    <p><i class="fa fa-map-pin"></i> 210, Aggarwal Tower, Rohini sec 9, New Delhi -        110085, INDIA</p>
                    <p><i class="fa fa-phone"></i> Phone (India) : +91 9999 878 398</p>
                    <p><i class="fa fa-envelope"></i> E-mail : info@webenlance.com</p>

                </div>
                <div class="col-md-2 col-sm-6 paddingtop-bottom">
                    <h6 class="heading7">GENERAL LINKS</h6>
                    <ul class="footer-ul">
                        <li><a href="#"> Career</a></li>
                        <li><a href="#"> Privacy Policy</a></li>
                        <li><a href="#"> Terms & Conditions</a></li>
                        <li><a href="#"> Client Gateway</a></li>
                        <li><a href="#"> Ranking</a></li>
                        <li><a href="#"> Case Studies</a></li>
                        <li><a href="#"> Frequently Ask Questions</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-6 paddingtop-bottom">
                    <h6 class="heading7">LATEST POST</h6>
                    <div class="post">
                        <p>facebook crack the movie advertisment code:what it means for you <span>August 3,2015</span></p>
                        <p>facebook crack the movie advertisment code:what it means for you <span>August 3,2015</span></p>
                        <p>facebook crack the movie advertisment code:what it means for you <span>August 3,2015</span></p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 paddingtop-bottom">
                    <div class="fb-page" data-href="https://www.facebook.com/facebook" data-tabs="timeline" data-height="300" data-small-header="false" style="margin-bottom:15px;" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                        <div class="fb-xfbml-parse-ignore">
                            <blockquote cite="https://www.facebook.com/facebook"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--footer start from here-->

    <div class="copyright">
        <div class="container">
            <div class="col-md-6">
                <p>© 2016 - All Rights with Webenlance</p>
            </div>
            <div class="col-md-6">
                <ul class="bottom_ul">
                    <li><a href="#">webenlance.com</a></li>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Faq's</a></li>
                    <li><a href="#">Contact us</a></li>
                    <li><a href="#">Site Map</a></li>
                </ul>
            </div>
        </div>
    </div>
@stop

