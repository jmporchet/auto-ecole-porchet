@extends('_partials/master')
@section('content')
<h1>Statistiques</h1>

Lundi : {{ $daysOfTheWeek[0]->qte_heures }}<br>
Mardi : {{ $daysOfTheWeek[1]->qte_heures }}<br>
Mercredi : {{ $daysOfTheWeek[2]->qte_heures }}<br>
Jeudi : {{ $daysOfTheWeek[3]->qte_heures }}<br>
Vendredi : {{ $daysOfTheWeek[4]->qte_heures }}<br>
Samedi : {{ $daysOfTheWeek[5]->qte_heures }}<br>
Total : {{ $daysOfTheWeek[0]->qte_heures +
    $daysOfTheWeek[1]->qte_heures +
    $daysOfTheWeek[2]->qte_heures +
    $daysOfTheWeek[3]->qte_heures +
    $daysOfTheWeek[4]->qte_heures +
    $daysOfTheWeek[5]->qte_heures }}
<br>
@foreach ( $monthsOfTheYear as $month )

{{ $month->monthName }}: {{ $month->qte_heures }}<br>

@endforeach

<?php dd($monthsOfTheYear); ?>
@stop