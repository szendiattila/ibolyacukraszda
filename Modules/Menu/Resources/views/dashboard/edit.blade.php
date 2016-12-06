@extends('dashboard::layouts.master')

@section('content')
    <h1>Menüpont módosítása</h1>

    {{ Form::model($menu,['url' => ['dashboard/menu', $menu],'method' => 'patch']) }}

    @include('menu::dashboard.partials._form', ['submitButton' => 'Módosítás'])
@stop