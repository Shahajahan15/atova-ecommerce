@extends('core::layouts.ng-admin')


@section('head_css')
    {!! Html::style('assets/admin_assets/plugins/select2/select2.min.css') !!}
@endsection



@section('content')
        <!-- Main content -->
<section class="content">

    <a href="{{ url('receiving/admin/invoices') }}" class="btn btn-primary">
        <i class="fa fa-backward"></i> Back
    </a>
    <br/><br/>

    <!-- Default box -->
    @if($mode == 'edit')
        {!! Form::model($invoice, ['method'=>'PUT', 'url' => 'receiving/admin/invoices/' . $invoice->id, 'role'=>'form', 'files'=>true]) !!}
    @else
        {!! Form::open(['method'=>'POST', 'url' => 'receiving/admin/invoices', 'role'=>'form', 'files'=>true]) !!}
    @endif

    <div class="row clearfix">
        <div class="col-md-9">
            <div class="box box-default">
                <div class="box-header with-border">
                    {{--<h3 class="box-title"> New Posts </h3>--}}
                </div>

                <div class="box-body">
                    {!! Form::token() !!}

                    <span ng-init="type='{{ old('type') }}'"></span>

                    <div class="form-group {{ $errors->has('type') ? ' has-error' : '' }}">
                        {!! Form::label('type', 'Type: ', ['class'=>'control-label']) !!}
                        {!! Form::select('type', $types, NULL, ['class'=> 'form-control', 'ng-model'=>'type', 'placeholder'=>'<-- Select Type -->']) !!}
                        @if ($errors->has('type'))
                            <span class="help-block">
                                <strong>{{ $errors->first('type') }}</strong>
                            </span>
                        @endif
                    </div>


                    <span ng-show="type=='transfer'">
                        <div class="form-group {{ $errors->has('employee_id') ? ' has-error' : '' }}">
                            {!! Form::label('employee_id', 'Employee: ', ['class'=>'control-label']) !!}
                            {!! Form::select('employee_id', $employees, NULL, ['class'=> 'form-control', 'placeholder'=>'<-- Select Employee -->']) !!}
                            @if ($errors->has('employee_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('employee_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </span>

                    <span ng-show="type=='purchase'">
                        <div class="form-group {{ $errors->has('supplier_id') ? ' has-error' : '' }}">
                            {!! Form::label('supplier_id', 'Supplier: ', ['class'=>'control-label']) !!}
                            {!! Form::select('supplier_id', $suppliers, NULL, ['class'=> 'form-control', 'placeholder'=>'<-- Select Supplier -->']) !!}
                            @if ($errors->has('supplier_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('supplier_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </span>

                    <span ng-show="type=='return'">
                        <div class="form-group {{ $errors->has('customer_id') ? ' has-error' : '' }}">
                            {!! Form::label('customer_id', 'Customer: ', ['class'=>'control-label']) !!}
                            {!! Form::select('customer_id', $customers, NULL, ['class'=> 'form-control', 'placeholder'=>'<-- Select Customer -->']) !!}
                            @if ($errors->has('customer_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('customer_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </span>


                    <div class="form-group {{ $errors->has('challan_no') ? ' has-error' : '' }}">
                        {!! Form::label('challan_no', 'Challan no: ', ['class'=>'control-label']) !!}
                        {!! Form::text('challan_no', NULL, ['class'=> 'form-control', 'placeholder'=>'Challan no']) !!}
                        @if ($errors->has('challan_no'))
                            <span class="help-block">
                                <strong>{{ $errors->first('challan_no') }}</strong>
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
    {!! Html::script('assets/modules/receiving/new_invoice.js') !!}
    {!! Html::script('assets/admin_assets/plugins/select2/select2.full.min.js') !!}

    <script>
        $(function () {
            $(".select2").select2();
        });
    </script>
@endsection