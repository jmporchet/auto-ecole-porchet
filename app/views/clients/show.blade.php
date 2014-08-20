@extends('_partials/master')
@section('content')
<h1>Les leçons de {{ $client->prenom }}<small>{{ url::to('lecon/create', 'ajouter une leçon') }}</small></h1>
@foreach ($lecons as $lecon)
{{ $lecon->date }} - {{ $lecon->contenu }}
<br>
@endforeach
@stop