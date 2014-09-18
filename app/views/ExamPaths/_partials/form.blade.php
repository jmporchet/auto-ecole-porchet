<div>
    {{ Form::label('nom', 'Nom :') }}
    {{ Form::text('nom') }}
</div>
<div>
    {{ Form::label('url', 'URL :') }}
    {{ Form::text('url') }}
</div>
<div>
    {{ Form::submit('Envoyer') }}
</div>