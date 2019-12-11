@extends('core::layouts.admin')


@section('content')

        <!-- Main content -->
<section class="content">

    <a href="{{ url('expenditure/admin/withdraws') }}" class="btn btn-primary">
        <i class="fa fa-backward"></i> Back
    </a>
    <br/><br/>


    @include('flash::message')

    <div class="box box-default">

        <div class="box-header">
            <h3 class="box-title"> Withdraw Details </h3>
            <div class="box-tools">
                {{ Form::open(array('method' => 'delete', 'url' => 'bank/admin/withdraws/' . $withdraw->id)) }}
                <a title="Edit" href="{{ url('bank/admin/withdraws/' . $withdraw->id .'/edit') }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                <button title="Delete" onclick="return confirm('Are you sure ?')" class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o"></i> Delete</button>
                {{ Form::close() }}
            </div>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
            <table class="table">
                <tr>
                    <td class="text-bold text-right" width="200"> Date : </td>
                    <td>{{ $withdraw->date }}</td>
                </tr>

                <tr>
                    <td class="text-bold text-right"> Bank name : </td>
                    <td>
                        {{ $withdraw->account->bank_name }}
                    </td>
                </tr>

                <tr>
                    <td class="text-bold text-right"> Account No : </td>
                    <td>
                        {{ $withdraw->account->account_no }}
                    </td>
                </tr>

                <tr>
                    <td class="text-bold text-right" width="200"> Employee : </td>
                    <td>{{ $withdraw->employee->user->first_name . ' ' .$withdraw->employee->user->last_name }}</td>
                </tr>

                <tr>
                    <td class="text-bold text-right"> Purpose : </td>
                    <td>{{ $withdraw->purpose->title }}</td>
                </tr>

                <tr>
                    <td class="text-bold text-right"> Amount : </td>
                    <td>{{ $withdraw->amount }}</td>
                </tr>

                <tr>
                    <td class="text-bold text-right"> Note : </td>
                    <td>{{ $withdraw->note }}</td>
                </tr>


            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
@stop