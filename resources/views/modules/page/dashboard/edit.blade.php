@extends('dashboard::layouts.master')

@section('content')
    <h1>Torta módosítása</h1>

    {{ Form::model($page,['url' => ['dashboard/page', $page],'method' => 'patch', 'files' => 'true']) }}

    @include('page::dashboard.partials._form', ['submitButton' => 'Módosítás'])
@stop