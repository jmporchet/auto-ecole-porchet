
{{ Form::hidden('client_id', $client->id) }}
<div class="form-group">
    {{ Form::label('date', 'Date :') }}
    {{ Form::text('date', date('Y-m-d H:i'), ['class'=>'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('montant', 'Montant :') }}
    {{ Form::text('montant', null, ['class'=>'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('commentaire', 'Commentaire :') }}
    {{ Form::text('commentaire', null, ['class'=>'form-control']) }}
</div>
<div class="form-group">
	{{ Form::submit('Envoyer', ['class'=>'btn btn-primary']) }}
</div>