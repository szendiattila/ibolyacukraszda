@include('dashboard::_partials._errors')


<div class="form-group">
    {{ Form::label('name', 'Termék neve') }}
    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'A torta megnevezése...', 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('category_list', 'Termék kategória') }}
    {{ Form::select('category_list[]', $categories, null, ['class' => 'form-control', 'placeholder' => 'Válaszd ki a torta kategóriáját...', 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('description', 'Termék leírás') }}
    {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'A torta leírása...', 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('_10pcs_price', '10 szeletes ára') }}
    {{ Form::number('_10pcs_price', null, ['class' => 'form-control', 'placeholder' => 'A torta ára (10 szelet)...', 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('_20pcs_price', '20 szeletes ára') }}
    {{ Form::number('_20pcs_price', null, ['class' => 'form-control', 'placeholder' => 'A torta ára (20 szelet)...', 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('image', 'Termék kép') }}
    {{ Form::file('image', ['class' => 'form-control fileinput-control', 'data-show-upload' => 'false']) }}
</div>

<div class="form-group">
    {{ Form::submit($submitButton, ['class' => 'form-control btn btn-primary']) }}
    <a class="btn btn-danger form-control" href="{{ url('dashboard/product') }}">Mégse</a>
</div>

{{ Form::close() }}