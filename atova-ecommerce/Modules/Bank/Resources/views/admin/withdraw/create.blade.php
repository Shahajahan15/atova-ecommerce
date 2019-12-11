@extends('core::layouts.admin')

@section('head_css')
{!! Html::style('assets/admin_assets/plugins/datepicker/datepicker3.css') !!}
{!! Html::style('assets/admin_assets/plugins/select2/select2.min.css') !!}
@endsection


@section('content')
        <!-- Main content -->
<section class="content">

    <a href="{{ url('bank/admin/withdraws') }}" class="btn btn-primary">
        <i class="fa fa-backward"></i> Back
    </a>
    <br/><br/>

    <!-- Default box -->
    @if($mode == 'edit')
        {!! Form::model($withdraw, ['method'=>'PUT', 'url' => 'bank/admin/withdraws/' . $withdraw->id, 'role'=>'form', 'files'=>true]) !!}
    @else
        {!! Form::open(['method'=>'POST', 'url' => 'bank/admin/withdraws', 'role'=>'form', 'files'=>true]) !!}
    @endif

    <div class="row clearfix">
        <div class="col-md-9">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title"> Withdraw Form </h3>
                </div>

                <div class="box-body">
                    {!! Form::token() !!}

                    <div class="form-group {{ $errors->has('date') ? ' has-error' : '' }}">
                        {!! Form::label('date', 'Date: ', ['class'=>'control-label']) !!}
                        {!! Form::text('date', NULL, ['class'=> 'form-control datepicker', 'placeholder'=>'Date']) !!}
                        @if ($errors->has('date'))
                            <span class="help-block">
                                <strong>{{ $errors->first('date') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group {{ $errors->has('account_id') ? ' has-error' : '' }}">
                        {!! Form::label('account_id', 'Bank Account: ', ['class'=>'control-label']) !!}
                        {!! Form::select('account_id', $banks, NULL, ['class'=> 'form-control select2', 'placeholder'=>'<-- Select Bank -->']) !!}
                        @if ($errors->has('account_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('account_id') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group {{ $errors->has('employees_id') ? ' has-error' : '' }}">
                        {!! Form::label('employees_id', 'Employee: ', ['class'=>'control-label']) !!}
                        {!! Form::select('employees_id', $employees, NULL, ['class'=> 'form-control select2', 'placeholder'=>'<-- Select Employee -->']) !!}
                        @if ($errors->has('employees_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('employees_id') }}</strong>
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

                    <div class="form-group {{ $errors->has('amount') ? ' has-error' : '' }}">
                        {!! Form::label('amount', 'Amount: ', ['class'=>'control-label']) !!}
                        {!! Form::text('amount', NULL, ['class'=> 'form-control', 'placeholder'=>'Amount']) !!}
                        @if ($errors->has('amount'))
                            <span class="help-block">
                                <strong>{{ $errors->first('amount') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('transaction_reason_id') ? ' has-error' : '' }}">
                        {!! Form::label('transaction_reason_id', 'Payment Methods: ', ['class'=>'control-label']) !!}
                        {!! Form::select('transaction_reason_id', $purposes, NULL, ['class'=> 'form-control', 'placeholder'=>'<-- Payment Purpose -->']) !!}
                        @if ($errors->has('transaction_reason_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('transaction_reason_id') }}</strong>
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
    {!! Html::script('assets/admin_assets/plugins/select2/select2.full.min.js') !!}
    <script>
        $(function () {
            $(".select2").select2();
            //Date picker
            $('.datepicker').datepicker({
                autoclose: true,
                format:'yyyy-mm-dd'
            });

        });
    </script>
@endsection
