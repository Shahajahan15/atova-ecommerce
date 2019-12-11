@extends('core::layouts.admin')


@section('content')

        <!-- Main content -->
<section class="content">

    <a href="{{ url('settings/admin/additions') }}" class="btn btn-primary">
        <i class="fa fa-backward"></i> Back
    </a>
    <br/><br/>


    @include('flash::message')

    <div class="box box-default">

        <div class="box-header">
            <h3 class="box-title">Addition Details </h3>
            <div class="box-tools">
                {{ Form::open(array('method' => 'delete', 'url' => 'settings/admin/additions/' . $addition->id)) }}
                <a title="Edit" href="{{ url('settings/admin/additions/' . $addition->id .'/edit') }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                <button title="Delete" onclick="return confirm('Are you sure ?')" class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o"></i> Delete</button>
                {{ Form::close() }}
            </div>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
            <table class="table">
                <tr>
                    <td class="text-bold text-right" width="200"> Behavior : </td>
                    <td>{{ $addition->behavior }}</td>
                </tr>
                <tr>
                    <td class="text-bold text-right" width="200"> Title : </td>
                    <td>{{ $addition->title}}</td>
                </tr>

                <tr>
                    <td class="text-bold text-right"> Description : </td>
                    <td>
                        {{ $addition->description }}
                    </td>
                </tr>

                <tr>
                    <td class="text-bold text-right"> Type : </td>
                    <td>{{ $addition->type }}</td>
                </tr>

                <tr>
                    <td class="text-bold text-right"> Value : </td>
                    <td>{{ $addition->value }}</td>
                </tr>

                <tr>
                    <td class="text-bold text-right"> Start Date : </td>
                    <td>{{ $addition->start_date }}</td>
                </tr>

                <tr>
                    <td class="text-bold text-right"> End Date : </td>
                    <td>{{ $addition->end_date }}</td>
                </tr>

                <tr>
                    <td class="text-bold text-right"> Status : </td>
                    <td>
                        @if($addition->status == 1)
                            <label for="active" class="label label-success"> Active </label>
                        @else
                            <label for="deactive" class="label label-warning"> Inactive </label>
                        @endif
                    </td>
                </tr>


            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
@stop