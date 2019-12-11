@extends('core::layouts.admin')

@section('content')
        <!-- Main content -->
<section class="content">

    <a href="{{ url('bank/admin/accounts') }}" class="btn btn-primary">
        <i class="fa fa-backward"></i> Back
    </a>
    <br/><br/>

    <!-- Default box -->
    @if($mode == 'edit')
        {!! Form::model($account, ['method'=>'PUT', 'url' => 'bank/admin/accounts/' . $account->id, 'role'=>'form', 'files'=>true]) !!}
    @else
        {!! Form::open(['method'=>'POST', 'url' => 'bank/admin/accounts', 'role'=>'form', 'files'=>true]) !!}
    @endif

    <div class="row clearfix">
        <div class="col-md-9">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title"> account Form </h3>
                </div>

                <div class="box-body">
                    {!! Form::token() !!}

                    <div class="form-group {{ $errors->has('bank_name') ? ' has-error' : '' }}">
                        {!! Form::label('bank_name', 'Bank name: ', ['class'=>'control-label']) !!}
                        {!! Form::text('bank_name', NULL, ['class'=> 'form-control', 'placeholder'=>'Bank name']) !!}
                        @if ($errors->has('bank_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('bank_name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('branch') ? ' has-error' : '' }}">
                        {!! Form::label('branch', 'Branch: ', ['class'=>'control-label']) !!}
                        {!! Form::text('branch', NULL, ['class'=> 'form-control', 'placeholder'=>'Branch']) !!}
                        @if ($errors->has('branch'))
                            <span class="help-block">
                                <strong>{{ $errors->first('branch') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('account_no') ? ' has-error' : '' }}">
                        {!! Form::label('account_no', 'Account no: ', ['class'=>'control-label']) !!}
                        {!! Form::text('account_no', NULL, ['class'=> 'form-control', 'placeholder'=>'Account no']) !!}
                        @if ($errors->has('account_no'))
                            <span class="help-block">
                                <strong>{{ $errors->first('account_no') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('account_type') ? ' has-error' : '' }}">
                        {!! Form::label('account_type', 'Account type: ', ['class'=>'control-label']) !!}
                        {!! Form::text('account_type', NULL, ['class'=> 'form-control', 'placeholder'=>'Account type']) !!}
                        @if ($errors->has('account_type'))
                            <span class="help-block">
                                <strong>{{ $errors->first('account_type') }}</strong>
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

                    {{--<div class="form-group {{ $errors->has('balance') ? ' has-error' : '' }}">--}}
                        {{--{!! Form::label('balance', 'Balance: ', ['class'=>'control-label']) !!}--}}
                        {{--{!! Form::text('balance', NULL, ['class'=> 'form-control', 'placeholder'=>'Balance']) !!}--}}
                        {{--@if ($errors->has('balance'))--}}
                            {{--<span class="help-block">--}}
                                {{--<strong>{{ $errors->first('balance') }}</strong>--}}
                            {{--</span>--}}
                        {{--@endif--}}
                    {{--</div>--}}

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
