@extends('core::layouts.admin')


@section('content')

        <!-- Main content -->
<section class="content">

    <a href="{{ url('hr/admin/suppliers') }}" class="btn btn-primary">
        <i class="fa fa-backward"></i> Back
    </a>
    <br/><br/>


    @include('flash::message')



    <div class="nav-tabs-custom">

        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab">Profile</a></li>
            <li><a href="#tab_2" data-toggle="tab">Address</a></li>
            <li><a href="#tab_3" data-toggle="tab">Company Info</a></li>

            <li class="pull-right">

                {{ Form::open(array('method' => 'delete', 'url' => 'hr/admin/suppliers/' . $supplier->users_id)) }}
                <a title="Edit" href="{{ url('hr/admin/suppliers/' . $supplier->users_id .'/edit') }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                <button title="Delete" onclick="return confirm('Are you sure ?')" class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o"></i> Delete</button>
                {{ Form::close() }}

            </li>
        </ul>


        <div class="tab-content">


            <div class="tab-pane active" id="tab_1">

                <table class="table">
                    <tr>
                        <td class="text-bold text-right"> First Name : </td>
                        <td>{{ $supplier->user->first_name }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold text-right"> Last Name : </td>
                        <td>{{ $supplier->user->last_name }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold text-right">Gender : </td>
                        <td>{{ $supplier->user->gender }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold text-right">Mobile : </td>
                        <td>{{ $supplier->user->mobile }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold text-right">Email : </td>
                        <td>{{ $supplier->user->email }}</td>
                    </tr>

                    <tr>
                        <td class="text-bold text-right">Image : </td>
                        <td>
                            @if(!empty($supplier->user->image))
                                <img class="img-responsive" src="{{ url($supplier->user->image) }}" alt="{{ $supplier->user->first_name }}"/>
                            @endif
                        </td>
                    </tr>


                </table>

            </div>


            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_2">

                <table class="table">

                    <tr>
                        <td class="text-bold text-right">Present address : </td>
                        <td>{{ $supplier->present_address }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold text-right">Permanent address : </td>
                        <td>{{ $supplier->permanent_address }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold text-right">Post code : </td>
                        <td>{{ $supplier->post_code }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold text-right">City : </td>
                        <td>{{ $supplier->city }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold text-right">Country : </td>
                        <td>{{ $supplier->country }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold text-right">State : </td>
                        <td>{{ $supplier->state }}</td>
                    </tr>

                </table>

            </div>



            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_3">

                <table class="table">
                    <tr>
                        <td class="text-bold text-right">Company name : </td>
                        <td>{{ $supplier->company_name }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold text-right">Company phone : </td>
                        <td>{{ $supplier->company_phone }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold text-right">Company mobile : </td>
                        <td>{{ $supplier->company_mobile }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold text-right">Company fax : </td>
                        <td>{{ $supplier->company_fax }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold text-right">Company address : </td>
                        <td>{{ $supplier->company_address }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold text-right">Tier Type : </td>
                        <td>{{ $supplier->tierType->title }}</td>
                    </tr>

                </table>

            </div>


        </div>


    </div>


</section>
<!-- /.content -->
@stop