@extends('dashboard::layouts.master')

@section('content')
    <h1>Új menüpont hozzáadása</h1>

    {{ Form::open(['url' => 'dashboard/menu']) }}

    @include('menu::dashboard.partials._form', ['submitButton' => 'Mentés'])
@stop