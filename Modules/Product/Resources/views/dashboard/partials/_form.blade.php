<div class="form-group">
    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'A torta megnevezése...', 'required']) }}
</div>

<div class="form-group">
    {{ Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder' => 'Válaszd ki a torta kategóriáját...', 'required']) }}
</div>

<div class="form-group">
    {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'A torta leírása...', 'required']) }}
</div>

<div class="form-group">
    {{ Form::number('_10pcs_price', null, ['class' => 'form-control', 'placeholder' => 'A torta ára (10 szelet)...', 'required']) }}
</div>

<div class="form-group">
    {{ Form::number('_20pcs_price', null, ['class' => 'form-control', 'placeholder' => 'A torta ára (20 szelet)...', 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('image', 'Termék kép') }}
    {{ Form::file('image', ['class' => 'form-control fileinput-control', 'data-show-upload' => 'false']) }}
</div>

<div class="form-group">
    {{ Form::submit($submitButton, ['class' => 'form-control btn btn-primary']) }}
    <a class="btn btn-danger form-control" href="{{ url('dashboard/cake') }}">Mégse</a>
</div>

{{ Form::close() }}