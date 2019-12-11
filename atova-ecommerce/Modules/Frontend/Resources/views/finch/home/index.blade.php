@extends('frontend::' . $info->template . '.layouts.app')



@section('content')





    <!-- Slider Start -->
    <div class="bg_color">
        <div class="container">
            <div class="row">
                <div class="col-md-3">

                    <div class="category">

                        <ul class="list-unstyled">

                            <li class="cat-brand">PRODUCT LIST <i class="fa fa-bars cat_bar" aria-hidden="true"></i></li>

                            @foreach($info->categories as $category)
                                @if(count($category->subCategories) > 0)
                                    <li>
                                        <div class="dropdown">
                                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-headphones cat_icon" aria-hidden="true"></i> {{ $category->title }}
                                                <span class="caret pull-right"></span>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">

                                                @foreach($category->subCategories as $subCategory)
                                                    <div class="col-sm-4">
                                                        <div class="sub-cat">
                                                            @if(count($subCategory->subCategories) > 0)
                                                                <h3> <a href="" title="">{{ $subCategory->title }} <span class="pull-right"><i class="fa fa-chevron-right"></i></span> </a></h3>
                                                                <ul class="list-unstyled">
                                                                    @foreach($subCategory->subCategories as $subCat)
                                                                        <li><a href="{{ route('product_list', ['id'=>$subCat->id, 'slug'=>strtolower(str_replace(' ','-', $subCat->title))]) }}" title="">{{ $subCat->title }}</a></li>
                                                                    @endforeach
                                                                </ul>
                                                            @else
                                                                <h3> <a href="{{ route('product_list', ['id'=>$subCategory->id, 'slug'=>strtolower(str_replace(' ','-', $subCategory->title))]) }}" title=""> {{ $subCategory->title }} </a></h3>
                                                            @endif

                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </li>
                                @else
                                    <li><a href="{{ route('product_list', ['id'=>$category->id, 'slug'=>strtolower(str_replace(' ','-', $category->title))]) }}" title=""><i class="fa fa-headphones cat_icon" aria-hidden="true"></i>{{ $category->title }}</a></li>
                                @endif

                            @endforeach

                        </ul>
                    </div>

                </div>


                <div class="col-md-9">
                    <div class="hidden-xs slider">

                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <img src="{{ url('assets/frontend/finch') }}/img/slider.jpg" alt="Slide 1">
                                    <div class="slider_caption_text hidden-xs">
                                        <div class="col-md-12 text-center">
                                            <h2> WE <span> PROVIDE </span> BEST SERVICE</h2>
                                            <p>WELL. YOU HAVE COME TO THE RIGHT PLACE FOR BUILDING WEBSITE</p>
                                            <div class="bton">
                                                <a class="btn btn-danger btn-sm btn-min-block" href="#">BOOK NOW</a>
                                            </div>
                                        </div>
                                    </div><!-- /header-text -->
                                </div>
                                <div class="item">
                                    <img src="{{ url('assets/frontend/finch') }}/img/slider.jpg" alt="Slider 2">
                                    <div class="slider_caption_text hidden-xs">
                                        <div class="col-md-12 text-center">
                                            <h2> WE <span> PROVIDE </span> BEST SERVICE</h2>
                                            <p>WELL. YOU HAVE COME TO THE RIGHT PLACE FOR BUILDING WEBSITE</p>
                                            <div class="bton">
                                                <a class="btn btn-primary btn-sm btn-min-block" href="#">CONTACT US</a>
                                            </div>
                                        </div>
                                    </div><!-- /header-text -->
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
                </div>
            </div>
        </div>
    </div>
    <!-- Slider End -->





    <!-- Product Start -->
    <div class="bg_color">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#lpro" aria-controls="home" role="tab" data-toggle="tab">LATEST PRODUCTS</a></li>
                        <li role="presentation"><a href="#fpro" aria-controls="fpro" role="tab" data-toggle="tab">FEATURE PRODUCT</a></li>
                        <li role="presentation"><a href="#bsell" aria-controls="bpro" role="tab" data-toggle="tab">BEST SELLS</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">



                        <!--first latest product-->
                        <div role="tabpanel" class=" row tab-pane active" id="lpro">
                            @foreach($products as $product)
                                <div class="col-md-3 col-sm-4">
                                    <div class="single_product">
                                        {{--<span class="salep">Sall</span>--}}
                                        <img src="{{ url($product->thumbnail) }}" class="img-responsive" alt=""/>

                                        <div class="product-title">
                                            <h4><a href="{{ route('product_details', ['id'=>$product->id, 'slug'=>$product->slug]) }}">{{ $product->title }}</a></h4>
                                        </div>
                                        <p>
                                            <span class="product_rate">{{ $product->price }}tk</span>
                                            {{--<span class="product_past_rate">220.00tk</span>--}}
                                        </p>
                                        <div class="my-rating jq-stars"></div>
                                        <a href="{{ route('product_details', ['id'=>$product->id, 'slug'=>$product->slug]) }}"><button class="btn product_buy_now">Buy Now</button></a>
                                    </div>
                                </div>
                            @endforeach
                        </div>





                        <!--feature product-->

                        <div role="tabpanel" class=" row tab-pane" id="fpro">

                            <div class="col-md-3 col-sm-4">
                                <div class="single_product">
                                    <span class="salep">Sall</span>
                                    <img src="{{ url('assets/frontend/finch') }}/img/p1.png" class="img-responsive" alt=""/>
                                    <h4><a href="">Digital Television</a></h4>
                                    <p> <span class="product_rate">350.00tk</span> <span class="product_past_rate">220.00tk</span></p>
                                    <div class="my-rating jq-stars"></div>
                                    <a href=""><button class="btn product_buy_now">Buy Now</button></a>
                                </div>
                            </div>


                        </div>






                        <!--best sell product-->

                        <div role="tabpanel" class="row tab-pane" id="bsell">


                            <div class="col-md-3 col-sm-4">
                                <div class="single_product">
                                    <span class="salep">Sall</span>
                                    <img src="{{ url('assets/frontend/finch') }}/img/p1.png" class="img-responsive" alt=""/>
                                    <h4><a href="">T-shart</a></h4>
                                    <p> <span class="product_rate">350.00tk</span> <span class="product_past_rate">220.00tk</span></p>
                                    <div class="my-rating jq-stars"></div>
                                    <a href=""><button class="btn product_buy_now">Buy Now</button></a>
                                </div>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product Section End -->







@stop