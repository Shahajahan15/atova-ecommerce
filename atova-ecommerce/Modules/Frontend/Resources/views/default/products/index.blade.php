@extends('frontend::' . $info->template . '.layouts.app')



@section('content')

    <!-- Product Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row clearfix">

                <div class="col-md-12">
                    <h2> Products </h2>
                </div>

                @foreach($products as $product)

                    <div class="col-sm-4 col-md-3">
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
                    </div>

                @endforeach


            </div>


            <div class="row clearfix center-block text-center">
                {{ $products->links() }}
            </div>

        </div>
    </div>
    <!-- product Section End -->




@stop