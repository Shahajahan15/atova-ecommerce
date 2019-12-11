@extends('core::layouts.admin')

@section('head_css')
{!! Html::style('assets/admin_assets/plugins/datepicker/datepicker3.css') !!}
{!! Html::style('assets/admin_assets/plugins/select2/select2.min.css') !!}
@endsection


@section('content')
        <!-- Main content -->
<section class="content">

    <a href="{{ url('expenditure/admin/expenses') }}" class="btn btn-primary">
        <i class="fa fa-backward"></i> Back
    </a>
    <br/><br/>

    <!-- Default box -->
    @if($mode == 'edit')
        {!! Form::model($expense, ['method'=>'PUT', 'url' => 'expenditure/admin/expenses/' . $expense->id, 'role'=>'form', 'files'=>true]) !!}
    @else
        {!! Form::open(['method'=>'POST', 'url' => 'expenditure/admin/expenses', 'role'=>'form', 'files'=>true]) !!}
    @endif

    <div class="row clearfix">
        <div class="col-md-9">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title"> expense Form </h3>
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


                    <div class="form-group {{ $errors->has('employees_id') ? ' has-error' : '' }}">
                        {!! Form::label('employees_id', 'Employee: ', ['class'=>'control-label']) !!}
                        {!! Form::select('employees_id', $employees, NULL, ['class'=> 'form-control select2', 'placeholder'=>'<-- Select Employee -->']) !!}
                        @if ($errors->has('employees_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('employees_id') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group {{ $errors->has('recipient_id') ? ' has-error' : '' }}">
                        {!! Form::label('recipient_id', 'Recipient: ', ['class'=>'control-label']) !!}
                        {!! Form::select('recipient_id', $users, NULL, ['class'=> 'form-control select2', 'placeholder'=>'<-- Select Recipient -->']) !!}
                        @if ($errors->has('recipient_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('recipient_id') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group {{ $errors->has('expense_category_id') ? ' has-error' : '' }}">
                        {!! Form::label('expense_category_id', 'Category: ', ['class'=>'control-label']) !!}
                        {!! Form::select('expense_category_id', $categories, NULL, ['class'=> 'form-control', 'placeholder'=>'<-- Select Category -->']) !!}
                        @if ($errors->has('expense_category_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('expense_category_id') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('reason') ? ' has-error' : '' }}">
                        {!! Form::label('reason', 'Payment reason: ', ['class'=>'control-label']) !!}
                        {!! Form::text('reason', NULL, ['class'=> 'form-control', 'placeholder'=>'expense reason']) !!}
                        @if ($errors->has('reason'))
                            <span class="help-block">
                                <strong>{{ $errors->first('reason') }}</strong>
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

                    <div class="form-group {{ $errors->has('payment_methods_id') ? ' has-error' : '' }}">
                        {!! Form::label('payment_methods_id', 'Payment Methods: ', ['class'=>'control-label']) !!}
                        {!! Form::select('payment_methods_id', $methods, NULL, ['class'=> 'form-control', 'placeholder'=>'<-- Payment Method -->']) !!}
                        @if ($errors->has('payment_methods_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('payment_methods_id') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group {{ $errors->has('transaction_number') ? ' has-error' : '' }}">
                        {!! Form::label('transaction_number', 'Transaction number: ', ['class'=>'control-label']) !!}
                        {!! Form::text('transaction_number', NULL, ['class'=> 'form-control', 'placeholder'=>'Transaction number']) !!}
                        @if ($errors->has('transaction_number'))
                            <span class="help-block">
                                <strong>{{ $errors->first('transaction_number') }}</strong>
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
