@extends('dashboard::layouts.master')

@section('content')
    <h1>Új kategória hozzáadása</h1>

    {{ Form::open(['url' => 'dashboard/category']) }}

    @include('category::dashboard.partials._form', ['submitButton' => 'Mentés'])
@stop