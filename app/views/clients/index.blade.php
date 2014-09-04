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
            @if (isset($client->contenu))
             {{ $client->contenu }}
            @endif
        </td>
        <td>
            <a href="{{ url('lecons/create', $client->id) }}" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus-sign"></i> cours</a>
            <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-pencil"></i> editer</a>
            <a href="{{ route('clients.archiver', $client->id) }}" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-pencil"></i> archiver</a>
        </td>
    </tr>
    @endforeach
</table>
@stop