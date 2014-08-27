@extends('_partials.master')

@section('content')
<h1>Editer un client <small>
        <a href="{{ url('clients/archiver', $client->id) }}" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-briefcase"></i> archiver</a></small></h1>
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