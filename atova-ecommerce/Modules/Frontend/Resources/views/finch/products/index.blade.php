@extends('frontend::' . $info->template . '.layouts.app')



@section('content')


    <span style="height: 60px; display: block"></span>

    <!-- Product Start -->
    <div class="bg_color">
        <div class="container">
            <div class="row">
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

            <div class="row clearfix">
                {{ $products->links() }}
            </div>

        </div>
    </div>
    <!-- product Section End -->







@stop