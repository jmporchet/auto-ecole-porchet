<div>
    {{ Form::label('prenom', 'Prénom') }}
    {{ Form::text('prenom') }}
</div>
<div>
    {{ Form::label('nom', 'Nom') }}
    {{ Form::text('nom') }}
</div>
<div>
    {{ Form::label('telephone', 'Téléphone') }}
    {{ Form::text('telephone') }}
</div>
<div>
    {{ Form::label('profession', 'Profession') }}
    {{ Form::text('profession') }}
</div>
<div>
    {{ Form::label('date_naissance', 'Date de naissance') }}
    {{ Form::text('date_naissance') }}
</div>
<div>
    {{ Form::label('email', 'Email') }}
    {{ Form::text('email') }}
</div>
<div>
    {{ Form::label('type_examen', 'Type d\'examen') }}
    {{ Form::select('type_examen', ['examen','test']) }}
</div>
<div>
    {{ Form::label('notes', 'notes') }}
    {{ Form::textarea('notes') }}
</div>
<div>
    {{ Form::label('trouve_comment', 'Qui vous a parlé de moi ?') }}
    {{ Form::text('trouve_comment') }}
</div>
<div>
    {{ Form::submit('Créer') }}
</div>