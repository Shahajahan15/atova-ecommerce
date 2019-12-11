@extends('core::layouts.admin')


@section('head_css')
{!! Html::style('assets/admin_assets/plugins/datepicker/datepicker3.css') !!}
@endsection



@section('content')
        <!-- Main content -->
<section class="content">

    <a href="{{ url('hr/admin/employees') }}" class="btn btn-primary">
        <i class="fa fa-backward"></i> Back
    </a>
    <br/><br/>

    <!-- Default box -->
    @if($mode == 'edit')
        {!! Form::model($employee, ['method'=>'PUT', 'url' => 'hr/admin/employees/' . $employee->users_id, 'role'=>'form', 'files'=>true]) !!}
    @else
        {!! Form::open(['method'=>'POST', 'url' => 'hr/admin/employees', 'role'=>'form', 'files'=>true]) !!}
    @endif

    <div class="row clearfix">
        <div class="col-md-9">
            <div class="box box-default">
                <div class="box-header with-border">
                    {{--<h3 class="box-title"> New Posts </h3>--}}
                </div>

                <div class="box-body">
                    {!! Form::token() !!}

                    <div class="form-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
                        {!! Form::label('first_name', 'First name: ', ['class'=>'control-label']) !!}
                        {!! Form::text('first_name', NULL, ['class'=> 'form-control', 'placeholder'=>'First name']) !!}
                        @if ($errors->has('first_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('first_name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('last_name') ? ' has-error' : '' }}">
                        {!! Form::label('last_name', 'Last name: ', ['class'=>'control-label']) !!}
                        {!! Form::text('last_name', NULL, ['class'=> 'form-control', 'placeholder'=>'Last name']) !!}
                        @if ($errors->has('last_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('gender') ? ' has-error' : '' }}">
                        {!! Form::label('gender', 'Gender: ', ['class'=>'control-label']) !!}
                        {!! Form::select('gender', ['Male'=>'Male', 'Female'=>'Female'],  NULL, ['class'=> 'form-control', 'placeholder'=>'Gender']) !!}
                        @if ($errors->has('gender'))
                            <span class="help-block">
                                <strong>{{ $errors->first('gender') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('mobile') ? ' has-error' : '' }}">
                        {!! Form::label('mobile', 'Mobile: ', ['class'=>'control-label']) !!}
                        {!! Form::text('mobile', NULL, ['class'=> 'form-control', 'placeholder'=>'Mobile']) !!}
                        @if ($errors->has('mobile'))
                            <span class="help-block">
                                <strong>{{ $errors->first('mobile') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        {!! Form::label('email', 'Email: ', ['class'=>'control-label']) !!}
                        {!! Form::text('email', NULL, ['class'=> 'form-control', 'placeholder'=>'Email']) !!}
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                        {!! Form::label('image', 'Image: ', ['class'=>'control-label']) !!}
                        {!! Form::file('image', NULL, ['class'=> 'form-control', 'placeholder'=>'Image']) !!}
                        @if ($errors->has('image'))
                            <span class="help-block">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('religion') ? ' has-error' : '' }}">
                        {!! Form::label('religion', 'Religion: ', ['class'=>'control-label']) !!}
                        {!! Form::text('religion', NULL, ['class'=> 'form-control', 'placeholder'=>'Religion']) !!}
                        @if ($errors->has('religion'))
                            <span class="help-block">
                                <strong>{{ $errors->first('religion') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('dob') ? ' has-error' : '' }}">
                        {!! Form::label('dob', 'Date of Birth: ', ['class'=>'control-label']) !!}
                        {!! Form::text('dob', NULL, ['class'=> 'form-control','id'=>'datepicker', 'placeholder'=>'Date of Birth']) !!}
                        @if ($errors->has('dob'))
                            <span class="help-block">
                                <strong>{{ $errors->first('dob') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('present_address') ? ' has-error' : '' }}">
                        {!! Form::label('present_address', 'Present Address: ', ['class'=>'control-label']) !!}
                        {!! Form::text('present_address', NULL, ['class'=> 'form-control', 'placeholder'=>'Present Address']) !!}
                        @if ($errors->has('present_address'))
                            <span class="help-block">
                                <strong>{{ $errors->first('present_address') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('permanent_address') ? ' has-error' : '' }}">
                        {!! Form::label('permanent_address', 'Permanent Address: ', ['class'=>'control-label']) !!}
                        {!! Form::text('permanent_address', NULL, ['class'=> 'form-control', 'placeholder'=>'Permanent Address']) !!}
                        @if ($errors->has('permanent_address'))
                            <span class="help-block">
                                <strong>{{ $errors->first('permanent_address') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('post_code') ? ' has-error' : '' }}">
                        {!! Form::label('post_code', 'Post code: ', ['class'=>'control-label']) !!}
                        {!! Form::text('post_code', NULL, ['class'=> 'form-control', 'placeholder'=>'Post code']) !!}
                        @if ($errors->has('post_code'))
                            <span class="help-block">
                                <strong>{{ $errors->first('post_code') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('city') ? ' has-error' : '' }}">
                        {!! Form::label('city', 'City: ', ['class'=>'control-label']) !!}
                        {!! Form::text('city', NULL, ['class'=> 'form-control', 'placeholder'=>'City']) !!}
                        @if ($errors->has('city'))
                            <span class="help-block">
                                <strong>{{ $errors->first('city') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('country') ? ' has-error' : '' }}">
                        {!! Form::label('country', 'Country: ', ['class'=>'control-label']) !!}
                        {!! Form::text('country', NULL, ['class'=> 'form-control', 'placeholder'=>'Country']) !!}
                        @if ($errors->has('country'))
                            <span class="help-block">
                                <strong>{{ $errors->first('country') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('state') ? ' has-error' : '' }}">
                        {!! Form::label('state', 'State: ', ['class'=>'control-label']) !!}
                        {!! Form::text('state', NULL, ['class'=> 'form-control', 'placeholder'=>'State']) !!}
                        @if ($errors->has('state'))
                            <span class="help-block">
                                <strong>{{ $errors->first('state') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('nid') ? ' has-error' : '' }}">
                        {!! Form::label('nid', 'National ID Card No: ', ['class'=>'control-label']) !!}
                        {!! Form::text('nid', NULL, ['class'=> 'form-control', 'placeholder'=>'National ID Card No']) !!}
                        @if ($errors->has('nid'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nid') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('qualification') ? ' has-error' : '' }}">
                        {!! Form::label('qualification', 'Qualification: ', ['class'=>'control-label']) !!}
                        {!! Form::textarea('qualification', NULL, ['class'=> 'form-control', 'placeholder'=>'Qualification']) !!}
                        @if ($errors->has('qualification'))
                            <span class="help-block">
                                <strong>{{ $errors->first('qualification') }}</strong>
                            </span>
                        @endif
                    </div>



                </div><!-- /.box-body -->

                <div class="box-footer">
                    {{--<div class="form-group clearfix">--}}
                    {{--{!! Form::submit('Save', ['class' => 'btn btn-primary btn-md pull-right']) !!}--}}
                    {{--</div>--}}
                </div><!-- /.box-footer-->

            </div><!-- /.box -->
        </div>


        <div class="col-md-3">
            <div class="box box-default">
                <div class="box-body">

                    <div class="form-group {{ $errors->has('hire_date') ? ' has-error' : '' }}">
                        {!! Form::label('hire_date', 'Hire date: ', ['class'=>'control-label']) !!}
                        {!! Form::text('hire_date', NULL, ['class'=> 'form-control', 'id'=>'datepicker2', 'placeholder'=>'Hire date']) !!}
                        @if ($errors->has('hire_date'))
                            <span class="help-block">
                                <strong>{{ $errors->first('hire_date') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('employee_id') ? ' has-error' : '' }}">
                        {!! Form::label('employee_id', 'Employee ID: ', ['class'=>'control-label']) !!}
                        {!! Form::text('employee_id', NULL, ['class'=> 'form-control', 'placeholder'=>'Employee ID']) !!}
                        @if ($errors->has('employee_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('employee_id') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('designation_id') ? ' has-error' : '' }}">
                        {!! Form::label('designation_id', 'Designation: ', ['class'=>'control-label']) !!}
                        {!! Form::select('designation_id',$designations, NULL, ['class'=> 'form-control', 'placeholder'=>'Designation']) !!}
                        @if ($errors->has('designation_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('designation_id') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('tier_types_id') ? ' has-error' : '' }}">
                        {!! Form::label('tier_types_id', 'Tier type: ', ['class'=>'control-label']) !!}
                        {!! Form::select('tier_types_id',$tierTypes , NULL, ['class'=> 'form-control', 'placeholder'=>'Tier type']) !!}
                        @if ($errors->has('tier_types_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tier_types_id') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('salary') ? ' has-error' : '' }}">
                        {!! Form::label('salary', 'Salary: ', ['class'=>'control-label']) !!}
                        {!! Form::text('salary', NULL, ['class'=> 'form-control', 'placeholder'=>'Salary']) !!}
                        @if ($errors->has('salary'))
                            <span class="help-block">
                                <strong>{{ $errors->first('salary') }}</strong>
                            </span>
                        @endif
                    </div>

                </div><!-- /.box-body -->


                <div class="box-footer">
                    <div class="form-group clearfix">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary btn-md btn-block']) !!}
                    </div>
                </div><!-- /.box-footer-->


            </div><!-- /.box -->
        </div>

    </div>

    {!! Form::close() !!}

</section>
<!-- /.content -->

@stop




@section('foot_js')
    {!! Html::script('assets/admin_assets/plugins/datepicker/bootstrap-datepicker.js') !!}

    <script>
        $(function () {

            //Date picker
            $('#datepicker').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd'
            });

            $('#datepicker2').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd'
            });
        });
    </script>
@endsection