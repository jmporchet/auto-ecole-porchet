@extends('_partials.master')
@section('content')

Bonjour {{ $prenom }},

Voici le trajet que nous avons fait aujourd'hui.
@foreach ($exampaths as $exam)
    <a href="{{ $exam['url'] }}">{{ $exam['nom'] }}</a><br>
@endforeach

Bonne route,

Jean-Marie Porchet auto-école
@stop