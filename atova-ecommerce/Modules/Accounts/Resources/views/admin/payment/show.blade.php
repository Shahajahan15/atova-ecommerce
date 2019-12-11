@extends('core::layouts.admin')


@section('content')

        <!-- Main content -->
<section class="content">

    <a href="{{ url('accounts/admin/payments') }}" class="btn btn-primary">
        <i class="fa fa-backward"></i> Back
    </a>
    <br/><br/>


    @include('flash::message')

    <div class="box box-default">

        <div class="box-header">
            <h3 class="box-title">Payment Details </h3>
            <div class="box-tools">
                {{ Form::open(array('method' => 'delete', 'url' => 'accounts/admin/payments/' . $payment->id)) }}
                <a title="Edit" href="{{ url('accounts/admin/payments/' . $payment->id .'/edit') }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                <button title="Delete" onclick="return confirm('Are you sure ?')" class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o"></i> Delete</button>
                {{ Form::close() }}
            </div>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
            <table class="table">
                <tr>
                    <td class="text-bold text-right" width="200"> Date : </td>
                    <td>{{ $payment->date }}</td>
                </tr>
                <tr>
                    <td class="text-bold text-right" width="200"> Employee : </td>
                    <td>{{ $payment->employee->first_name . ' ' .$payment->employee->last_name }}</td>
                </tr>

                <tr>
                    <td class="text-bold text-right"> Payer : </td>
                    <td>
                        {{ $payment->recipient->first_name . ' ' . $payment->recipient->last_name }}
                    </td>
                </tr>

                <tr>
                    <td class="text-bold text-right"> Category : </td>
                    <td>{{ $payment->category->title }}</td>
                </tr>

                <tr>
                    <td class="text-bold text-right"> Payment Method : </td>
                    <td>{{ $payment->paymentMethod->title }}</td>
                </tr>

                <tr>
                    <td class="text-bold text-right"> Transaction number : </td>
                    <td>{{ $payment->transaction_number }}</td>
                </tr>

                <tr>
                    <td class="text-bold text-right"> amount : </td>
                    <td>{{ $payment->amount }}</td>
                </tr>

                <tr>
                    <td class="text-bold text-right"> Reason : </td>
                    <td>{{ $payment->reason }}</td>
                </tr>

                <tr>
                    <td class="text-bold text-right"> Note : </td>
                    <td>{{ $payment->note }}</td>
                </tr>


            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
@stop