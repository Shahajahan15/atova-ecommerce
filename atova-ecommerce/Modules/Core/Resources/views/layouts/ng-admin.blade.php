@extends('core::layouts.admin')

@section('title', $info->title)

@section('head_js')
    {!! Html::script('/assets/common/angular/angular.js') !!}

    <span ng-init="url='{{ url('/') }}'"></span>

@endsection
