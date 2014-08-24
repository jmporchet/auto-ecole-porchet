@extends('_partials.master')
@section('content')

<h2>Bonjour {{ $prenom }},</h2>

<p>Voici le trajet (ou une variation) que nous avons fait aujourd'hui.</p>
@foreach ($exampaths as $exam)
    <a href="{{ $exam['url'] }}">{{ $exam['nom'] }}</a><br>
@endforeach

<p>Bonne route,
<br>
Jean-Marie Porchet auto-école</p>
@stop