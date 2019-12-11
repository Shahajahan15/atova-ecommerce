@extends('core::layouts.admin')


@section('content')
        <!-- Main content -->
<section class="content">

    <a href="{{ url('hr/admin/suppliers') }}" class="btn btn-primary">
        <i class="fa fa-backward"></i> Back
    </a>
    <br/><br/>

    <!-- Default box -->
    @if($mode == 'edit')
        {!! Form::model($supplier, ['method'=>'PUT', 'url' => 'hr/admin/suppliers/' . $supplier->users_id, 'role'=>'form', 'files'=>true]) !!}
    @else
        {!! Form::open(['method'=>'POST', 'url' => 'hr/admin/suppliers', 'role'=>'form', 'files'=>true]) !!}
    @endif









    <div class="row clearfix">
        <div class="col-md-9">

            <div class="nav-tabs-custom">

                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Profile</a></li>
                    <li><a href="#tab_2" data-toggle="tab">Address</a></li>
                    <li><a href="#tab_3" data-toggle="tab">Company Info</a></li>

                    <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                </ul>


                <div class="tab-content">


                    <div class="tab-pane active" id="tab_1">

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

                    </div>


                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
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
                    </div>



                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_3">

                        <div class="form-group {{ $errors->has('company_name') ? ' has-error' : '' }}">
                            {!! Form::label('company_name', 'Company name: ', ['class'=>'control-label']) !!}
                            {!! Form::text('company_name', NULL, ['class'=> 'form-control', 'placeholder'=>'Company name']) !!}
                            @if ($errors->has('company_name'))
                                <span class="help-block">
                                <strong>{{ $errors->first('company_name') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('company_phone') ? ' has-error' : '' }}">
                            {!! Form::label('company_phone', 'Company phone: ', ['class'=>'control-label']) !!}
                            {!! Form::text('company_phone', NULL, ['class'=> 'form-control', 'placeholder'=>'Company phone']) !!}
                            @if ($errors->has('company_phone'))
                                <span class="help-block">
                                <strong>{{ $errors->first('company_phone') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('company_mobile') ? ' has-error' : '' }}">
                            {!! Form::label('company_mobile', 'Company mobile: ', ['class'=>'control-label']) !!}
                            {!! Form::text('company_mobile', NULL, ['class'=> 'form-control', 'placeholder'=>'Company mobile']) !!}
                            @if ($errors->has('company_mobile'))
                                <span class="help-block">
                                <strong>{{ $errors->first('company_mobile') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('company_fax') ? ' has-error' : '' }}">
                            {!! Form::label('company_fax', 'Company Fax: ', ['class'=>'control-label']) !!}
                            {!! Form::text('company_fax', NULL, ['class'=> 'form-control', 'placeholder'=>'Company Fax']) !!}
                            @if ($errors->has('company_fax'))
                                <span class="help-block">
                                <strong>{{ $errors->first('company_fax') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('company_address') ? ' has-error' : '' }}">
                            {!! Form::label('company_address', 'Company address: ', ['class'=>'control-label']) !!}
                            {!! Form::text('company_address', NULL, ['class'=> 'form-control', 'placeholder'=>'Company address']) !!}
                            @if ($errors->has('company_address'))
                                <span class="help-block">
                                <strong>{{ $errors->first('company_address') }}</strong>
                            </span>
                            @endif
                        </div>

                    </div>


                </div>


                <!-- /.tab-content -->
            </div>

        </div>


        <div class="col-md-3">
            <div class="box box-default">
                <div class="box-body">

                    <div class="form-group {{ $errors->has('tier_types_id') ? ' has-error' : '' }}">
                        {!! Form::label('tier_types_id', 'Tier type: ', ['class'=>'control-label']) !!}
                        {!! Form::select('tier_types_id',$tierTypes , NULL, ['class'=> 'form-control', 'placeholder'=>'Tier type']) !!}
                        @if ($errors->has('tier_types_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tier_types_id') }}</strong>
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