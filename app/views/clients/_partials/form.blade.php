<div class="form-group">
    {{ Form::label('prenom', 'Prénom', ['class' => 'col-sm-2']) }}
    <div class="col-sm-10">
        {{ Form::text('prenom', null, ['class' => 'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('nom', 'Nom', ['class' => 'col-sm-2']) }}
    <div class="col-sm-10">
        {{ Form::text('nom', null, ['class' => 'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('telephone', 'Téléphone', ['class' => 'col-sm-2']) }}
    <div class="col-sm-10">
        {{ Form::text('telephone', null, ['class' => 'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('profession', 'Profession', ['class' => 'col-sm-2']) }}
    <div class="col-sm-10">
        {{ Form::text('profession', null, ['class' => 'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('date_naissance', 'Date de naissance', ['class' => 'col-sm-2']) }}
    <div class="col-sm-10">
        {{ Form::text('date_naissance', null, ['class' => 'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('email', 'Email', ['class' => 'col-sm-2']) }}
    <div class="col-sm-10">
        {{ Form::text('email', null, ['class' => 'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('type_examen', 'Type d\'examen', ['class' => 'col-sm-2']) }}
    <div class="col-sm-10">
        {{ Form::select('type_examen', ['examen','test']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('notes', 'notes', ['class' => 'col-sm-2']) }}
    <div class="col-sm-10">
        {{ Form::textarea('notes', null, ['size' => '40x2', 'class' => 'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('trouve_comment', 'Qui vous a parlé de moi ?', ['class' => 'col-sm-2']) }}
    <div class="col-sm-10">
        {{ Form::text('trouve_comment', null, ['class' => 'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('permis','Permis',['class' => 'col-sm-2']) }}
    <div class="col-sm-10">
        {{ Form::file('permis','',['class' => 'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::submit('Envoyer', ['class' => 'form-control btn btn-success']) }}
</div>