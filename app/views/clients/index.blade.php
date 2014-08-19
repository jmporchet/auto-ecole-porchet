
@extends('_partials/master')
@section('content')
<table>
@foreach ($clients as $client)
    <tr>
        <td>{{ $client->prenom }}</td>
        <td><a href="{{ url('lecons/create', $client->id) }}">ajouter cours</a> </td>
    </tr>
@endforeach
    </table>
@stop