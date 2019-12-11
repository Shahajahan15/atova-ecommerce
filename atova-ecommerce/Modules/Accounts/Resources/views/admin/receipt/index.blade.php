@extends('core::layouts.admin')

@section('head_css')
    {!! Html::style('assets/admin_assets/plugins/datatables/dataTables.bootstrap.css') !!}
@endsection


@section('content')

        <!-- Main content -->
<section class="content">


    @include('flash::message')

    <a href="{{ url('accounts/admin/receipts/create') }}" class="btn btn-primary">
        <i class="fa fa-plus"></i> New Receipt
    </a>
    <br/><br/>


    <div class="box box-default">
        <div class="box-header">
            <h3 class="box-title"> Receipt List </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="datatable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>ID</th>
                    <th>Payer Name</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1; ?>
                @foreach($receipts as $receipt)
                    <tr>
                        <td> {{ $i++ }} </td>
                        <td> {{ $receipt->id }} </td>
                        <td>{{ $receipt->payer->first_name . ' ' .$receipt->payer->last_name }}</td>
                        <td>{{ $receipt->amount }}</td>
                        <td>
                            <a title="Edit" href="{{ url('accounts/admin/receipts/' . $receipt->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> View </a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

            <div class="text-center">
                {{ $receipts->links() }}
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
                "info": true,
                "autoWidth": false
            });
        });
    </script>
@endsection