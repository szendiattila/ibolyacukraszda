@include('dashboard::_partials._errors')

<div class="form-group">
    {{Form::label('Kategória megnevezése')}}
    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'A kategória megnevezése...']) }}
</div>

<div class="form-group">
    {{Form::label('Kategória felső leírása')}}
    {{ Form::text('description_above', null, ['class' => 'form-control', 'placeholder' => 'A kategóriának felül elhelyezkedő leírása...']) }}
</div>

<div class="form-group">
    {{Form::label('Kategória alsó leírása')}}
    {{ Form::text('description_below', null, ['class' => 'form-control', 'placeholder' => 'A kategóriának alul elhelyezkedő leírása...']) }}
</div>


<div class="form-group">
    {{Form::label('Kategória típusa')}}
    {{ Form::select('type', [0 => 'Tortáknak', 1 => 'Fagylalt torta (terméknél ízek megadása lesz)'], null ,['class' => 'form-control']) }}
</div>

<div class="form-group">

    {{ Form::submit($submitButton, ['class' => 'form-control btn btn-primary']) }}
    <a class="btn btn-danger form-control" href="{{ url('dashboard/category') }}">Mégse</a>
</div>


{{ Form::close() }}