@extends('dashboard::layouts.master')

@section('content')
    <h1>Torta módosítása</h1>

    {{ Form::model($cake,['url' => ['dashboard/cake', $cake],'method' => 'patch']) }}

    @include('cake::dashboard.partials._form', ['submitButton' => 'Módosítás'])
@stop