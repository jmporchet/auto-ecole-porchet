@extends('_partials.master')

@section('content')
<h1>Editer un client
    @if ($client->status != "réussis")
        <small><a href="{{ url('clients/archiver', $client->id) }}" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-briefcase"></i> archiver</a></small>
    @else
    <small><a href="{{ url('clients/desarchiver', $client->id) }}" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-briefcase"></i> désarchiver</a></small>
    @endif
    <a href="{{ url('https://www.facebook.com/search/results/?q='.$client->email) }}" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-briefcase"></i> fb</a>
</h1>
{{ Form::model($client,
    [
        'route' => ['clients.update', $client->id ],
        'method' => 'patch',
        'class' => 'form-horizontal',
        'files' => true
    ])
}}
@include('clients._partials.form')
{{ Form::close() }}
@stop