@extends('core::layouts.admin')

@section('head_css')
    {!! Html::style('assets/admin_assets/plugins/datepicker/datepicker3.css') !!}
@endsection


@section('content')
        <!-- Main content -->
<section class="content">

    <a href="{{ url('settings/admin/additions') }}" class="btn btn-primary">
        <i class="fa fa-backward"></i> Back
    </a>
    <br/><br/>

    <!-- Default box -->
    @if($mode == 'edit')
        {!! Form::model($addition, ['method'=>'PUT', 'url' => 'settings/admin/additions/' . $addition->id, 'role'=>'form', 'files'=>true]) !!}
    @else
        {!! Form::open(['method'=>'POST', 'url' => 'settings/admin/additions', 'role'=>'form', 'files'=>true]) !!}
    @endif

    <div class="row clearfix">
        <div class="col-md-9">
            <div class="box box-default">
                <div class="box-header with-border">
                    {{--<h3 class="box-title"> New Posts </h3>--}}
                </div>

                <div class="box-body">
                    {!! Form::token() !!}


                    <div class="form-group {{ $errors->has('behavior') ? ' has-error' : '' }}">
                        {!! Form::label('behavior', 'Behavior: ', ['class'=>'control-label']) !!}
                        {!! Form::select('behavior', $behaviors, NULL, ['class'=> 'form-control']) !!}
                        @if ($errors->has('behavior'))
                            <span class="help-block">
                                <strong>{{ $errors->first('behavior') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group {{ $errors->has('coupon_number') ? ' has-error' : '' }}">
                        {!! Form::label('coupon_number', 'Coupon code: ', ['class'=>'control-label']) !!}
                        {!! Form::text('coupon_number', NULL, ['class'=> 'form-control', 'placeholder'=>'Coupon Code']) !!}
                        @if ($errors->has('coupon_number'))
                            <span class="help-block">
                                <strong>{{ $errors->first('coupon_number') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                        {!! Form::label('title', 'Title: ', ['class'=>'control-label']) !!}
                        {!! Form::text('title', NULL, ['class'=> 'form-control', 'placeholder'=>'Title']) !!}
                        @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                        {!! Form::label('description', 'Description: ', ['class'=>'control-label']) !!}
                        {!! Form::textarea('description', NULL, ['class'=> 'form-control', 'placeholder'=>'Description']) !!}
                        @if ($errors->has('description'))
                            <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
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

                    <div class="form-group {{ $errors->has('type') ? ' has-error' : '' }}">
                        {!! Form::label('type', 'Type: ', ['class'=>'control-label']) !!}
                        {!! Form::select('type', $types, NULL, ['class'=> 'form-control', 'placeholder'=>'Select Type']) !!}
                        @if ($errors->has('type'))
                            <span class="help-block">
                                <strong>{{ $errors->first('type') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group {{ $errors->has('value') ? ' has-error' : '' }}">
                        {!! Form::label('value', 'Value: ', ['class'=>'control-label']) !!}
                        {!! Form::text('value', NULL, ['class'=> 'form-control', 'placeholder'=>'Value']) !!}
                        @if ($errors->has('value'))
                            <span class="help-block">
                                <strong>{{ $errors->first('value') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group {{ $errors->has('start_date') ? ' has-error' : '' }}">
                        {!! Form::label('start_date', 'Start date: ', ['class'=>'control-label']) !!}
                        {!! Form::text('start_date', NULL, ['class'=> 'form-control datepicker', 'placeholder'=>'start_date']) !!}
                        @if ($errors->has('start_date'))
                            <span class="help-block">
                                <strong>{{ $errors->first('start_date') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group {{ $errors->has('end_date') ? ' has-error' : '' }}">
                        {!! Form::label('end_date', 'End date: ', ['class'=>'control-label']) !!}
                        {!! Form::text('end_date', NULL, ['class'=> 'form-control datepicker', 'placeholder'=>'End date']) !!}
                        @if ($errors->has('end_date'))
                            <span class="help-block">
                                <strong>{{ $errors->first('end_date') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}">
                        {!! Form::label('status', 'Status: ', ['class'=>'control-label']) !!}
                        {!! Form::select('status', $status, NULL, ['class'=> 'form-control']) !!}
                        @if ($errors->has('status'))
                            <span class="help-block">
                                <strong>{{ $errors->first('status') }}</strong>
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
    {!! Html::script('assets/admin_assets/plugins/datepicker/bootstrap-datepicker.js') !!}
    <script>
        $(function () {
            //Date picker
            $('.datepicker').datepicker({
                autoclose: true,
                format:'yyyy-mm-dd'
            });

        });
    </script>
@endsection