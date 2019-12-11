@extends('core::layouts.admin')

@section('head_css')
    {!! Html::style('assets/admin_assets/plugins/datatables/dataTables.bootstrap.css') !!}
@endsection


@section('content')

        <!-- Main content -->
<section class="content">


    @include('flash::message')

    <a href="{{ url('accounts/admin/categories/create') }}" class="btn btn-primary">
        <i class="fa fa-plus"></i> New category
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
                    <th>Title</th>
                    <th>Note</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                <?php $i=1; ?>
                @foreach($categories as $category)
                    <tr>
                        <td> {{ $i++ }} </td>
                        <td>{{ $category->title }}</td>
                        <td>{{ $category->note }}</td>
                        <td class="text-right">
                            <a title="Edit" href="{{ url('accounts/admin/categories/' . $category->id .'/edit') }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            <div class="text-center">
                {{ $categories->links() }}
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