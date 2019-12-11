@extends('core::layouts.admin')


@section('content')

        <!-- Main content -->
<section class="content">

    <a href="{{ url('accounts/admin/receipts') }}" class="btn btn-primary">
        <i class="fa fa-backward"></i> Back
    </a>
    <br/><br/>


    @include('flash::message')

    <div class="box box-default">

        <div class="box-header">
            <h3 class="box-title">Receipt Details </h3>
            <div class="box-tools">
                {{ Form::open(array('method' => 'delete', 'url' => 'accounts/admin/receipts/' . $receipt->id)) }}
                <a title="Edit" href="{{ url('accounts/admin/receipts/' . $receipt->id .'/edit') }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                <button title="Delete" onclick="return confirm('Are you sure ?')" class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o"></i> Delete</button>
                {{ Form::close() }}
            </div>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
            <table class="table">
                <tr>
                    <td class="text-bold text-right" width="200"> Date : </td>
                    <td>{{ $receipt->date }}</td>
                </tr>
                <tr>
                    <td class="text-bold text-right" width="200"> Employee : </td>
                    <td>{{ $receipt->employee->first_name . ' ' .$receipt->employee->last_name }}</td>
                </tr>

                <tr>
                    <td class="text-bold text-right"> Payer : </td>
                    <td>
                        {{ $receipt->payer->first_name . ' ' . $receipt->payer->last_name }}
                    </td>
                </tr>

                <tr>
                    <td class="text-bold text-right"> Category : </td>
                    <td>{{ $receipt->category->title }}</td>
                </tr>

                <tr>
                    <td class="text-bold text-right"> Payment Method : </td>
                    <td>{{ $receipt->paymentMethod->title }}</td>
                </tr>

                <tr>
                    <td class="text-bold text-right"> Transaction number : </td>
                    <td>{{ $receipt->transaction_number }}</td>
                </tr>

                <tr>
                    <td class="text-bold text-right"> amount : </td>
                    <td>{{ $receipt->amount }}</td>
                </tr>

                <tr>
                    <td class="text-bold text-right"> Reason : </td>
                    <td>{{ $receipt->reason }}</td>
                </tr>

                <tr>
                    <td class="text-bold text-right"> Note : </td>
                    <td>{{ $receipt->note }}</td>
                </tr>


            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
@stop