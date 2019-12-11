@extends('frontend::' . $info->template . '.layouts.app')


@section('head_css')
    {{ Html::style('assets/frontend/default/plugin/owlcarousel/dist/assets/owl.carousel.min.css') }}
    {{ Html::style('assets/frontend/default/plugin/owlcarousel/dist/assets/owl.theme.default.min.css') }}
@endsection


@section('content')


    <div class="container">
        <div class="row clearfix">
            <div class="col-md-9 no-padding slider-section">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="https://cdn.itbazaar.com.bd/sliders/149b6d50666adef305c08469222be29ca51f51c4.jpg" alt="...">
                            <div class="carousel-caption">
                                ...
                            </div>
                        </div>
                        <div class="item">
                            <img src="https://cdn.itbazaar.com.bd/sliders/5088b0d0bfaafb15f21ab134afc7fa00af89e7d5.jpg" alt="...">
                            <div class="carousel-caption">
                                ...
                            </div>
                        </div>
                        <div class="item">
                            <img src="https://cdn.itbazaar.com.bd/sliders/5088b0d0bfaafb15f21ab134afc7fa00af89e7d5.jpg" alt="...">
                            <div class="carousel-caption">
                                ...
                            </div>
                        </div>
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

            <div class="col-md-3 no-padding">
                <img src="https://www.itbazaar.com.bd/public/assets/front/img/simage/gigabyte.jpg" class="img-responsive" alt="">
                <img src="https://www.itbazaar.com.bd/public/assets/front/img/simage/xiaomi.jpg" class="img-responsive" alt="">
            </div>

        </div>
    </div>





    <div class="container-fluid">
        <div class="container">


            {{--<div class="row clearfix">--}}

                {{--<div class="col-md-12">--}}
                    {{--<h3 class="latest-product-headline"> LATEST PRODUCTS </h3>--}}
                {{--</div>--}}


                {{--@foreach($products as $product)--}}

                    {{--<div class="col-sm-4 col-md-2 product-thumb">--}}
                        {{--<div class="thumbnail product-thumbnail">--}}
                            {{--<img src="https://www.w3schools.com/css/img_fjords.jpg" alt="...">--}}
                            {{--<img src="{{ url( $product->thumbnail) }}" alt="{{ $product->title }}">--}}
                            {{--<div class="caption center-block">--}}
                                {{--<span class="product-thump-title">--}}
                                    {{--<h4><a href="{{ route('product_details', ['id'=>$product->id, 'slug'=>$product->slug]) }}">{{ $product->title }}</a></h4>--}}
                                {{--</span>--}}
                                {{--<span class="product-price  text-center">--}}
                                    {{--<span class="taka">৳ </span> {{ $product->price }}--}}
                                {{--</span>--}}
                                {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab ad aspernatur consectetur debitis</p>--}}
                                {{--<p class=" text-center">--}}
                                    {{--<md-button class="md-fab md-mini md-primary" aria-label="Eat cake">--}}
                                        {{--<i class="fa fa-heart"></i>--}}
                                    {{--</md-button>--}}
                                    {{--<md-button class="md-fab md-mini" aria-label="Eat cake">--}}
                                        {{--<i class="fa fa-shopping-cart"></i>--}}
                                    {{--</md-button>--}}
                                    {{--<md-button class="md-fab md-mini" aria-label="Eat cake">--}}
                                        {{--<i class="fa fa-shopping-cart"></i>--}}
                                    {{--</md-button>--}}
                                {{--</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                {{--@endforeach--}}

            {{--</div>--}}


            <br>


            <div class="row clearfix">
                <div class="panel panel-default product-panel">
                    <div class="panel-heading">Latest Products</div>
                    <div class="panel-body product-panel-body">

                        <div class="row clearfix">
                            <div class="col-md-3">
                                Categories
                            </div>
                            <div class="col-md-9">
                                {{--<div class="row">--}}
                                    <div class="owl-carousel">
                                    @foreach($products as $product)
                                        <div class="product-thumb">
                                            <div class="thumbnail product-thumbnail">
                                                {{--<img src="https://www.w3schools.com/css/img_fjords.jpg" alt="...">--}}
                                                <img src="{{ url( $product->thumbnail) }}" alt="{{ $product->title }}">
                                                <div class="caption center-block">
                                                <span class="product-thump-title text-center">
                                                    <h4><a href="{{ route('product_details', ['id'=>$product->id, 'slug'=>$product->slug]) }}">{{ $product->title }}</a></h4>
                                                </span>
                                                <span class="product-price  text-center">
                                                    <span class="taka">৳ </span> {{ $product->price }}
                                                </span>
                                                    {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab ad aspernatur consectetur debitis</p>--}}
                                                    <p class=" text-center">
                                                        <md-button class="md-fab md-mini md-primary" aria-label="Eat cake">
                                                            <i class="fa fa-heart"></i>
                                                        </md-button>
                                                        <md-button class="md-fab md-mini" aria-label="Eat cake">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </md-button>
                                                        <md-button class="md-fab md-mini md-info" aria-label="Eat cake">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </md-button>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                {{--</div>--}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <br>


            <div class="row clearfix">
                <div class="panel panel-default">
                    <div class="panel-heading">Latest Products</div>
                    <div class="panel-body">

                        <div class="row clearfix">
                            <div class="col-md-3">
                                Categories
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="owl-carousel">
                                    @foreach($products as $product)
                                        <div class="product-thumb">
                                            <div class="thumbnail product-thumbnail">
                                                {{--<img src="https://www.w3schools.com/css/img_fjords.jpg" alt="...">--}}
                                                <img src="{{ url( $product->thumbnail) }}" alt="{{ $product->title }}">
                                                <div class="caption center-block">
                                                <span class="product-thump-title">
                                                    <h4><a href="{{ route('product_details', ['id'=>$product->id, 'slug'=>$product->slug]) }}">{{ $product->title }}</a></h4>
                                                </span>
                                                <span class="product-price  text-center">
                                                    <span class="taka">৳ </span> {{ $product->price }}
                                                </span>
                                                    {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab ad aspernatur consectetur debitis</p>--}}
                                                    <p class=" text-center">
                                                        <md-button class="md-fab md-mini md-primary" aria-label="Eat cake">
                                                            <i class="fa fa-heart"></i>
                                                        </md-button>
                                                        <md-button class="md-fab md-mini" aria-label="Eat cake">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </md-button>
                                                        <md-button class="md-fab md-mini" aria-label="Eat cake">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </md-button>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>




        </div>
    </div>




@stop


@section('foot_js')
    {{ Html::script('assets/frontend/default/plugin/owlcarousel/dist/owl.carousel.min.js') }}

    <script type="text/javascript">
        $(document).ready(function(){
            $(".owl-carousel").owlCarousel({
                loop:true,
                margin:5,
                nav:false,
                autoplay:true,
                autoplayTimeout:2000,
                autoplayHoverPause:true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:2
                    },
                    1000:{
                        items:4
                    }
                }
            });
        });
    </script>

@stop
