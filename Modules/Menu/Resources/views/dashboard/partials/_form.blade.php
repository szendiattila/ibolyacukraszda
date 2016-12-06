<div class="form-group">
    {{ Form::label('name', 'Megnevezés') }}
    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'A menüpont megnevezése...', 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('url', 'Url') }}
    {{ Form::text('url', null, ['class' => 'form-control', 'placeholder' => 'A menü linkje...', 'required']) }}
</div>

<div class="form-group">
    {{ Form::submit($submitButton, ['class' => 'form-control btn btn-primary']) }}
    <a class="btn btn-danger form-control" href="{{ url('dashboard/menu') }}">Mégse</a>
</div>

{{ Form::close() }}