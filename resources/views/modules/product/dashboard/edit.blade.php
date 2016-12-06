@extends('dashboard::layouts.master')

@section('content')
    <h1>Torta módosítása</h1>

    {{ Form::model($product,['url' => ['dashboard/product', $product],'method' => 'patch', 'files' => 'true']) }}

    @include('product::dashboard.partials._form', ['submitButton' => 'Módosítás'])
@stop