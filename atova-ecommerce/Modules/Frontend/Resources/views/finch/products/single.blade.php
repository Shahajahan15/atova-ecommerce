@extends('frontend::' . $info->template . '.layouts.app')


@section('head_css')

    {{ Html::style('assets/frontend/finch/css/smoothproducts.css') }}

@stop



@section('content')






    <!--product breabcamp-- and filtering-->

    <div class="singlepage_breabcamp">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="sp_breap">
                        <h5>All Products > Women > Cloth </h5>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--End of product breabcamp-- and filtering -->



    <!-- product Start -->
    <div class="bg_color">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="sp-wrap">
                        <a href="{{ url($product->image) }}"><img src="{{ url($product->image) }}" class="img-responsive" alt=""></a>
                        @foreach($product->images as $image)
                        <a href="{{ url($image->image) }}"><img src="{{ url($image->image) }}" class="img-responsive" alt=""></a>
                        @endforeach

                    </div>

                </div>

                <div class="col-md-7">
                    <div class="product_info">
                        <h4>{{ $product->title }}</h4>
                        <div class="my-rating jq-stars"><p>(0 reviews)</p></div>
                        <div class="single_product_border"></div>
                        <h4>
                            <span class="singleproduct_rate">{{ $product->price }}tk</span>
                            {{--<span class="product_past_rate">220.00tk</span>--}}
                        </h4>
                        <div class="single_product_border"></div>
                        <h6>Quick Overview</h6>
                        <p>{!!  $product->description  !!}</p>
                        <div class="single_product_border"></div>
                        <div class="buynow"><a href=""><button class="btn productbuy">Buy Now</button></a> </div>
                        <div class="single_product_border"></div>
                        <div class="social_share">
                            <h4>Share : </h4>
                            <li><a href=""><img src="{{ url('assets/frontend/finch') }}/img/fb_icon.png" alt=""/></a></li>
                            <li><a href=""><img src="{{ url('assets/frontend/finch') }}/img/google-plus-icon.png" alt=""/></a></li>
                            <li><a href=""><img src="{{ url('assets/frontend/finch') }}/img/t_icon.png" alt=""/></a></li>

                        </div>

                    </div>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row">
                <div class="col-md-5">

                    <div class="singlep">

                        <h5><img src="{{ url('assets/frontend/finch') }}/img/money.png" alt=""/>Pay cash on delivery <a href="#" data-toggle="tooltip" data-placement="bottom" title="With Pay on Delivery, when your order arrives at your doorstep, you can physically review it and then pay cash.
						Be sure to have the exact amount for payment as our delivery men might not carry sufficient change or cash.">?</a>
                        </h5>

                        <h5><img src="{{ url('assets/frontend/finch') }}/img/sevenreturn.png" alt=""/>7 days free return under certain conditions <a href="#" data-toggle="tooltip" data-placement="bottom" title="With Pay on Delivery, when your order arrives at your doorstep, you can physically review it and then pay cash.
						Be sure to have the exact amount for payment as our delivery men might not carry sufficient change or cash.">?</a>
                        </h5>

                        <h5><img src="{{ url('assets/frontend/finch') }}/img/geneius.png" alt=""/>Genuine product</h5>
                    </div>



                </div>

                <div class="col-md-7">
                    <div class="singlep rightsinglep">

                        <h5>Sold by <span class="" style="font-weight:bold;">RM Trade International</span></h5>

                        <h5><span class="" style="font-weight:bold;">Delivery </span><a href="#" data-toggle="tooltip" data-placement="bottom" title="With Pay on Delivery, when your order arrives at your doorstep, you can physically review it and then pay cash.
						Be sure to have the exact amount for payment as our delivery men might not carry sufficient change or cash.">?</a>  Delivery Within: 3 - 10 business days
                        </h5>

                        <h5><span class="" style="font-weight:bold;">Warranty </span><a href="#" data-toggle="tooltip" data-placement="bottom" title="With Pay on Delivery, when your order arrives at your doorstep, you can physically review it and then pay cash.
						Be sure to have the exact amount for payment as our delivery men might not carry sufficient change or cash.">?</a>  1 Year Service Warranty
                        </h5>

                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- product Section End -->






@stop


@section('foot_js')

    {{ Html::script('assets/frontend/finch/js/smoothproducts.min.js') }}

    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

    <script type="text/javascript">
        /* wait for images to load */
        $(window).load(function() {
            $('.sp-wrap').smoothproducts();
        });
    </script>

@stop