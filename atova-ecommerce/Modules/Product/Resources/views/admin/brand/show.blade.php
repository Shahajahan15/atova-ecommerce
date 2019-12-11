@extends('core::layouts.admin')


@section('content')

        <!-- Main content -->
<section class="content">

    <a href="{{ url('product/admin/brands') }}" class="btn btn-primary">
        <i class="fa fa-backward"></i> Back
    </a>
    <br/><br/>


    @include('flash::message')

    <div class="box box-default">

        <div class="box-header">
            <h3 class="box-title">brand Details </h3>
            <div class="box-tools">
                {{ Form::open(array('method' => 'delete', 'url' => 'product/admin/brands/' . $brand->id)) }}
                <a title="Edit" href="{{ url('product/admin/brands/' . $brand->id .'/edit') }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                <button title="Delete" onclick="return confirm('Are you sure ?')" class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o"></i> Delete</button>
                {{ Form::close() }}
            </div>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
            <table class="table">
                <tr>
                    <td class="text-bold text-right"> First Name : </td>
                    <td>{{ $brand->title}}</td>
                </tr>
                <tr>
                    <td class="text-bold text-right"> Last Name : </td>
                    <td>{{ $brand->description }}</td>
                </tr>
                <tr>
                    <td class="text-bold text-right">Gender : </td>
                    <td>{{ $brand->country }}</td>
                </tr>

                <tr>
                    <td class="text-bold text-right">Image : </td>
                    <td>
                        @if(!empty($brand->image))
                            <img class="img-responsive" src="{{ url($brand->image) }}" alt="{{ $brand->image }}"/>
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