@extends('frontend::layouts.master')

@section('title', $page->title)
@section('keywords', $page->keywords)
@section('description', $page->description)
@section('content')

    <h1>{{ $page->name }}</h1>

    {!! $page->content !!}
@stop
