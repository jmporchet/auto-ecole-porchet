@extends('_partials/master')
@section('content')
<h1>Liste des clients last seen <small><a href="{{ route('clients.create') }}" class="btn btn-success">nouveau client</a></small></h1>
<table class="table table-striped table-condensed">
    <thead>
    <th>Nom</th>
    <th>Téléphone</th>
    <th>La dernière fois</th>
    <th><i class="glyphicon-cog glyphicon"></i> Action</th>
    </thead>
    @foreach ($clients as $client)
    <tr>
        <td><a href=" {{ route('clients.show', $client->id) }}">{{ $client->prenom }} {{ $client->nom }}</a></td>
        <td>
             <a href="tel:{{ $client->telephone }}">{{ $client->telephone }}</a>
        </td>
        <td>
             {{ $client->lecons_created_at }}
        </td>
        <td>
            <a href="{{ url('lecons/create', $client->id) }}" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus-sign"></i> cours</a>
            <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-pencil"></i> editer</a>
        </td>
    </tr>
    @endforeach
</table>
@stop