
@extends('_partials/master')
@section('content')
<h1>Liste des clients <small><a href="{{ route('clients.create') }}" class="btn btn-success">nouveau client</a></small></h1>
<table class="table">
    <thead>
    <th>Nom</th>
    <th>Dernière fois</th>
    <th><i class="glyphicon-cog glyphicon"></i> Action</th>
    </thead>
    @foreach ($clients as $client)
    <tr>
        <td><a href=" {{ route('clients.show', $client->id) }}">{{ $client->prenom }} {{ $client->nom }}</a></td>
        <td>
            @if (isset($client->lecons->last()->contenu))
            {{ date('d.m', strtotime($client->lecons->last()->date)) }} {{ $client->lecons->last()->contenu }}
            @endif
        </td>
        <td><a href="{{ url('lecons/create', $client->id) }}">ajouter cours</a></td>
    </tr>
    @endforeach
</table>
@stop