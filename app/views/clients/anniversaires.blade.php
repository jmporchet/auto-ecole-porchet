@extends('_partials/master')
@section('content')
<h1>Anniversaires des clients</h1>
<table class="table">
    <thead>
    <th width="20%">Date</th>
    <th>Nom</th>
    </thead>
    @foreach ($anniversaires as $anniversaire)
    <tr>
        <td>{{ $anniversaire->date_naissance }}</td>
        <td><a href="{{ route('clients.edit', $anniversaire->id) }}">{{ $anniversaire->prenom }} {{ $anniversaire->nom }}</a></td>
    </tr>
    @endforeach
</table>
@stop