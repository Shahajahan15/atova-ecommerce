@extends('core::layouts.admin')


@section('content')

        <!-- Main content -->
<section class="content">

    <a href="{{ url('hr/admin/customers') }}" class="btn btn-primary">
        <i class="fa fa-backward"></i> Back
    </a>
    <br/><br/>


    @include('flash::message')




    <div class="nav-tabs-custom">

        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab">Profile</a></li>
            <li><a href="#tab_2" data-toggle="tab">Address</a></li>
            <li><a href="#tab_3" data-toggle="tab">Company Info</a></li>
            <li><a href="#tab_4" data-toggle="tab">Shipping Address</a></li>

            <li class="pull-right">
                {{ Form::open(array('method' => 'delete', 'url' => 'hr/admin/customers/' . $customer->users_id)) }}
                <a title="Edit" href="{{ url('hr/admin/customers/' . $customer->users_id .'/edit') }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                <button title="Delete" onclick="return confirm('Are you sure ?')" class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o"></i> Delete</button>
                {{ Form::close() }}
            </li>
        </ul>


        <div class="tab-content">


            <div class="tab-pane active" id="tab_1">

                <table class="table">
                    <tr>
                        <td class="text-bold text-right" width="200"> First Name : </td>
                        <td>{{ $customer->user->first_name }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold text-right"> Last Name : </td>
                        <td>{{ $customer->user->last_name }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold text-right">Gender : </td>
                        <td>{{ $customer->user->gender }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold text-right">Mobile : </td>
                        <td>{{ $customer->user->mobile }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold text-right">Email : </td>
                        <td>{{ $customer->user->email }}</td>
                    </tr>

                    <tr>
                        <td class="text-bold text-right">Image : </td>
                        <td>
                            @if(!empty($customer->user->image))
                                <img class="img-responsive" src="{{ url($customer->user->image) }}" alt="{{ $customer->user->first_name }}"/>
                            @endif
                        </td>
                    </tr>

                </table>

            </div>


            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_2">

                <table class="table">

                    <tr>
                        <td class="text-bold text-right" width="200">Present address : </td>
                        <td>{{ $customer->present_address }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold text-right">Permanent address : </td>
                        <td>{{ $customer->permanent_address }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold text-right">Post code : </td>
                        <td>{{ $customer->post_code }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold text-right">City : </td>
                        <td>{{ $customer->city }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold text-right">Country : </td>
                        <td>{{ $customer->country }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold text-right">State : </td>
                        <td>{{ $customer->state }}</td>
                    </tr>

                </table>

            </div>



            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_3">

                <table class="table">

                    <tr>
                        <td class="text-bold text-right" width="200">Company name : </td>
                        <td>{{ $customer->company_name }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold text-right">Company phone : </td>
                        <td>{{ $customer->company_phone }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold text-right">Company mobile : </td>
                        <td>{{ $customer->company_mobile }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold text-right">Company fax : </td>
                        <td>{{ $customer->company_fax }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold text-right">Company address : </td>
                        <td>{{ $customer->company_address }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold text-right">Tier Type : </td>
                        <td>{{ $customer->tierType->title }}</td>
                    </tr>

                </table>

            </div>




            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_4">

                <table class="table">

                    <tr>
                        <td class="text-bold text-right" width="200">Present address : </td>
                        <td>{{ $customer->shippingAddress->sa_first_name }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold text-right" width="200">Present address : </td>
                        <td>{{ $customer->shippingAddress->sa_present_address }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold text-right" width="200">Present address : </td>
                        <td>{{ $customer->shippingAddress->sa_present_address }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold text-right">Permanent address : </td>
                        <td>{{ $customer->shippingAddress->sa_permanent_address }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold text-right">Post code : </td>
                        <td>{{ $customer->shippingAddress->sa_post_code }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold text-right">City : </td>
                        <td>{{ $customer->shippingAddress->sa_city }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold text-right">Country : </td>
                        <td>{{ $customer->shippingAddress->sa_country }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold text-right">State : </td>
                        <td>{{ $customer->shippingAddress->sa_state }}</td>
                    </tr>

                </table>

            </div>


            </div>


        </div>


        <!-- /.tab-content -->
    </div>



</section>
<!-- /.content -->
@stop