@extends('core::layouts.admin')


@section('content')
        <!-- Main content -->
<section class="content">

    <a href="{{ url('product/admin/attribute-groups') }}" class="btn btn-primary">
        <i class="fa fa-backward"></i> Back
    </a>
    <br/><br/>

    <!-- Default box -->
    @if($mode == 'edit')
        {!! Form::model($group, ['method'=>'PUT', 'url' => 'product/admin/attribute-groups/' . $group->id, 'role'=>'form', 'files'=>true]) !!}
    @else
        {!! Form::open(['method'=>'POST', 'url' => 'product/admin/attribute-groups', 'role'=>'form', 'files'=>true]) !!}
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