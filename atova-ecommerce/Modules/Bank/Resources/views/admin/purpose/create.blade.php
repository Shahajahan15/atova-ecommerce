@extends('core::layouts.admin')

@section('content')
        <!-- Main content -->
<section class="content">

    <a href="{{ url('bank/admin/purposes') }}" class="btn btn-primary">
        <i class="fa fa-backward"></i> Back
    </a>
    <br/><br/>

    <!-- Default box -->
    @if($mode == 'edit')
        {!! Form::model($purpose, ['method'=>'PUT', 'url' => 'bank/admin/purposes/' . $purpose->id, 'role'=>'form', 'files'=>true]) !!}
    @else
        {!! Form::open(['method'=>'POST', 'url' => 'bank/admin/purposes', 'role'=>'form', 'files'=>true]) !!}
    @endif

    <div class="row clearfix">
        <div class="col-md-9">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title"> Purpose Form </h3>
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


                    <div class="form-group {{ $errors->has('note') ? ' has-error' : '' }}">
                        {!! Form::label('note', 'Note: ', ['class'=>'control-label']) !!}
                        {!! Form::textarea('note', NULL, ['class'=> 'form-control', 'placeholder'=>'Note']) !!}
                        @if ($errors->has('note'))
                            <span class="help-block">
                                <strong>{{ $errors->first('note') }}</strong>
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
