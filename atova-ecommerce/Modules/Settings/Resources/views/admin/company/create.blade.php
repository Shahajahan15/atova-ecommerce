@extends('core::layouts.admin')

@section('head_css')
    {!! Html::style('assets/admin_assets/plugins/datepicker/datepicker3.css') !!}
@endsection


@section('content')
        <!-- Main content -->
<section class="content">

    <a href="{{ url('settings/admin/company-info') }}" class="btn btn-primary">
        <i class="fa fa-backward"></i> Back
    </a>
    <br/><br/>


        {!! Form::model($company, ['method'=>'PUT', 'url' => 'settings/admin/company-info/edit', 'role'=>'form', 'files'=>true]) !!}

    <div class="row clearfix">
        <div class="col-md-9">
            <div class="box box-default">
                <div class="box-header with-border">
                    {{--<h3 class="box-title"> New Posts </h3>--}}
                </div>

                <div class="box-body">
                    {!! Form::token() !!}

                    <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                        {!! Form::label('title', 'Title: ', ['class'=>'control-label']) !!}
                        {!! Form::text('title', NULL, ['class'=> 'form-control', 'placeholder'=>'Title']) !!}
                        @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        {!! Form::label('email', 'Email: ', ['class'=>'control-label']) !!}
                        {!! Form::text('email', NULL, ['class'=> 'form-control', 'placeholder'=>'Email']) !!}
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('mobile') ? ' has-error' : '' }}">
                        {!! Form::label('mobile', 'Mobile: ', ['class'=>'control-label']) !!}
                        {!! Form::text('mobile', NULL, ['class'=> 'form-control', 'placeholder'=>'Mobile']) !!}
                        @if ($errors->has('mobile'))
                            <span class="help-block">
                                <strong>{{ $errors->first('mobile') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('fax') ? ' has-error' : '' }}">
                        {!! Form::label('fax', 'Fax: ', ['class'=>'control-label']) !!}
                        {!! Form::text('fax', NULL, ['class'=> 'form-control', 'placeholder'=>'Fax']) !!}
                        @if ($errors->has('fax'))
                            <span class="help-block">
                                <strong>{{ $errors->first('fax') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                        {!! Form::label('address', 'Address: ', ['class'=>'control-label']) !!}
                        {!! Form::text('address', NULL, ['class'=> 'form-control', 'placeholder'=>'Address']) !!}
                        @if ($errors->has('address'))
                            <span class="help-block">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('logo') ? ' has-error' : '' }}">
                        <div class="row clearfix ">

                            <div class="col-md-12">
                                <div class="input-group">
                                        <span class="input-group-btn">
                                            <a id="lfm" data-input="logo" data-preview="holder" class="btn btn-primary">
                                                <i class="fa fa-picture-o"></i> Choose
                                            </a>
                                        </span>
                                    @if(isset($company->logo))
                                        <input id="logo" class="form-control" required value="{{ $company->logo }}" type="text" name="logo">
                                    @else
                                        <input id="logo" class="form-control" required type="text" name="logo">
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12">
                                @if(isset($company->logo))
                                    <img id="holder" src="{{ url($company->logo) }}" style="max-height:100px;max-width:100px;">
                                @else
                                    <img id="holder" style="max-height:100px;max-width:100px;">
                                @endif

                            </div>

                        </div>
                    </div>

                </div><!-- /.box-body -->

                <div class="box-footer">
                    {{--<div class="form-group clearfix">--}}
                    {{--{!! Form::submit('Save', ['class' => 'btn btn-primary btn-md pull-right']) !!}--}}
                    {{--</div>--}}
                </div><!-- /.box-footer-->

            </div><!-- /.box -->
        </div>


        <div class="col-md-3">

            <div class="box box-default">
                <div class="box-body">



                    <div class="form-group {{ $errors->has('post_code') ? ' has-error' : '' }}">
                        {!! Form::label('post_code', 'Post code: ', ['class'=>'control-label']) !!}
                        {!! Form::text('post_code', NULL, ['class'=> 'form-control', 'placeholder'=>'Post code']) !!}
                        @if ($errors->has('post_code'))
                            <span class="help-block">
                                <strong>{{ $errors->first('post_code') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group {{ $errors->has('city') ? ' has-error' : '' }}">
                        {!! Form::label('city', 'City : ', ['class'=>'control-label']) !!}
                        {!! Form::text('city', NULL, ['class'=> 'form-control', 'placeholder'=>'City']) !!}
                        @if ($errors->has('city'))
                            <span class="help-block">
                                <strong>{{ $errors->first('city') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group {{ $errors->has('state') ? ' has-error' : '' }}">
                        {!! Form::label('state', 'State: ', ['class'=>'control-label']) !!}
                        {!! Form::text('state', NULL, ['class'=> 'form-control', 'placeholder'=>'State']) !!}
                        @if ($errors->has('state'))
                            <span class="help-block">
                                <strong>{{ $errors->first('state') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group {{ $errors->has('country') ? ' has-error' : '' }}">
                        {!! Form::label('country', 'Country: ', ['class'=>'control-label']) !!}
                        {!! Form::text('country', NULL, ['class'=> 'form-control', 'placeholder'=>'Country']) !!}
                        @if ($errors->has('country'))
                            <span class="help-block">
                                <strong>{{ $errors->first('country') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group {{ $errors->has('currency') ? ' has-error' : '' }}">
                        {!! Form::label('currency', 'Currency: ', ['class'=>'control-label']) !!}
                        {!! Form::text('currency', NULL, ['class'=> 'form-control', 'placeholder'=>'Currency']) !!}
                        @if ($errors->has('currency'))
                            <span class="help-block">
                                <strong>{{ $errors->first('currency') }}</strong>
                            </span>
                        @endif
                    </div>

                </div><!-- /.box-body -->

                <div class="box-footer">
                    <div class="form-group clearfix">
                        {!! Form::submit('Next', ['class' => 'btn btn-primary btn-md btn-block']) !!}
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
    {!! Html::script('/vendor/laravel-filemanager/js/lfm.js') !!}
    <script>
        var url = "{{ url('laravel-filemanager') }}";
        $(document).ready(function(){
            $('#lfm').filemanager('image', {prefix:url});
        });
    </script>
@endsection