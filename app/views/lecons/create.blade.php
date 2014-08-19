@extends('_partials/master')
@section('content')
Ajouter une leçon pour {{ $client->prenom }}
{{ Form::open([
'route' => ['lecons.store' ],
'method' => 'post'
]) }}
@include('lecons/_partials/form')
{{ Form::close() }}
@stop