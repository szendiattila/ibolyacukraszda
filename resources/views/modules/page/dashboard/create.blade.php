@extends('dashboard::layouts.master')

@section('content')
    <h1>Új oldal hozzáadása</h1>

    {{ Form::open(['url' => 'dashboard/page']) }}

    @include('page::dashboard.partials._form', ['submitButton' => 'Mentés'])
@stop