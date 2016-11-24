@extends('dashboard::layouts.master')

@section('content')
    <h1>Kategória módosítása</h1>

    {{ Form::model($category,['url' => ['dashboard/category', $category],'method' => 'patch']) }}

    @include('category::dashboard.partials._form', ['submitButton' => 'Módosítás'])
@stop