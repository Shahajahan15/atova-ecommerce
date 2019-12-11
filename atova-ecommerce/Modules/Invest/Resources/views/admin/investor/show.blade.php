@extends('core::layouts.admin')


@section('content')

        <!-- Main content -->
<section class="content">

    <a href="{{ url('invest/admin/investors') }}" class="btn btn-primary">
        <i class="fa fa-backward"></i> Back
    </a>
    <br/><br/>


    @include('flash::message')

    <div class="box box-default">

        <div class="box-header">
            <h3 class="box-title">investor Details </h3>
            <div class="box-tools">
                {{ Form::open(array('method' => 'delete', 'url' => 'invest/admin/investors/' . $investor->id)) }}
                <a title="Edit" href="{{ url('invest/admin/investors/' . $investor->id .'/edit') }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                <button title="Delete" onclick="return confirm('Are you sure ?')" class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o"></i> Delete</button>
                {{ Form::close() }}
            </div>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
            <table class="table">
                <tr>
                    <td class="text-bold text-right" width="200"> Full name : </td>
                    <td>{{ $investor->name }}</td>
                </tr>
                <tr>
                    <td class="text-bold text-right"> Father Name : </td>
                    <td>{{ $investor->father_name }}</td>
                </tr>
                <tr>
                    <td class="text-bold text-right">Mother name : </td>
                    <td>{{ $investor->mother_name }}</td>
                </tr>
                <tr>
                    <td class="text-bold text-right">Gender : </td>
                    <td>{{ $investor->gender }}</td>
                </tr>
                <tr>
                    <td class="text-bold text-right">Religion : </td>
                    <td>{{ $investor->religion }}</td>
                </tr>
                <tr>
                    <td class="text-bold text-right"> Date of Birth : </td>
                    <td>{{ $investor->date_of_birth }}</td>
                </tr>
                <tr>
                    <td class="text-bold text-right"> Mobile : </td>
                    <td>{{ $investor->mobile }}</td>
                </tr>
                <tr>
                    <td class="text-bold text-right"> Email : </td>
                    <td>{{ $investor->email }}</td>
                </tr>
                <tr>
                    <td class="text-bold text-right"> NID : </td>
                    <td>{{ $investor->nid }}</td>
                </tr>
                <tr>
                    <td class="text-bold text-right"> Address : </td>
                    <td>{{ $investor->address }}</td>
                </tr>

                <tr>
                    <td class="text-bold text-right">Image : </td>
                    <td>
                        @if(!empty($investor->image))
                            <img class="img-responsive" style="max-width: 200px;" src="{{ url($investor->image) }}" alt="{{ $investor->first_name }}"/>
                        @endif
                    </td>
                </tr>


                <tr>
                    <td class="text-bold text-right">Nominee name: </td>
                    <td>{{ $investor->nominee_name }}</td>
                </tr>
                <tr>
                    <td class="text-bold text-right"> Nominee Address : </td>
                    <td>{{ $investor->nominee_address }}</td>
                </tr>
                <tr>
                    <td class="text-bold text-right">Nominee address : </td>
                    <td>{{ $investor->nominee_address }}</td>
                </tr>
                <tr>
                    <td class="text-bold text-right">Nominee nid : </td>
                    <td>{{ $investor->nominee_nid }}</td>
                </tr>
                <tr>
                    <td class="text-bold text-right">Nominee relation : </td>
                    <td>{{ $investor->nominee_relation }}</td>
                </tr>

                <tr>
                    <td class="text-bold text-right">Image : </td>
                    <td>
                        @if(!empty($investor->nominee_image))
                            <img class="img-responsive" style="max-width: 200px;" src="{{ url($investor->nominee_image) }}" alt="{{ $investor->nominee_image }}"/>
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