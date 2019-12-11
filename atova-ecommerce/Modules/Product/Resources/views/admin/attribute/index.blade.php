@extends('core::layouts.admin')

@section('head_css')
    {!! Html::style('assets/admin_assets/plugins/datatables/dataTables.bootstrap.css') !!}
@endsection


@section('content')

        <!-- Main content -->
<section class="content">


    @include('flash::message')

    <a href="{{ url('product/admin/attributes/create') }}" class="btn btn-primary">
        <i class="fa fa-plus"></i> New Attribute
    </a>
    <br/><br/>


    <div class="box box-default">
        <div class="box-header">
            <h3 class="box-title"> Category List </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="datatable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Group</th>
                    <th>Title</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1; ?>
                @foreach($attributes as $attribute)
                    <tr>
                        <td> {{ $i++ }} </td>
                        <td>
                            @if(!empty($attribute->attributes_group_id))
                                {{ $attribute->group->title }}
                            @endif
                        </td>
                        <td> {{ $attribute->title }} </td>
                        <td>
                            {{ Form::open(array('method' => 'delete', 'url' => 'product/admin/attributes/' . $attribute->id)) }}
                            <a title="Edit" href="{{ url('product/admin/attributes/' . $attribute->id .'/edit') }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                            <button title="Delete" onclick="return confirm('Are you sure ?')" class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o"></i> Delete</button>
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

            <div class="text-center">
                {{ $attributes->links() }}
            </div>


        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
@stop


@section('foot_js')
    {!! Html::script('assets/admin_assets/plugins/datatables/jquery.dataTables.min.js') !!}
    {!! Html::script('assets/admin_assets/plugins/datatables/dataTables.bootstrap.min.js') !!}
    <script>
        $(function () {

            $('#datatable').DataTable({
                "paging": false,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": false,
                "autoWidth": false
            });
        });
    </script>
@endsection