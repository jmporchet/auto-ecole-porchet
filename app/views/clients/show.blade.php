@extends('_partials/master')
@section('content')
<div><a href="tel:{{ $client->telephone }}" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-earphone"> Tel</i></a>
<a href="sms:{{ $client->telephone }}" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-send"> SMS</i></a>
<a href="{{ route('clients.edit', $client->id) }}" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-pencil"></i> editer</a></div>
<div class="col-sm-6"><h1>{{ $client->prenom }} {{ $client->nom }}</h1></div><div class="col-sm-6"><a href="{{ url('lecons/create/'.$client->id) }}" class="btn btn-success">nouvelle leçon</a> <a href="{{ url('paiements/create/'.$client->id) }}" class="btn btn-success">nouveau paiement</a></div>
<div class="clearfix"></div>
{{ Notification::showAll() }}

@yield('details')

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