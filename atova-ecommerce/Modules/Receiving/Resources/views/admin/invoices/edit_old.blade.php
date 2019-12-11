@extends('core::layouts.ng-admin')


@section('head_css')
{!! Html::style('assets/common/angucomplete-alt/angucomplete-alt.css') !!}
@endsection



@section('content')
        <!-- Main content -->
<section class="content">

    <span ng-init="url='{{ url('/') }}'"></span>
    <span ng-init="invoiceId='{{ $invoice->id }}'"></span>
    <span ng-init="productList('{{ $invoice->id }}')"></span>

{{--    <span ng-init="additionList('{{ $invoice->id }}')"></span>--}}
{{--    <span ng-init="reductionList('{{ $invoice->id }}')"></span>--}}

    {{--<div angucomplete-alt--}}
         {{--id="ex5"--}}
         {{--placeholder="Search projects"--}}
         {{--pause="100"--}}
         {{--selected-object="selectedProject"--}}
         {{--remote-url="{{ url('/') }}/product/api/products/"--}}
         {{--remote-url-request-formatter="remoteUrlRequestFn"--}}
         {{--remote-url-data-field="products"--}}
         {{--title-field="title"--}}
         {{--description-field="product_code"--}}
         {{--minlength="2"--}}
         {{--input-class="form-control form-control-small"--}}
         {{--selected-object="addSkill"--}}
         {{--match-class="highlight">--}}
    {{--</div>--}}


    {!! Form::open(['method'=>'POST', 'url' => 'receiving/admin/invoices', 'role'=>'form', 'files'=>true]) !!}

    <div class="row clearfix">
        <div class="col-md-8">


            {{-- Add new Item --}}
            <div class="box box-default">
                <div class="box-body">
                    <div angucomplete-alt
                         id="ex5"
                         placeholder="Search Product"
                         pause="100"
                         selected-object="addProduct"
                         remote-url="{{ url('/') }}/product/api/products/"
                         remote-url-request-formatter="remoteUrlRequestFn"
                         remote-url-data-field="products"
                         title-field="title"
                         description-field="product_code"
                         minlength="2"
                         input-class="form-control form-control-small"
                         selected-object="addSkill"
                         match-class="highlight">
                    </div>
                </div>
            </div>




            <div class="box box-default">

                <div class="box-body">

                    <section class="">
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                Employee
                                <address>
                                    <strong> {{ $invoice->employee->user->first_name . ' ' . $invoice->employee->user->last_name }} </strong><br>
                                    {{ $invoice->employee->present_address }}<br>
                                    {{ $invoice->employee->post_code . ', ' . $invoice->employee->city }}<br>
                                    Phone: {{ $invoice->employee->user->mobile }}<br>
                                    Email: {{ $invoice->employee->user->email }}
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                Supplier
                                <address>
                                    <strong>{{ $invoice->supplier->company_name }}</strong><br>
                                    {{ $invoice->supplier->user->first_name . ' ' . $invoice->supplier->user->last_name }}<br>
                                    {{ $invoice->supplier->present_address }} ,
                                    {{ $invoice->supplier->post_code . ', ' . $invoice->supplier->city }}<br>
                                    Phone: {{ $invoice->supplier->user->mobile }}<br>
                                    Email: {{ $invoice->supplier->user->email }}
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <b>Invoice # {{ $invoice->id }} </b><br>
                                <br>
                                <b>Challen No:</b> {{ $invoice->challan_no }}<br>
                                <b>Date:</b> {{ $invoice->date }}<br>
                                <b> Invoice Type : </b> {{ $invoice->type }}
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">

                        </div>

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-xs-12 table-responsive">

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Title</th>
                                            <th>Serial #</th>
                                            <th class="text-right">Price</th>
                                            <th class="text-right">Qty</th>
                                            <th class="text-right">Free</th>
                                            <th class="text-right">Discount</th>
                                            <th class="text-right">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <tr ng-repeat="item in items">
                                        <td>@{{ $index+1 }}</td>
                                        <td style="min-width: 130px;">@{{ item.title }}</td>
                                        <td style="min-width: 80px;">@{{ item.product_code }}</td>
                                        <td><input class="form-control text-right invoice-text" type="text" ng-model="items[$index].price" ng-change="updateProduct($index)"></td>
                                        <td><input class="form-control text-right invoice-text" type="text" ng-model="items[$index].quantity" ng-change="updateProduct($index)"></td>
                                        <td><input class="form-control text-right invoice-text" type="text" ng-model="items[$index].free" ng-change="updateProduct($index)"></td>
                                        <td><input class="form-control text-right invoice-text" type="text" ng-model="items[$index].discount" ng-change="updateProduct($index)"></td>
                                        <td class="text-right">
                                            @{{ (items[$index].price * items[$index].quantity) - items[$index].discount | number : 2 }}
                                        </td>
                                        <td>
                                            <button type="button" ng-click="deleteProduct(item.id, $index)" class="btn btn-default btn-xs"> <i class="fa fa-close"></i> </button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="2">

                                            {{--<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal">--}}
                                                {{--<i class="fa fa-plus"></i> New Item--}}
                                            {{--</button>--}}
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <!-- Note of Invoice -->
                            <div class="col-xs-4">
                                <p class="lead">Note:</p>
                                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                    {{ $invoice->note }}
                                </p>
                            </div>


                            <!-- accepted payments column -->
                            <div class="col-xs-4">


                                {{-- Additions --}}
                                <p class="lead"> Additions: </p>
                                <div class="well well-sm">
                                    <table class="table table-bordered" border="1">
                                        <tbody>
                                        <tr ng-repeat="addition in additions">
                                            <th style="min-width: 120px;"> @{{ addition.title }} @{{(addition.type=='percentage') ? '('+addition.amount+'%)' : ''}} </th>
                                            <td class="text-right">@{{(addition.type=='percentage') ? (subTotal*addition.amount)/100 : addition.amount}}</td>
                                            <td><button type="button" ng-click="additionDelete(addition.id, $index)" class="btn btn-default btn-xs"> <i class="fa fa-close"></i> </button>
                                        </tr>

                                        <tr>
                                            <td>
                                                {!! Form::select('title', $addRedClass, NULL, ['class'=> 'form-control input-sm input-invoice', 'ng-model'=>'additionId','ng-change'=>'changeAddition()', 'placeholder'=>'Class']) !!}
                                            </td>
                                            <td>
                                                {!! Form::text('amount', NULL, ['class'=> 'form-control input-sm text-right input-invoice', 'ng-model'=>'additionAmount', 'placeholder'=>'Amount']) !!}
                                            </td>
                                            <td><button type="button" ng-click="addAddition()" class="btn btn-default btn-xs"> <i class="fa fa-save"></i></button>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <!-- /.col -->
                            <div class="col-xs-4">

                                {{-- Reductions --}}
                                <p class="lead"> Reductions: </p>
                                <div class="well well-sm">
                                    <table class="table table-bordered" border="1">
                                        <tbody>
                                        <tr ng-repeat="reduction in reductions">
                                            <th style="min-width: 120px;"> @{{ reduction.title }} @{{(reduction.type=='percentage') ? '('+reduction.amount+'%)' : ''}}</th>
                                            <td class="text-right">@{{(reduction.type=='percentage') ? (subTotal*reduction.amount)/100 : reduction.amount}}</td>
                                            <td><button type="button" ng-click="reductionDelete(reduction.id, $index)" class="btn btn-default btn-xs"> <i class="fa fa-close"></i> </button>
                                        </tr>

                                        <tr>
                                            <td>
                                                {!! Form::select('title', $addRedClass, NULL, ['class'=> 'form-control input-sm input-invoice', 'ng-model'=>'reductionId','ng-change'=>'changeReduction()', 'placeholder'=>'Class']) !!}
                                            </td>
                                            <td class="text-right">
                                                {!! Form::text('amount', NULL, ['class'=> 'form-control input-sm text-right input-invoice', 'ng-model'=>'reductionAmount', 'placeholder'=>'Amount']) !!}
                                            </td>
                                            <td><button type="button" ng-click="addReduction()" class="btn btn-default btn-xs"> <i class="fa fa-save"></i></button>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-xs-12">
                                <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                                <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
                                </button>
                                <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
                                    <i class="fa fa-download"></i> Generate PDF
                                </button>
                            </div>
                        </div>
                    </section>





                </div><!-- /.box-body -->

                <div class="box-footer">
                    {{--<div class="form-group clearfix">--}}
                    {{--{!! Form::submit('Save', ['class' => 'btn btn-primary btn-md pull-right']) !!}--}}
                    {{--</div>--}}
                </div><!-- /.box-footer-->

            </div><!-- /.box -->
        </div>



        <div class="col-md-4">

            <div class="box box-default">
                <div class="box-body">


                    {{-- Right side Additions --}}
                    <p class="lead"> <i class="fa fa-money"></i> Additions: </p>
                    <table class="table table-bordered" border="1">
                        <tbody>
                        <tr ng-repeat="addition in additions">
                            <th style="min-width: 120px;"> @{{ addition.title }} @{{(addition.type=='percentage') ? '('+addition.amount+'%)' : ''}} </th>
                            <td class="text-right">@{{(addition.type=='percentage') ? (subTotal*addition.amount)/100 : addition.amount}}</td>
                            <td><button type="button" ng-click="additionDelete(addition.id, $index)" class="btn btn-default btn-xs"> <i class="fa fa-close"></i> </button>
                        </tr>

                        <tr>
                            <td>
                                {!! Form::select('title', $addRedClass, NULL, ['class'=> 'form-control input-sm input-invoice', 'ng-model'=>'additionId','ng-change'=>'changeAddition()', 'placeholder'=>'Class']) !!}
                            </td>
                            <td>
                                {!! Form::text('amount', NULL, ['class'=> 'form-control input-sm text-right input-invoice', 'ng-model'=>'additionAmount', 'placeholder'=>'Amount']) !!}
                            </td>
                            <td><button type="button" ng-click="addAddition()" class="btn btn-default btn-xs"> <i class="fa fa-save"></i></button>
                        </tr>
                        </tbody>
                    </table>



                    {{-- Right side Reductions --}}
                    <p class="lead"> <i class="fa fa-money"></i> Reductions: </p>
                    <table class="table table-bordered" border="1">
                        <tbody>
                        <tr ng-repeat="reduction in reductions">
                            <th style="min-width: 120px;"> @{{ reduction.title }} @{{(reduction.type=='percentage') ? '('+reduction.amount+'%)' : ''}}</th>
                            <td class="text-right">@{{(reduction.type=='percentage') ? (subTotal*reduction.amount)/100 : reduction.amount}}</td>
                            <td><button type="button" ng-click="reductionDelete(reduction.id, $index)" class="btn btn-default btn-xs"> <i class="fa fa-close"></i> </button>
                        </tr>

                        <tr>
                            <td>
                                {!! Form::select('title', $addRedClass, NULL, ['class'=> 'form-control input-sm input-invoice', 'ng-model'=>'reductionId','ng-change'=>'changeReduction()', 'placeholder'=>'Class']) !!}
                            </td>
                            <td class="text-right">
                                {!! Form::text('amount', NULL, ['class'=> 'form-control input-sm text-right input-invoice', 'ng-model'=>'reductionAmount', 'placeholder'=>'Amount']) !!}
                            </td>
                            <td><button type="button" ng-click="addReduction()" class="btn btn-default btn-xs"> <i class="fa fa-save"></i></button>
                        </tr>

                        </tbody>
                    </table>



                    
                    {{-- Right side Payment section --}}

                    <p class="lead"> <i class="fa fa-money"></i> Payments: </p>

                    <table class="table table-bordered" border="1">
                        <tbody>
                            <tr ng-repeat="payment in payments">
                                <th style="min-width: 120px;"> @{{ payment.payment_method.title }}  </th>
                                <td class="text-right">@{{ payment.amount }}</td>
                                <td><button type="button" ng-click="paymentDelete(payment.id, $index)" class="btn btn-default btn-xs"> <i class="fa fa-close"></i> </button>
                            </tr>

                            <tr>
                                <td>
                                    {!! Form::select('title', $paymentMethods, 1, ['class'=> 'form-control input-invoice', 'ng-model'=>'paymentMethod','ng-change'=>'changeAddition()']) !!}
                                </td>
                                <td>
                                    {!! Form::text('amount', NULL, ['class'=> 'form-control text-right input-invoice', 'ng-model'=>'paymentAmount', 'placeholder'=>'Amount']) !!}
                                </td>
                                <td><button type="button" ng-click="addPayment()" class="btn btn-default btn-xs"> <i class="fa fa-save"></i></button>
                            </tr>
                        </tbody>
                    </table>






                    <p class="lead"> Amount Due 2/22/2014 </p>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                            <tr>
                                <th style="width:50%" class="text-right">Subtotal</th>
                                <td class="text-right">@{{ subTotal | number : 2}}</td>
                            </tr>
                            <tr>
                                <th class="text-right"> Total Addition</th>
                                <td class="text-right">@{{ totalAdditon | number : 2}}</td>
                            </tr>
                            <tr>
                                <th class="text-right">Total Reduction</th>
                                <td class="text-right">@{{ totalReduction | number : 2 }}</td>
                            </tr>
                            <tr>
                                <th class="text-right">Total</th>
                                <td class="text-right">@{{ (( subTotal + totalAdditon ) - totalReduction) | number : 2}}</td>
                            </tr>

                            <tr>
                                <th class="text-right">Paid</th>
                                <td class="text-right">@{{ paidAmount | number : 2 }}</td>
                            </tr>

                            <tr>
                                <th class="text-right"> Due </th>
                                <td class="text-right">@{{ ((( subTotal + totalAdditon ) - totalReduction) -  paidAmount) | number : 2}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>



                </div><!-- /.box-body -->

                <div class="box-footer">
                    <div class="form-group clearfix">
                        {!! Form::submit('Submit', ['class' => 'btn btn-primary btn-md pull-right']) !!}
                    </div>
                </div><!-- /.box-footer-->
            </div><!-- /.box -->
        </div>



    </div>

    {!! Form::close() !!}

</section>
<!-- /.content -->





        <!-- Reduction Modal -->
        <div id="paymentModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"> New Payment </h4>
                    </div>
                    <div class="modal-body">



                        <div class="form-group {{ $errors->has('type') ? ' has-error' : '' }}">
                            {!! Form::label('type', 'Type: ', ['class'=>'control-label']) !!}
                            {!! Form::select('type', [], NULL, ['class'=> 'form-control', 'placeholder'=>'Select Type']) !!}
                            @if ($errors->has('type'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('type') }}</strong>
                                </span>
                            @endif
                        </div>



                        <div class="form-group {{ $errors->has('amount') ? ' has-error' : '' }}">
                            {!! Form::label('amount', 'Amount: ', ['class'=>'control-label']) !!}
                            {!! Form::text('amount', NULL, ['class'=> 'form-control', 'placeholder'=>'Amount']) !!}
                            @if ($errors->has('amount'))
                                <span class="help-block">
                                <strong>{{ $errors->first('amount') }}</strong>
                            </span>
                            @endif
                        </div>



                        <div class="form-group {{ $errors->has('amount') ? ' has-error' : '' }}">
                            {!! Form::label('amount', 'Amount: ', ['class'=>'control-label']) !!}
                            {!! Form::text('amount', NULL, ['class'=> 'form-control', 'placeholder'=>'Amount']) !!}
                            @if ($errors->has('amount'))
                                <span class="help-block">
                                <strong>{{ $errors->first('amount') }}</strong>
                            </span>
                            @endif
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>






@stop




@section('foot_js')

    <script>
        $(function() {
            $('body').addClass('sidebar-collapse');
        });
    </script>


    {!! Html::script('assets/common/angucomplete-alt/angucomplete-alt.js') !!}
    {!! Html::script('assets/modules/receiving/invoice.js') !!}


@endsection