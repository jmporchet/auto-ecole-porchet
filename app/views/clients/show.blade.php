@extends('_partials/master')
@section('content')
<h1>Les leçons de {{ $client->prenom }} <small><a href="{{ url('lecons/create/'.$client->id) }}">ajouter une leçon</a></small></h1>
@foreach ($lecons as $lecon)
{{ $lecon->date }} - {{ $lecon->contenu }}
<br>
@endforeach

<h2>Envoyer un parcours d'examen</h2>
{{ Form::open(['route' => 'clients.store']) }}
@foreach ($exampaths as $ep)
{{Form::checkbox('exampath_id', $ep->id) }} {{ $ep->nom }}<br>
@endforeach
{{ Form::close() }}
@stop