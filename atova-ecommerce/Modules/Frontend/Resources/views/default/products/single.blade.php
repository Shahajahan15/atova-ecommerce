@extends('frontend::' . $info->template . '.layouts.app')



@section('content')


    <div class="container">
        <div class="card">
            <div class="container-fliud">
                <div class="wrapper row">
                    <div class="preview col-md-6">

                        <div class="tab-content">
                            <div class="tab-pane active" id="pic-1"><img src="{{ url($product->image) }}" /></div>
                            <?php $i = 2; ?>
                            @foreach($product->images as $image)
                                <div class="tab-pane" id="pic-{{ $i++ }}"><img src="{{ url($image->image) }}" /></div>
                            @endforeach
                        </div>
                        <ul class="preview-thumbnail nav nav-tabs">
                            <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="{{ url($product->thumbnail) }}" /></a></li>
                            <?php $j = 2; ?>
                            @foreach($product->images as $image)
                                <li><a data-target="#pic-{{ $j++ }}" data-toggle="tab"><img src="{{ url($image->thumbnail) }}" /></a></li>
                            @endforeach
                        </ul>

                    </div>
                    <div class="details col-md-6">
                        <h3 class="product-title">{{ $product->title }}</h3>

                        {{--
                        <div class="rating">
                            <div class="stars">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <span class="review-no">41 reviews</span>
                        </div>
                        --}}

                        <h4 class="price">current price: <span>{{ $product->price }}<span class="taka">৳</span></span></h4>
                        <h4 class="price">Product Code: {{ $product->product_code }}</h4>
                        <p class="product-description"> {!!  $product->description !!}  </p>
                        <p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>
                        <h5 class="sizes">Sizes:
                            <span class="size" data-toggle="tooltip" title="small">s</span>
                            <span class="size" data-toggle="tooltip" title="medium">m</span>
                            <span class="size" data-toggle="tooltip" title="large">l</span>
                            <span class="size" data-toggle="tooltip" title="xtra large">xl</span>
                        </h5>
                        <h5 class="colors">colors:
                            <span class="color orange not-available" data-toggle="tooltip" title="Not In store"></span>
                            <span class="color green"></span>
                            <span class="color blue"></span>
                        </h5>
                        <div class="action">
                            <button class="add-to-cart btn btn-default" type="button">add to cart</button>
                            <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@stop


