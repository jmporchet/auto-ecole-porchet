@extends('_partials/master')
@section('content')
<h1>Exam paths list <small><a href="{{ route('exampaths.create') }}">create new</a> </small></h1>
<table class="table table-striped">
@foreach ($exampaths as $exampath)
    <tr>
        {{ Form::open(array('route' => array('exampaths.destroy', $exampath->id), 'method' => 'delete')) }}
        <td>{{ $exampath->nom }}</td>
        <td><a href="{{ $exampath->url }}" target="_blank">{{ $exampath->url }}</a></td>
        <td><button type="submit" class="btn btn-danger">Delete path</button></td>
{{ Form::close() }}
        </tr>
@endforeach
</table>
@stop