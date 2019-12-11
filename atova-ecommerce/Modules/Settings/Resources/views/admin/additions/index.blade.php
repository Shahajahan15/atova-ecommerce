@extends('core::layouts.admin')

@section('head_css')
    {!! Html::style('assets/admin_assets/plugins/datatables/dataTables.bootstrap.css') !!}
@endsection


@section('content')

        <!-- Main content -->
<section class="content">


    @include('flash::message')

    <a href="{{ url('settings/admin/additions/create') }}" class="btn btn-primary">
        <i class="fa fa-plus"></i> New Additions Class
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
                    <th>Code</th>
                    <th>Value</th>
                    <th class="text-right">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1; ?>
                @foreach($additions as $addition)
                    <tr>
                        <td> {{ $i++ }} </td>
                        <td>{{ $addition->title }}</td>
                        <td>{{ $addition->coupon_number }}</td>
                        <td> {{ $addition->value }} </td>
                        <td class="text-right">
                            <a title="View" href="{{ url('settings/admin/additions/' . $addition->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> View </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {{ $additions->links() }}
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