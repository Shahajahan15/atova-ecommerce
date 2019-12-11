@extends('core::layouts.ng-admin')


@section('head_css')
{!! Html::style('assets/admin_assets/plugins/datepicker/datepicker3.css') !!}
@endsection



@section('content')
        <!-- Main content -->
<section class="content">

    <a href="{{ url('invest/admin/investors') }}" class="btn btn-primary">
        <i class="fa fa-backward"></i> Back
    </a>
    <br/><br/>

    <!-- Default box -->
    @if($mode == 'edit')
        {!! Form::model($investor, ['method'=>'PUT', 'url' => 'invest/admin/investors/' . $investor->id, 'role'=>'form', 'files'=>true]) !!}
    @else
        {!! Form::open(['method'=>'POST', 'url' => 'invest/admin/investors', 'role'=>'form', 'files'=>true]) !!}
    @endif

    <div class="row clearfix">
        <div class="col-md-9">
            <div class="box box-default">
                <div class="box-header with-border">
                    {{--<h3 class="box-title"> New Posts </h3>--}}
                </div>

                <div class="box-body">
                    {!! Form::token() !!}

                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                        {!! Form::label('name', 'Name: ', ['class'=>'control-label']) !!}
                        {!! Form::text('name', NULL, ['class'=> 'form-control', 'placeholder'=>'Name']) !!}
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('father_name') ? ' has-error' : '' }}">
                        {!! Form::label('father_name', 'Father name: ', ['class'=>'control-label']) !!}
                        {!! Form::text('father_name', NULL, ['class'=> 'form-control', 'placeholder'=>'Father name']) !!}
                        @if ($errors->has('father_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('father_name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('mother_name') ? ' has-error' : '' }}">
                        {!! Form::label('mother_name', 'Mother name: ', ['class'=>'control-label']) !!}
                        {!! Form::text('mother_name', NULL, ['class'=> 'form-control', 'placeholder'=>'Mother name']) !!}
                        @if ($errors->has('mother_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('mother_name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('gender') ? ' has-error' : '' }}">
                        {!! Form::label('gender', 'Gender: ', ['class'=>'control-label']) !!}
                        {!! Form::select('gender', ['male'=>'Male', 'female'=>'Female'],  NULL, ['class'=> 'form-control', 'placeholder'=>'Gender']) !!}
                        @if ($errors->has('gender'))
                            <span class="help-block">
                                <strong>{{ $errors->first('gender') }}</strong>
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

                    <div class="form-group {{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
                        {!! Form::label('date_of_birth', 'Date of birth: ', ['class'=>'control-label']) !!}
                        {!! Form::text('date_of_birth', NULL, ['class'=> 'form-control', 'id'=>'datepicker2', 'placeholder'=>'Date of birth']) !!}
                        @if ($errors->has('date_of_birth'))
                            <span class="help-block">
                                <strong>{{ $errors->first('date_of_birth') }}</strong>
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

                    <div class="form-group {{ $errors->has('nid') ? ' has-error' : '' }}">
                        {!! Form::label('nid', 'nid: ', ['class'=>'control-label']) !!}
                        {!! Form::text('nid', NULL, ['class'=> 'form-control', 'placeholder'=>'nid']) !!}
                        @if ($errors->has('nid'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nid') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                        {!! Form::label('address', 'Address: ', ['class'=>'control-label']) !!}
                        {!! Form::text('address', NULL, ['class'=> 'form-control', 'placeholder'=>'Address']) !!}
                        @if ($errors->has('address'))
                            <span class="help-block">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                        {!! Form::label('image', 'mage: ', ['class'=>'control-label']) !!}

                        <div class="input-group">
                           <span class="input-group-btn">
                             <a id="lfm1" data-input="thumbnail1" data-preview="holder1" class="btn btn-primary">
                                 <i class="fa fa-picture-o"></i> Choose
                             </a>
                           </span>
                            @if(isset($investor->image))
                                <input id="thumbnail1" class="form-control" required value="{{ $investor->image }}" type="text" name="image">
                            @else
                                <input id="thumbnail1" class="form-control" required type="text" name="image">
                            @endif
                        </div>
                        @if(isset($investor->image))
                            <img id="holder1" src="{{ url($investor->image) }}" style="max-height:100px;max-width:100px;">
                        @else
                            <img id="holder1" style="max-height:100px;max-width:100px;">
                        @endif

                        @if ($errors->has('image'))
                            <span class="help-block">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group {{ $errors->has('nominee_name') ? ' has-error' : '' }}">
                        {!! Form::label('nominee_name', 'Nominee name: ', ['class'=>'control-label']) !!}
                        {!! Form::text('nominee_name', NULL, ['class'=> 'form-control', 'placeholder'=>'Nominee name']) !!}
                        @if ($errors->has('nominee_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nominee_name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('nominee_address') ? ' has-error' : '' }}">
                        {!! Form::label('nominee_address', 'Nominee address: ', ['class'=>'control-label']) !!}
                        {!! Form::text('nominee_address', NULL, ['class'=> 'form-control', 'placeholder'=>'Nominee address']) !!}
                        @if ($errors->has('nominee_address'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nominee_address') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('nominee_mobile') ? ' has-error' : '' }}">
                        {!! Form::label('nominee_mobile', 'Nominee mobile: ', ['class'=>'control-label']) !!}
                        {!! Form::text('nominee_mobile', NULL, ['class'=> 'form-control', 'placeholder'=>'Nominee mobile']) !!}
                        @if ($errors->has('nominee_mobile'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nominee_mobile') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('nominee_nid') ? ' has-error' : '' }}">
                        {!! Form::label('nominee_nid', 'Nominee NID: ', ['class'=>'control-label']) !!}
                        {!! Form::text('nominee_nid', NULL, ['class'=> 'form-control', 'placeholder'=>'Nominee nid']) !!}
                        @if ($errors->has('nominee_nid'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nominee_nid') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('nominee_relation') ? ' has-error' : '' }}">
                        {!! Form::label('nominee_relation', 'Nominee Relation: ', ['class'=>'control-label']) !!}
                        {!! Form::text('nominee_relation', NULL, ['class'=> 'form-control', 'placeholder'=>'Nominee Relation']) !!}
                        @if ($errors->has('nominee_relation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nominee_relation') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group {{ $errors->has('nominee_image') ? ' has-error' : '' }}">
                        {!! Form::label('nominee_image', 'Nominee image: ', ['class'=>'control-label']) !!}

                        <div class="input-group">
                           <span class="input-group-btn">
                             <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                 <i class="fa fa-picture-o"></i> Choose
                             </a>
                           </span>
                            @if(isset($investor->nominee_image))
                                <input id="thumbnail" class="form-control" required value="{{ $investor->nominee_image }}" type="text" name="nominee_image">
                            @else
                                <input id="thumbnail" class="form-control" required type="text" name="nominee_image">
                            @endif
                        </div>
                        @if(isset($investor->nominee_image))
                            <img id="holder" src="{{ url($investor->nominee_image) }}" style="max-height:100px;max-width:100px;">
                        @else
                            <img id="holder" style="max-height:100px;max-width:100px;">
                        @endif

                        @if ($errors->has('nominee_image'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nominee_image') }}</strong>
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
    {!! Html::script('/vendor/laravel-filemanager/js/lfm.js') !!}

    <script>
        var url1 = "{{ url('laravel-filemanager') }}";
        $(function () {

            $('#lfm1').filemanager('image', {prefix:url1});
            $('#lfm').filemanager('image', {prefix:url1});

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