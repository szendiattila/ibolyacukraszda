@extends('dashboard::layouts.master')

@section('content')
    <h1>Új termék hozzáadása</h1>

    {{ Form::open(['url' => 'dashboard/product', 'files' => true ]) }}

    @include('product::dashboard.partials._form', ['submitButton' => 'Mentés'])
@stop