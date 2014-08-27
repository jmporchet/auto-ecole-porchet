@extends('_partials/master')
@section('content')
<h1>Anniversaires des clients <small><a href="{{ route('clients.create') }}" class="btn btn-success">nouveau client</a></small></h1>
<table class="table">
    <thead>
    <th width="20%">Date</th>
    <th>Nom</th>
    </thead>
    @foreach ($anniversaires as $anniversaire)
    <tr>
        <td>{{ $anniversaire->date_naissance }}</td>
        <td><a href="{{ route('clients.edit', $anniversaire->id) }}">{{ $anniversaire->prenom }}</a></td>
    </tr>
    @endforeach
</table>
@stop