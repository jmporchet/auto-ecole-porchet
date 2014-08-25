
{{ Form::hidden('client_id', $client->id) }}
<div class="form-group">
    {{ Form::label('date', 'Date :') }}
    {{ Form::text('date', date('Y-m-d H:i'), ['class'=>'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('contenu', 'Contenu :') }}
    {{ Form::textarea('contenu', null, ['class'=>'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('prochaine_fois', 'Prochaine fois :') }}
    {{ Form::text('prochaine_fois', null, ['class'=>'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('heures', 'Heures :') }}
    {{ Form::selectRange('heures', 1, 3, null, ['class'=>'form-control']) }}
</div>
<div class="form-group">
	{{ Form::submit('Envoyer', ['class'=>'btn btn-primary']) }}
</div>