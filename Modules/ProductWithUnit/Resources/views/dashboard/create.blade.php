@extends('dashboard::layouts.master')

@section('content')
    <h1>Új sütemény hozzáadása</h1>

    {{ Form::open(['url' => 'dashboard/productwithunit', 'files' => true ]) }}

    @include('productwithunit::dashboard.partials._form', ['submitButton' => 'Mentés'])
@stop