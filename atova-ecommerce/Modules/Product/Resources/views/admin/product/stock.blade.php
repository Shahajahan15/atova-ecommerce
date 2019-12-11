@extends('core::layouts.admin')

@section('head_css')
{!! Html::style('assets/admin_assets/plugins/datatables/dataTables.bootstrap.css') !!}
@endsection


@section('content')

        <!-- Main content -->
<section class="content">


    <div class="box box-default">
        <div class="box-header">
            <h3 class="box-title"> Product Stock List </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="datatable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Product Title</th>
                    <th>Product Code</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1; ?>
                @foreach($stocks as $stock)
                    <tr>
                        <td> {{ $i++ }} </td>
                        <td> {{ $stock->product->title }} </td>
                        <td> {{ $stock->product->product_code }} </td>
                        <td> {{ $stock->quantity }} </td>
                        <td class="text-right"> {{ $stock->product->price }} <span style="font-size: 20px;" class="bold"> ৳ </span> </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

            <div class="text-center">
                {{ $stocks->links() }}
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