@extends('_partials/master')
@section('content')
<h1>Ajouter un parcours d'examen</h1>
{{ Form::open([
'route' => ['exampaths.store' ],
'method' => 'post'
]) }}
@include('exampaths/_partials/form')
{{ Form::close() }}
@stop