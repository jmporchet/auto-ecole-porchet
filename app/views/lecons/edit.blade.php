@extends('_partials/master')
@section('content')
<h1>Editer une leçon pour {{ $client->prenom }}</h1>
{{ Form::model($lecon,
    [
        'route' => ['lecons.update', $lecon->id],
        'method' => 'patch'
    ])
}}
@include('lecons/_partials/form')
{{ Form::close() }}
@stop