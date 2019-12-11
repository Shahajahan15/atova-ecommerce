@extends('core::layouts.admin')


@section('content')

        <!-- Main content -->
<section class="content">

    <a href="{{ url('product/admin/categories') }}" class="btn btn-primary">
        <i class="fa fa-backward"></i> Back
    </a>
    <br/><br/>


    @include('flash::message')

    <div class="box box-default">

        <div class="box-header">
            <h3 class="box-title">category Details </h3>
            <div class="box-tools">
                {{ Form::open(array('method' => 'delete', 'url' => 'product/admin/categories/' . $category->id)) }}
                <a title="Edit" href="{{ url('product/admin/categories/' . $category->id .'/edit') }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                <button title="Delete" onclick="return confirm('Are you sure ?')" class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o"></i> Delete</button>
                {{ Form::close() }}
            </div>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
            <table class="table">
                <tr>
                    <td class="text-bold text-right" width="200"> Title : </td>
                    <td>{{ $category->title}}</td>
                </tr>

                <tr>
                    <td class="text-bold text-right"> Parent : </td>
                    <td>
                        @if(!empty($category->parent_id))
                            {{ $category->parent->title }}
                        @endif
                    </td>
                </tr>

                <tr>
                    <td class="text-bold text-right"> Description : </td>
                    <td>{{ $category->description }}</td>
                </tr>


                <tr>
                    <td class="text-bold text-right">Image : </td>
                    <td>
                        @if(!empty($category->image))
                            <img class="img-responsive" src="{{ url($category->image) }}" alt="{{ $category->image }}"/>
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