@extends('_partials/master')
@section('content')
<h1>Exam paths list <small><a href="{{ route('exampaths.create') }}">create new</a> </small></h1>
@foreach ($exampaths as $exampath)
{{ Form::open(array('route' => array('exampaths.destroy', $exampath->id), 'method' => 'delete')) }}{{ $exampath->nom }} <a href="{{ $exampath->url }}" target="_blank">{{ $exampath->url }}</a>
<button type="submit" >Delete path</button>
{{ Form::close() }}
<br>
@endforeach
@stop