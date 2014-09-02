@extends('_partials.master')

@section('content')
<h1>Editer un client
    @if ($client->status != "réussis")
        <small><a href="{{ url('clients/archiver', $client->id) }}" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-briefcase"></i> archiver</a></small>
    @else
    <small><a href="{{ url('clients/desarchiver', $client->id) }}" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-briefcase"></i> désarchiver</a></small>
    @endif
</h1>
{{ Form::model($client,
    [
        'route' => ['clients.update', $client->id ],
        'method' => 'patch',
        'class' => 'form-horizontal'
    ])
}}
@include('clients._partials.form')
{{ Form::close() }}
@stop