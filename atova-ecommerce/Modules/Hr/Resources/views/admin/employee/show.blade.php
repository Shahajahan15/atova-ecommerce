@extends('core::layouts.admin')


@section('content')

        <!-- Main content -->
<section class="content">

    <a href="{{ url('hr/admin/employees') }}" class="btn btn-primary">
        <i class="fa fa-backward"></i> Back
    </a>
    <br/><br/>


    @include('flash::message')

    <div class="box box-default">

        <div class="box-header">
            <h3 class="box-title">employee Details </h3>
            <div class="box-tools">
                {{ Form::open(array('method' => 'delete', 'url' => 'hr/admin/employees/' . $employee->users_id)) }}
                <a title="Edit" href="{{ url('hr/admin/employees/' . $employee->users_id .'/edit') }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                <button title="Delete" onclick="return confirm('Are you sure ?')" class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o"></i> Delete</button>
                {{ Form::close() }}
            </div>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
            <table class="table">
                <tr>
                    <td class="text-bold text-right"> First Name : </td>
                    <td>{{ $employee->user->first_name }}</td>
                </tr>
                <tr>
                    <td class="text-bold text-right"> Last Name : </td>
                    <td>{{ $employee->user->last_name }}</td>
                </tr>
                <tr>
                    <td class="text-bold text-right">Gender : </td>
                    <td>{{ $employee->user->gender }}</td>
                </tr>
                <tr>
                    <td class="text-bold text-right">Mobile : </td>
                    <td>{{ $employee->user->mobile }}</td>
                </tr>
                <tr>
                    <td class="text-bold text-right">Email : </td>
                    <td>{{ $employee->user->email }}</td>
                </tr>

                <tr>
                    <td class="text-bold text-right">Image : </td>
                    <td>
                        @if(!empty($employee->user->image))
                            <img class="img-responsive" style="max-width: 200px;" src="{{ url($employee->user->image) }}" alt="{{ $employee->user->first_name }}"/>
                        @endif
                    </td>
                </tr>


                <tr>
                    <td class="text-bold text-right">Religion : </td>
                    <td>{{ $employee->religion }}</td>
                </tr>
                <tr>
                    <td class="text-bold text-right">Date of Birth : </td>
                    <td>{{ $employee->dob }}</td>
                </tr>
                <tr>
                    <td class="text-bold text-right">Present address : </td>
                    <td>{{ $employee->present_address }}</td>
                </tr>
                <tr>
                    <td class="text-bold text-right">Permanent address : </td>
                    <td>{{ $employee->permanent_address }}</td>
                </tr>
                <tr>
                    <td class="text-bold text-right">Post code : </td>
                    <td>{{ $employee->post_code }}</td>
                </tr>
                <tr>
                    <td class="text-bold text-right">City : </td>
                    <td>{{ $employee->city }}</td>
                </tr>
                <tr>
                    <td class="text-bold text-right">Country : </td>
                    <td>{{ $employee->country }}</td>
                </tr>
                <tr>
                    <td class="text-bold text-right">State : </td>
                    <td>{{ $employee->state }}</td>
                </tr>
                <tr>
                    <td class="text-bold text-right">National ID Card : </td>
                    <td>{{ $employee->nid }}</td>
                </tr>
                <tr>
                    <td class="text-bold text-right">Employee ID : </td>
                    <td>{{ $employee->employee_id }}</td>
                </tr>
                <tr>
                    <td class="text-bold text-right">Designation : </td>
                    <td>{{ $employee->designation->title }}</td>
                </tr>
                <tr>
                    <td class="text-bold text-right">Qualification : </td>
                    <td>{{ $employee->qualification }}</td>
                </tr>
                <tr>
                    <td class="text-bold text-right">Hire Date : </td>
                    <td>{{ $employee->hire_date }}</td>
                </tr>
                <tr>
                    <td class="text-bold text-right">Salary : </td>
                    <td>{{ $employee->salary }}</td>
                </tr>
                <tr>
                    <td class="text-bold text-right">Tier Type : </td>
                    <td>{{ $employee->tierType->title }}</td>
                </tr>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
@stop