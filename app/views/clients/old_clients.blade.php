@extends('_partials/master')
@section('content')
<h1>Liste des anciens clients <small><a href="{{ route('clients.create') }}" class="btn btn-success">nouveau client</a></small></h1>
<table class="table table-striped">
    <thead>
    <th>Nom</th>
    <th><i class="glyphicon-cog glyphicon"></i> Action</th>
    </thead>
    @foreach ($clients as $client)
    <tr>
        <td>
            <a href=" {{ route('clients.show', $client->id) }}">{{ $client->prenom }} {{ $client->nom }}</a>
        </td>
        <td>
            <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-pencil"></i> editer</a>
        </td>
    </tr>
    @endforeach
</table>
@stop