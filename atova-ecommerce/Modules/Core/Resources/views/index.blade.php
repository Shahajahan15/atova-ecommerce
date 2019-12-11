@extends('core::layouts.admin')

@section('content')

    <section class="content">
        <h1>Hello World</h1>
        <p>
            This view is loaded from module: {!! config('core.name') !!}
        </p>
    </section>

@stop