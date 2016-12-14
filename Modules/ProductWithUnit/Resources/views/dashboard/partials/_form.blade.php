<div class="form-group">
    {{ Form::label('name', 'Termék neve') }}
    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'A sütemény megnevezése...', 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('unit_id', 'Mértékegység') }}
    {{ Form::select('unit_id', $units, null, ['class' => 'form-control', 'placeholder' => 'Válaszd ki a mértékegységet...', 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('price', 'Ár (a megadott mértékegység alapján)') }}
    {{ Form::number('price', null, ['class' => 'form-control', 'placeholder' => 'A sütemény ára...', 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('description', 'Termék leírás') }}
    {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'A sütemény leírása...']) }}
</div>

<div class="form-group">
    {{ Form::submit($submitButton, ['class' => 'form-control btn btn-primary']) }}
    <a class="btn btn-danger form-control" href="{{ url('dashboard/productwithunit') }}">Mégse</a>
</div>

{{ Form::close() }}