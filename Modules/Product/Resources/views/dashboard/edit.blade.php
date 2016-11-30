@extends('dashboard::layouts.master')

@section('content')
    <h1>Torta módosítása</h1>

    {{ Form::model($product,['url' => ['dashboard/cake', $product],'method' => 'patch', 'files' => 'true']) }}

    @include('cake::dashboard.partials._form', ['submitButton' => 'Módosítás'])
@stop