@extends('_partials.master')

@section('content')
<h1>Create client</h1>
{{ Form::open([
    'route' => ['clients.store' ],
    'method' => 'post'
]) }}
@include('clients._partials.form')
{{ Form::close() }}
@stop