@extends('_partials/master')
@section('content')
<h1>Ajouter un paiement pour {{ $client->prenom }}</h1>
{{ Form::open([
'route' => ['paiements.store' ],
'method' => 'post',
'class' => 'form-horizontal'
]) }}
@include('paiements/_partials/form')
{{ Form::close() }}
@stop