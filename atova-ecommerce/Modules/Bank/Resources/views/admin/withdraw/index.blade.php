@extends('core::layouts.admin')

@section('head_css')
    {!! Html::style('assets/admin_assets/plugins/datatables/dataTables.bootstrap.css') !!}
@endsection


@section('content')

        <!-- Main content -->
<section class="content">


    @include('flash::message')

    <a href="{{ url('bank/admin/withdraws/create') }}" class="btn btn-primary">
        <i class="fa fa-plus"></i> New withdraw
    </a>
    <br/><br/>


    <div class="box box-default">
        <div class="box-header">
            <h3 class="box-title"> Withdraw List </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="datatable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Bank name</th>
                    <th>Amount no</th>
                    <th>Amount</th>
                    <th class="text-right">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1; ?>
                @foreach($withdraws as $withdraw)
                    <tr>
                        <td>{{ $i++ }} </td>
                        <td>{{ $withdraw->account->bank_name }} </td>
                        <td>{{ $withdraw->account->account_no }} </td>
                        <td>{{ $withdraw->amount }}</td>
                        <td class="text-right">
                            <a title="Edit" href="{{ url('bank/admin/withdraws/' . $withdraw->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> View </a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

            <div class="text-center">
                {{ $withdraws->links() }}
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