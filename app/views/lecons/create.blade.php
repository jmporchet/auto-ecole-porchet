@extends('_partials/master')
@section('content')
<h1>Ajouter une leçon pour {{ $client->prenom }}</h1>
{{ Form::open([
'route' => ['lecons.store' ],
'method' => 'post'
]) }}
@include('lecons/_partials/form')
{{ Form::close() }}
@stop