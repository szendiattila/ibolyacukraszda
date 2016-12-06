@include('partials.dashboard.tinymce')

<div class="form-group">
    {{ Form::label('name', 'Oldal neve') }}
    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Oldal megnevezése...', 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('url', 'Url') }}
    {{ Form::text('url', null, ['class' => 'form-control', 'placeholder' => 'Url...', 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'A böngésző fül neve...', 'required']) }}
</div>


<div class="form-group">
    {{ Form::label('keywords', 'Meta keywords') }}
    {{ Form::text('keywords', null, ['class' => 'form-control', 'placeholder' => 'Meta kulcsszavak vesszővel elválasztva...', 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('description', 'Meta description') }}
    {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Meta leírás...', 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('content', 'Oldal tartalma') }}
    {{ Form::textarea('content', null, ['class' => 'form-control tinymce-control', 'placeholder' => 'Oldal tartalma...', 'required']) }}
</div>

<div class="form-group">
    {{ Form::submit($submitButton, ['class' => 'form-control btn btn-primary']) }}
    <a class="btn btn-danger form-control" href="{{ url('dashboard/page') }}">Mégse</a>
</div>

{{ Form::close() }}
