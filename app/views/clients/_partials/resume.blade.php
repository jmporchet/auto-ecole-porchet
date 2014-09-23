@extends('clients.show')
@section('details')
<ul class="nav nav-tabs" role="tablist">
    <li class="active"><a href="#">Résumé</a></li>
    <li><a href="{{ route('clients.lecons', $client->id) }}">Lecons ({{ $lecons->sum('heures') }})</a></li>
    <li><a href="{{ route('clients.paiements', $client->id) }}">Paiements ({{ $paiements->sum('montant') }}.-)</a></li>
</ul>

<table class="table table-responsive">
    <thead>
    <th>Date</th>
    <th>Lecon</th>
    <th width="15%">Prochaine fois</th>
    <th width="25%"><i class="glyphicon glyphicon-cog">Action</i></th>
    </thead>
    @foreach ($lecons->slice(0, 3) as $lecon)
    <tr>
        <td>{{ date('d.m', strtotime($lecon->date)) }}</td>
        <td>{{ $lecon->contenu }}</td>
        <td>{{ $lecon->prochaine_fois }}</td>
        <td>
            {{ Form::open(array('route' => array('lecons.destroy', $lecon->id), 'method' => 'delete', 'data-confirm' => 'Etes-vous sur ?')) }}
            <a href="{{ url('lecons/'.$lecon->id.'/edit') }}" class="btn btn-primary">editer</a>
            <button type="submit" href="{{ URL::route('lecons.destroy', $lecon->id) }}" class="btn btn-danger btn-mini">effacer</button>
            {{ Form::close() }}
        </td>
    </tr>
    @endforeach
</table>

<table class="table table-responsive">
    <thead>
    <th>Date</th>
    <th>Montant</th>
    <th width="15%">Commentaire</th>
    <th width="25%"><i class="glyphicon glyphicon-cog">Action</i></th>
    </thead>
    @foreach ($paiements->slice(0, 5) as $paiement)
    <tr>
        <td>{{ date('d.m', strtotime($paiement->date)) }}</td>
        <td>{{ $paiement->montant }}</td>
        <td>{{ $paiement->commentaire }}</td>
        <td>
            {{ Form::open(array('route' => array('paiements.destroy', $paiement->id), 'method' => 'delete', 'data-confirm' => 'Etes-vous sur ?')) }}
            <a href="{{ url('paiements/'.$paiement->id.'/edit') }}" class="btn btn-primary">editer</a>
            <button type="submit" href="{{ URL::route('paiements.destroy', $paiement->id) }}" class="btn btn-danger btn-mini">effacer</button>
            {{ Form::close() }}
        </td>
    </tr>
    @endforeach
</table>
@stop