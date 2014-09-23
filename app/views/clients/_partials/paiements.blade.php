@extends('clients.show')
@section('details')
<ul class="nav nav-tabs" role="tablist">
    <li><a href="{{ route('clients.show', $client->id) }}">Résumé</a></li>
    <li><a href="{{ route('clients.lecons', $client->id) }}">Lecons ({{ $lecons->sum('heures') }})</a></li>
    <li class="active"><a href="#">Paiements ({{ $paiements->sum('montant') }}.-)</a></li>
</ul>

<table class="table table-responsive">
    <thead>
    <th>Date</th>
    <th>Montant</th>
    <th width="15%">Commentaire</th>
    <th width="25%"><i class="glyphicon glyphicon-cog">Action</i></th>
    </thead>
    @foreach ($paiements as $paiement)
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