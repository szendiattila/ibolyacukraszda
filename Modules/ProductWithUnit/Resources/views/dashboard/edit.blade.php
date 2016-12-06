@extends('dashboard::layouts.master')

@section('content')
    <h1>Sütemény módosítása</h1>

    {{ Form::model($productwithunit,['url' => ['dashboard/productwithunit', $productwithunit],'method' => 'patch', 'files' => 'true']) }}

    @include('productwithunit::dashboard.partials._form', ['submitButton' => 'Módosítás'])
@stop