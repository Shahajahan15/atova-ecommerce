@extends('core::layouts.admin')


@section('content')

        <!-- Main content -->
<section class="content">



    @include('flash::message')

    <div class="box box-default">

        <div class="box-header">
            <h3 class="box-title">Company Details </h3>
            <div class="box-tools">
                <a title="Edit" href="{{ url('settings/admin/company-info/edit') }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit </a>
            </div>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
            <table class="table">
                <tr>
                    <td class="text-bold text-right" width="200"> Title : </td>
                    <td>{{ $company->title }}</td>
                </tr>
                <tr>
                    <td class="text-bold text-right" width="200"> Email : </td>
                    <td>{{ $company->email}}</td>
                </tr>

                <tr>
                    <td class="text-bold text-right"> Mobile : </td>
                    <td>
                        {{ $company->mobile }}
                    </td>
                </tr>

                <tr>
                    <td class="text-bold text-right"> Fax : </td>
                    <td>{{ $company->fax }}</td>
                </tr>

                <tr>
                    <td class="text-bold text-right"> Address : </td>
                    <td>{{ $company->address }}</td>
                </tr>

                <tr>
                    <td class="text-bold text-right"> Post code : </td>
                    <td>{{ $company->post_code }}</td>
                </tr>

                <tr>
                    <td class="text-bold text-right"> City : </td>
                    <td>{{ $company->city }}</td>
                </tr>

                <tr>
                    <td class="text-bold text-right"> State : </td>
                    <td>{{ $company->state }}</td>
                </tr>

                <tr>
                    <td class="text-bold text-right"> Country : </td>
                    <td>{{ $company->country }}</td>
                </tr>

                <tr>
                    <td class="text-bold text-right"> Currency : </td>
                    <td>{{ $company->currency }}</td>
                </tr>



                <tr>
                    <td class="text-bold text-right"> Logo : </td>
                    <td>
                        @if(!empty($company->logo))
                            <img src="{{ url($company->logo) }}" class="img-responsive" style="max-width:300px;">
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