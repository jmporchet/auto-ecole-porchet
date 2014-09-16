@extends('_partials.master')

@section('content')
<h1>Nouveau client</h1>
{{ Form::open([
    'route' => ['clients.store' ],
    'method' => 'post',
    'class' => 'form-horizontal',
    'files' => true
]) }}
@include('clients._partials.form')
{{ Form::close() }}
@stop