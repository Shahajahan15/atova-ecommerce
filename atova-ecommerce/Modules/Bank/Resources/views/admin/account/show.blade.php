@extends('core::layouts.admin')


@section('content')

        <!-- Main content -->
<section class="content">

    <a href="{{ url('bank/admin/accounts') }}" class="btn btn-primary">
        <i class="fa fa-backward"></i> Back
    </a>
    <br/><br/>


    @include('flash::message')

    <div class="box box-default">

        <div class="box-header">
            <h3 class="box-title">account Details </h3>
            <div class="box-tools">
                {{ Form::open(array('method' => 'delete', 'url' => 'bank/admin/accounts/' . $account->id)) }}
                <a title="Edit" href="{{ url('bank/admin/accounts/' . $account->id .'/edit') }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                <button title="Delete" onclick="return confirm('Are you sure ?')" class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o"></i> Delete</button>
                {{ Form::close() }}
            </div>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
            <table class="table">

                <tr>
                    <td class="text-bold text-right" width="200"> Bank name : </td>
                    <td>{{ $account->bank_name }}</td>
                </tr>

                <tr>
                    <td class="text-bold text-right"> Branch : </td>
                    <td>{{ $account->branch }}</td>
                </tr>

                <tr>
                    <td class="text-bold text-right"> Account no : </td>
                    <td>{{ $account->account_no }}</td>
                </tr>

                <tr>
                    <td class="text-bold text-right"> Account type : </td>
                    <td>{{ $account->account_type }}</td>
                </tr>

                <tr>
                    <td class="text-bold text-right"> Balance : </td>
                    <td>{{ $account->balance }}</td>
                </tr>

                <tr>
                    <td class="text-bold text-right"> Description : </td>
                    <td> {!!  $account->description !!} </td>
                </tr>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
@stop