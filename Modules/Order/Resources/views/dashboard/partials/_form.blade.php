<div class="form-group">
    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'A kategória megnevezése...', 'required']) }}
</div>

<div class="form-group">
    {{ Form::text('description_above', null, ['class' => 'form-control', 'placeholder' => 'A kategóriának felül elhelyezkedő leírása...']) }}
</div>

<div class="form-group">
    {{ Form::text('description_below', null, ['class' => 'form-control', 'placeholder' => 'A kategóriának alul elhelyezkedő leírása...']) }}
</div>

<div class="form-group">
    {{ Form::submit($submitButton, ['class' => 'form-control btn btn-primary']) }}
    <a class="btn btn-danger form-control" href="{{ url('dashboard/category') }}">Mégse</a>
</div>

{{ Form::close() }}