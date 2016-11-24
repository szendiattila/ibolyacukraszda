@extends('dashboard::layouts.master')

@section('content')
    <h1>Új torta hozzáadása</h1>

    {{ Form::open(['url' => 'dashboard/cake']) }}

    @include('cake::dashboard.partials._form', ['submitButton' => 'Mentés'])
@stop