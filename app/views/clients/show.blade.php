@extends('_partials/master')
@section('content')
{{ $client->telephone }}<br>
<h1>Les leçons de {{ $client->prenom }} <small><a href="{{ url('lecons/create/'.$client->id) }}" class="btn btn-success">nouvelle leçon</a> <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-pencil"></i> editer</a></small></h1>
<table class="table table-responsive">
    <thead>
    <th>Date</th>
    <th>Contenu</th>
    <th width="15%">Prochaine fois</th>
    <th width="25%"><i class="glyphicon glyphicon-cog">Action</i></th>
    </thead>
@foreach ($lecons as $lecon)
    <tr>
        <td>{{ date('d.m', strtotime($lecon->date)) }}</td>
        <td>{{ $lecon->contenu }}</td>
        <td>{{ $lecon->prochaine_fois }}</td>
        <td>
            {{ Form::open(array('route' => array('lecons.destroy', $lecon->id), 'method' => 'delete', 'data-confirm' => 'Etes-vous sur ?')) }}
                <a href="{{ url('lecons/'.$lecon->id.'/edit') }}" class="btn btn-primary">editer</a>
                <button type="submit" href="{{ URL::route('lecons.destroy', $lecon->id) }}" class="btn btn-danger btn-mini">effacer</butfon>
            {{ Form::close() }}
        </td>
    </tr>
@endforeach
</table>

<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                    Envoyer un parcours d'examen
                </a>
            </h2>
        </div>
        <div id="collapseOne" class="panel-collapse collapse">
            <div class="panel-body">
                {{ Form::open(['route' => 'sendexam']) }}
                {{ Form::hidden('client_id', $client->id) }}
                @foreach ($exampaths as $ep)
                {{Form::checkbox('exampath_id[]', $ep->id) }} {{ $ep->nom }}<br>
                @endforeach
                {{ Form::submit() }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@stop