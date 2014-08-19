
{{ Form::hidden('client_id', $client->id) }}
<div>
    {{ Form::label('date', 'Date :') }}
    {{ Form::text('date', date('Y-m-d H:i')) }}
</div>
<div>
    {{ Form::label('contenu', 'Contenu :') }}
    {{ Form::textarea('contenu') }}
</div>
<div>
    {{ Form::label('prochaine_fois', 'Prochaine fois :') }}
    {{ Form::text('prochaine_fois') }}
</div>
<div>
    {{ Form::label('heures', 'Heures :') }}
    {{ Form::selectRange('heures', 1, 3) }}
</div>
<div>
	{{ Form::submit('Envoyer') }}
</div>