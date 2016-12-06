@extends('menu::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>
        asdfasdfasdf aThis view is loaded from module: {!! config('menu.name') !!}
    </p>
@stop
