@extends('_partials/master')
@section('content')
<h1>Ca fait longtemps...</h1>
<table class="table table-striped table-condensed">
    <thead>
    <th>Nom</th>
    <th>Contact</th>
    <th>La dernière fois</th>
    <th><i class="glyphicon-cog glyphicon"></i> Action</th>
    </thead>
    @foreach ($clients as $client)
    <tr>
        <td><a href=" {{ route('clients.show', $client->id) }}">{{ $client->prenom }} {{ $client->nom }}</a></td>
        <td>
            <a href="tel:{{ $client->telephone }}" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-earphone"> Tel</i></a>
            <a href="sms:{{ $client->telephone }}" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-send"> SMS</i></a>
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