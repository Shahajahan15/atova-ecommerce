@extends('core::layouts.admin')


@section('head_css')
{!! Html::style('assets/admin_assets/plugins/datepicker/datepicker3.css') !!}
@endsection



@section('content')
        <!-- Main content -->
<section class="content">

    <a href="{{ url('product/admin/attributes') }}" class="btn btn-primary">
        <i class="fa fa-backward"></i> Back
    </a>
    <br/><br/>

    <!-- Default box -->
    @if($mode == 'edit')
        {!! Form::model($attribute, ['method'=>'PUT', 'url' => 'product/admin/attributes/' . $attribute->id, 'role'=>'form', 'files'=>true]) !!}
    @else
        {!! Form::open(['method'=>'POST', 'url' => 'product/admin/attributes', 'role'=>'form', 'files'=>true]) !!}
    @endif

    <div class="row clearfix">
        <div class="col-md-9">
            <div class="box box-default">
                <div class="box-header with-border">
                    {{--<h3 class="box-title"> New Posts </h3>--}}
                </div>

                <div class="box-body">
                    {!! Form::token() !!}

                    <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                        {!! Form::label('title', 'Title: ', ['class'=>'control-label']) !!}
                        {!! Form::text('title', NULL, ['class'=> 'form-control', 'placeholder'=>'Title']) !!}
                        @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
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

                    <div class="form-group {{ $errors->has('attributes_group_id') ? ' has-error' : '' }}">
                        {!! Form::label('attributes_group_id', 'Group: ', ['class'=>'control-label']) !!}
                        {!! Form::select('attributes_group_id', $groups, NULL, ['class'=> 'form-control', 'placeholder'=>'Group']) !!}
                        @if ($errors->has('attributes_group_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('attributes_group_id') }}</strong>
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