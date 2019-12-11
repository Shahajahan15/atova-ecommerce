@extends('core::layouts.admin')


@section('content')

        <!-- Main content -->
<section class="content">

    <a href="{{ url('invest/admin/withdraws') }}" class="btn btn-primary">
        <i class="fa fa-backward"></i> Back
    </a>
    <br/><br/>


    @include('flash::message')

    <div class="box box-default">

        <div class="box-header">
            <h3 class="box-title"> Invest Details </h3>
            <div class="box-tools">
                {{ Form::open(array('method' => 'delete', 'url' => 'invest/admin/withdraws/' . $invest->id)) }}
                <a title="Edit" href="{{ url('invest/admin/withdraws/' . $invest->id .'/edit') }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                <button title="Delete" onclick="return confirm('Are you sure ?')" class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o"></i> Delete</button>
                {{ Form::close() }}
            </div>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
            <table class="table">
                <tr>
                    <td class="text-bold text-right" width="200"> Date : </td>
                    <td>{{ $invest->date }}</td>
                </tr>
                <tr>
                    <td class="text-bold text-right" width="200"> Employee : </td>
                    <td>
                        @if(!empty($invest->employee_id))
                            {{ $invest->employee->user->first_name . ' ' .$invest->employee->user->last_name }}
                        @endif
                    </td>
                </tr>

                <tr>
                    <td class="text-bold text-right"> Investor : </td>
                    <td>
                        {{ $invest->investor->name }}
                    </td>
                </tr>
                <tr>
                    <td class="text-bold text-right"> Amount : </td>
                    <td>{{ $invest->amount }}</td>
                </tr>
                <tr>
                    <td class="text-bold text-right"> Payment Method : </td>
                    <td>{{ $invest->paymentMethod->title }}</td>
                </tr>

                <tr>
                    <td class="text-bold text-right"> Transaction number : </td>
                    <td>{{ $invest->transaction_number }}</td>
                </tr>



                <tr>
                    <td class="text-bold text-right"> Note : </td>
                    <td>{{ $invest->note }}</td>
                </tr>


            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
@stop