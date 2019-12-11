@extends('core::layouts.admin')


@section('content')

        <!-- Main content -->
<section class="content">

    <a href="{{ url('product/admin/products') }}" class="btn btn-primary">
        <i class="fa fa-backward"></i> Back
    </a>
    <br/><br/>


    @include('flash::message')



    <div class="nav-tabs-custom">

        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab">Info</a></li>
            <li><a href="#tab_2" data-toggle="tab">Data</a></li>
            <li><a href="#tab_3" data-toggle="tab">Specification</a></li>
            <li><a href="#tab_4" data-toggle="tab">Details</a></li>
            <li><a href="#tab_5" data-toggle="tab">Image</a></li>
            <li><a href="#tab_6" data-toggle="tab">Links</a></li>

            <li class="pull-right">
                {{ Form::open(array('method' => 'delete', 'url' => 'product/admin/products/' . $product->id)) }}
                <a title="Edit" href="{{ url('product/admin/products/' . $product->id .'/edit') }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                <button title="Delete" onclick="return confirm('Are you sure ?')" class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o"></i> Delete</button>
                {{ Form::close() }}
            </li>
        </ul>


        <div class="tab-content">


            <div class="tab-pane active" id="tab_1">

                <table class="table">
                    <tr>
                        <td class="text-bold text-right" width="200"> Title: </td>
                        <td>{{ $product->title }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold text-right"> Description : </td>
                        <td>{!!   $product->description !!}</td>
                    </tr>
                    <tr>
                        <td class="text-bold text-right"> Slug : </td>
                        <td>{{ $product->slug }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold text-right"> Meta Tag : </td>
                        <td>{{ $product->meta_tag }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold text-right"> Meta Description : </td>
                        <td>{{ $product->meta_description }}</td>
                    </tr>

                </table>

            </div>


            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_2">

                <table class="table">

                    <tr>
                        <td class="text-bold text-right" width="200"> ISBN : </td>
                        <td>{{ $product->ISBN }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold text-right"> Model : </td>
                        <td>{{ $product->model }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold text-right"> Product Code : </td>
                        <td>{{ $product->product_code }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold text-right"> Barcode : </td>
                        <td>{{ $product->barcode }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold text-right"> Unite : </td>
                        <td>{{ $product->unite }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold text-right"> Price : </td>
                        <td>{{ $product->price }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold text-right">Cost price : </td>
                        <td>{{ $product->cost_price }}</td>
                    </tr>

                </table>

            </div>



            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_3">

                <table class="table">
                    @if($product->specifications)
                        @foreach($product->specifications as $key => $specification)
                            <tr>
                                <td class="text-bold text-right" width="200"> {{ $specification->attribute->title }} : </td>
                                <td>{{ $specification->value }}</td>
                            </tr>
                        @endforeach
                    @endif
                </table>

            </div>



            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_4">

                <table class="table">

                    @foreach($productDetails as $key => $productDetail)
                        <tr>
                            <td class="text-bold text-right" width="200"> {{ $key }} : </td>
                            <td>{{ $productDetail }}</td>
                        </tr>
                    @endforeach
                </table>

            </div>




            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_5">

                <table class="table">

                    <table class="table">

                        <tr>
                            <td class="text-bold text-right" width="200"> Thumbnail : </td>
                            <td>
                                @if(!empty($product->thumbnail))
                                    <img width="200" src="{{ url("$product->thumbnail") }}" alt="{{ $product->title }}">
                                @endif
                            </td>
                        </tr>

                    </table>


                    <h2> Others Images </h2>
                    <table class="table">
                        @foreach($product->images as $image)
                            @if(!empty($image->thumbnail))
                            <tr>
                                <td class="text-bold text-right" width="200"> Thumbnail : </td>
                                <td>
                                    <img width="200" src="{{ url($image->thumbnail) }}" alt="{{ $image->thumbnail }}">
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    </table>

                </table>

            </div>


            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_6">

                <table class="table">

                    <table class="table">

                        <tr>
                            <td class="text-bold text-right" width="200"> Brand : </td>
                            <td> {{ $product->brand->title }} </td>
                        </tr>
                        <tr>
                            <td class="text-bold text-right" width="200"> Supplier : </td>
                            <td> {{ $product->supplier->first_name . ' ' . $product->supplier->last_name }} </td>
                        </tr>
                        <tr>
                            <td class="text-bold text-right" width="200"> Categories : </td>
                            <td>
                                <ul type="square">
                                    @foreach($product->categories as $category)
                                       <li>{{ $category->title }} </li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>

                </table>

            </div>


        </div>


    </div>



</section>
<!-- /.content -->
@stop