@extends('core::layouts.ng-admin')


@section('head_css')
{!! Html::style('assets/admin_assets/plugins/select2/select2.min.css') !!}
@endsection


@section('content')
        <!-- Main content -->
<section class="content">

    <span ng-init="url='{{ url('/') }}'"></span>
    <span ng-init="title='{{ $product->title }}'"></span>
    <span ng-init="slug='{{ $product->slug }}'"></span>
    <span ng-init="productSpecifications('{{ $product->id }}')"></span>

    <a href="{{ url('product/admin/products') }}" class="btn btn-primary">
        <i class="fa fa-backward"></i> Back
    </a>
    <br/><br/>
    <!-- Default box -->
    @if($mode == 'edit')
        {!! Form::model($product, ['method'=>'PUT', 'url' => 'product/admin/products/' . $product->id, 'role'=>'form', 'files'=>true]) !!}
    @else
        {!! Form::open(['method'=>'POST', 'url' => 'product/admin/products', 'role'=>'form', 'files'=>true]) !!}
    @endif


    {!! Form::token() !!}


    <div class="row clearfix">
        <div class="col-md-9">


            <div class="nav-tabs-custom">

                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">General</a></li>
                    <li><a href="#tab_2" data-toggle="tab">Data</a></li>
                    <li><a href="#tab_3" data-toggle="tab">Specification</a></li>
                    <li><a href="#tab_4" data-toggle="tab">Attribute</a></li>
                    <li><a href="#tab_5" data-toggle="tab">Images</a></li>

                    <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                </ul>


                <div class="tab-content">


                    <div class="tab-pane active" id="tab_1">

                        <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                            {!! Form::label('title', 'Title: ', ['class'=>'control-label']) !!}
                            <span class="text-danger"> <i class="fa fa-star"></i> </span>
                            {!! Form::text('title', NULL, ['class'=> 'form-control', 'placeholder'=>'Title', 'ng-model'=>'title', 'ng-change' => 'getSlug()', 'required']) !!}
                            @if ($errors->has('title'))
                                <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                            {!! Form::label('description', 'Description: ', ['class'=>'control-label']) !!}
                            <span class="text-danger"> <i class="fa fa-star"></i> </span>
                            {!! Form::textarea('description', NULL, ['class'=> 'form-control', 'id'=>'my-editor', 'placeholder'=>'Description']) !!}
                            @if ($errors->has('description'))
                                <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('slug') ? ' has-error' : '' }}">
                            {!! Form::label('slug', 'Slug: ', ['class'=>'control-label']) !!}
                            <span class="text-danger"> <i class="fa fa-star"></i> </span>
                            {!! Form::text('slug', NULL, ['class'=> 'form-control', 'ng-model'=>'slug', 'placeholder'=>'Slug']) !!}
                            @if ($errors->has('slug'))
                                <span class="help-block">
                                <strong>{{ $errors->first('slug') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('meta_tag') ? ' has-error' : '' }}">
                            {!! Form::label('meta_tag', 'Meta Tag: ', ['class'=>'control-label']) !!}
                            {!! Form::text('meta_tag', NULL, ['class'=> 'form-control', 'placeholder'=>'Meta Tag']) !!}
                            @if ($errors->has('meta_tag'))
                                <span class="help-block">
                                <strong>{{ $errors->first('meta_tag') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('meta_description') ? ' has-error' : '' }}">
                            {!! Form::label('meta_description', 'Meta description: ', ['class'=>'control-label']) !!}
                            {!! Form::text('meta_description', NULL, ['class'=> 'form-control', 'placeholder'=>'Meta Description']) !!}
                            @if ($errors->has('meta_description'))
                                <span class="help-block">
                                <strong>{{ $errors->first('meta_description') }}</strong>
                            </span>
                            @endif
                        </div>

                    </div>



                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                        <div class="form-group {{ $errors->has('ISBN') ? ' has-error' : '' }}">
                            {!! Form::label('ISBN', 'ISBN: ', ['class'=>'control-label']) !!}
                            {!! Form::text('ISBN', NULL, ['class'=> 'form-control', 'placeholder'=>'ISBN']) !!}
                            @if ($errors->has('ISBN'))
                                <span class="help-block">
                                <strong>{{ $errors->first('ISBN') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('model') ? ' has-error' : '' }}">
                            {!! Form::label('model', 'Model: ', ['class'=>'control-label']) !!}
                            {!! Form::text('model', NULL, ['class'=> 'form-control', 'placeholder'=>'Model']) !!}
                            @if ($errors->has('model'))
                                <span class="help-block">
                                <strong>{{ $errors->first('model') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('product_code') ? ' has-error' : '' }}">
                            {!! Form::label('product_code', 'Product code: ', ['class'=>'control-label']) !!}
                            <span class="text-danger"> <i class="fa fa-star"></i> </span>
                            {!! Form::text('product_code', NULL, ['class'=> 'form-control', 'placeholder'=>'Product code', 'required']) !!}
                            @if ($errors->has('product_code'))
                                <span class="help-block">
                                <strong>{{ $errors->first('product_code') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('barcode') ? ' has-error' : '' }}">
                            {!! Form::label('barcode', 'Barcode: ', ['class'=>'control-label']) !!}
                            {!! Form::text('barcode', NULL, ['class'=> 'form-control', 'placeholder'=>'Barcode']) !!}
                            @if ($errors->has('barcode'))
                                <span class="help-block">
                                <strong>{{ $errors->first('barcode') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('unite') ? ' has-error' : '' }}">
                            {!! Form::label('unite', 'Unite: ', ['class'=>'control-label']) !!}
                            {!! Form::text('unite', NULL, ['class'=> 'form-control', 'placeholder'=>'Unite']) !!}
                            @if ($errors->has('unite'))
                                <span class="help-block">
                                <strong>{{ $errors->first('unite') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('price') ? ' has-error' : '' }}">
                            {!! Form::label('price', 'Price: ', ['class'=>'control-label']) !!}
                            <span class="text-danger"> <i class="fa fa-star"></i> </span>
                            {!! Form::text('price', NULL, ['class'=> 'form-control', 'placeholder'=>'Price', 'required']) !!}
                            @if ($errors->has('price'))
                                <span class="help-block">
                                <strong>{{ $errors->first('price') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('cost_price') ? ' has-error' : '' }}">
                            {!! Form::label('cost_price', 'Cost price: ', ['class'=>'control-label']) !!}
                            {!! Form::text('cost_price', NULL, ['class'=> 'form-control', 'placeholder'=>'Cost price']) !!}
                            @if ($errors->has('cost_price'))
                                <span class="help-block">
                                <strong>{{ $errors->first('cost_price') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>



                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_3">

                        <div class="form-group {{ $errors->has('group') ? ' has-error' : '' }}">
                            {!! Form::label('group', 'Specification Group: ', ['class'=>'control-label']) !!}
                            {!! Form::select('group', $groups, NULL, ['class'=> 'form-control', 'ng-model'=>'specificationGroup', 'ng-change'=>'getSpecifications()', 'placeholder'=>'<-- Select Group -->']) !!}
                            @if ($errors->has('group'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('group') }}</strong>
                                </span>
                            @endif
                        </div>

                        <h3> Specification </h3>

                        <table class="table table-striped">

                            <tr ng-repeat="sp in specifications">
                                <th class="text-right">
                                    <input type="hidden" name="sp_id[]" value="@{{ sp.id }}"> @{{ sp.title }} :
                                </th>
                                <td>
                                    {!! Form::text('sp_value[]', '@{{ sp.value }}', ['class'=> 'form-control', 'placeholder'=>'Value']) !!}
                                </td>
                            </tr>

                        </table>


                    </div>




                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_4">

                        <table class="table table-striped">
                            <tr>
                                <td>Field</td>
                                <td>Value</td>
                            </tr>

                            @foreach($productDetails as $key => $productDetail)
                                    <tr>
                                        <td>
                                            {!! Form::text('field[]', $key, ['class'=> 'form-control', 'placeholder'=>'Field name']) !!}
                                        </td>
                                        <td>
                                            {!! Form::text('value[]', $productDetail, ['class'=> 'form-control', 'placeholder'=>'Value']) !!}
                                        </td>
                                    </tr>
                            @endforeach

                            <tr ng-repeat="n in [] | range:test">
                                <td>
                                    {!! Form::text('field[]', NULL, ['class'=> 'form-control', 'placeholder'=>'Field name']) !!}
                                </td>
                                <td>
                                    {!! Form::text('value[]', NULL, ['class'=> 'form-control', 'placeholder'=>'Value']) !!}
                                </td>
                            </tr>

                        </table>


                        <a class="btn btn-info" ng-click="increase()"> <i class="fa fa-plus"></i> More </a>


                    </div>



                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_5">


                        <h2> Thumbnail <span class="text-danger"> <i class="fa fa-star"></i> </span> </h2>
                        <div class="thumbnail" style="background-color: #333;">
                            <div class="row clearfix ">
                                <div class="col-md-4 text-right">
                                    @if(isset($product->thumbnail))
                                        <img id="holder" src="{{ url($product->thumbnail) }}" style="max-height:100px;max-width:100px;">
                                    @else
                                        <img id="holder" style="max-height:100px;max-width:100px;">
                                    @endif

                                </div>

                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                                <i class="fa fa-picture-o"></i> Choose
                                            </a>
                                        </span>
                                        @if(isset($product->image))
                                            <input id="thumbnail" class="form-control" required value="{{ $product->image }}" type="text" name="image">
                                        @else
                                            <input id="thumbnail" class="form-control" required type="text" name="image">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>




                        <h2> More Image </h2>

                        <table class="table table-bordered" border="1">
                            <tr>
                                <td>Image</td>
                                <td>Order</td>
                                <td>Location</td>
                            </tr>

                            <?php $i=0; ?>
                            @foreach($product->images as $image)
                                <tr style="background-color: #333;">
                                    <td>
                                        <img id="holder{{ $i }}" src="{{ url($image->image) }}" style="max-height:100px;max-width:100px;">
                                    </td>
                                    <td>
                                        <input type="text" value="{{ $image->sort_order }}" name="sorts[]">
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <a id="lfm{{ $i }}" data-input="thumbnail{{ $i }}" data-preview="holder{{ $i }}" class="btn btn-primary">
                                                    <i class="fa fa-picture-o"></i> Choose
                                                </a>
                                            </span>
                                            <input id="thumbnail{{ $i }}" value="{{ $image->image }}" class="form-control" type="text" name="images[]">
                                        </div>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            @endforeach

                            <?php $l = $i+5; ?>

                            @for($i; $i <= $l; $i++)
                                <tr style="background-color: #333;">
                                    <td>
                                        <img id="holder{{ $i }}" style="max-height:100px;max-width:100px;">
                                    </td>
                                    <td>
                                        <input type="text" value="{{ $i }}" name="sorts[]">
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <a id="lfm{{ $i }}" data-input="thumbnail{{ $i }}" data-preview="holder{{ $i }}" class="btn btn-primary">
                                                    <i class="fa fa-picture-o"></i> Choose
                                                </a>
                                            </span>
                                            <input id="thumbnail{{ $i }}" class="form-control" type="text" name="images[]">
                                        </div>
                                    </td>
                                </tr>
                            @endfor

                        </table>

                        {{--<div class="form-group {{ $errors->has('thumbnail') ? ' has-error' : '' }}">--}}
                            {{--{!! Form::label('thumbnail', 'Meta description: ', ['class'=>'control-label']) !!}--}}
                            {{--{!! Form::file('thumbnail', NULL, ['class'=> 'form-control', 'placeholder'=>'Image']) !!}--}}
                            {{--@if ($errors->has('thumbnail'))--}}
                                {{--<span class="help-block">--}}
                                {{--<strong>{{ $errors->first('thumbnail') }}</strong>--}}
                            {{--</span>--}}
                            {{--@endif--}}
                        {{--</div>--}}

                    </div>



                </div>

                <!-- /.tab-content -->
            </div>

        </div>


        <div class="col-md-3">
            <div class="box box-default">
                <div class="box-body">

                    <div class="form-group {{ $errors->has('categories') ? ' has-error' : '' }}">
                        {!! Form::label('categories', 'Category: ', ['class'=>'control-label']) !!}
                        <span class="text-danger"> <i class="fa fa-star"></i> </span>
                        {!! Form::select('categories[]', $categories, $productCategories, ['class'=> 'form-control select2', 'multiple', 'required', 'placeholder'=>'Select Categories']) !!}
                        @if ($errors->has('categories'))
                            <span class="help-block">
                                <strong>{{ $errors->first('categories') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('supplier_id') ? ' has-error' : '' }}">
                        {!! Form::label('supplier_id', 'Supplier: ', ['class'=>'control-label']) !!}
                        <span class="text-danger"> <i class="fa fa-star"></i> </span>
                        {!! Form::select('supplier_id', $suppliers, NULL, ['class'=> 'form-control select2', 'required', 'placeholder'=>'Supplier']) !!}
                        @if ($errors->has('supplier_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('supplier_id') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('brand_id') ? ' has-error' : '' }}">
                        {!! Form::label('brand_id', 'Brand: ', ['class'=>'control-label']) !!}
                        <span class="text-danger"> <i class="fa fa-star"></i> </span>
                        {!! Form::select('brand_id', $brands, NULL, ['class'=> 'form-control select2', 'required', 'placeholder'=>'Brand']) !!}
                        @if ($errors->has('brand_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('brand_id') }}</strong>
                            </span>
                        @endif
                    </div>

                </div><!-- /.box-body -->


                <div class="box-footer">
                    <div class="form-group clearfix">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary btn-md btn-block']) !!}
                    </div>
                </div><!-- /.box-footer-->


            </div><!-- /.box -->
        </div>

    </div>

    {!! Form::close() !!}

</section>
<!-- /.content -->

@stop


@section('foot_js')

    {!! Html::script('assets/admin_assets/plugins/select2/select2.full.min.js') !!}

    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

    {!! Html::script('/vendor/laravel-filemanager/js/lfm.js') !!}


    <script>
        var url1 = "{{ url('laravel-filemanager') }}";
        $(document).ready(function(){

            $(".select2").select2();

            $('#lfm').filemanager('image', {prefix:url1});
            $('#lfm0').filemanager('image', {prefix:url1});
            $('#lfm1').filemanager('image', {prefix:url1});
            $('#lfm2').filemanager('image', {prefix:url1});
            $('#lfm3').filemanager('image', {prefix:url1});
            $('#lfm4').filemanager('image', {prefix:url1});
            $('#lfm5').filemanager('image', {prefix:url1});
            $('#lfm6').filemanager('image', {prefix:url1});
            $('#lfm7').filemanager('image', {prefix:url1});
            $('#lfm8').filemanager('image', {prefix:url1});
            $('#lfm9').filemanager('image', {prefix:url1});
            $('#lfm10').filemanager('image', {prefix:url1});
        });

        var url = "{{ url('/') }}";
        var options = {
            filebrowserImageBrowseUrl: url + '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: url + '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: url + '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: url + '/laravel-filemanager/upload?type=Files&_token='
        };

        CKEDITOR.replace('my-editor', options);
    </script>

    {!! Html::script('/assets/modules/products/product.js') !!}
@stop
