@extends('frontend::layouts.master')

@section('title', $page->title)
@section('keywords', $page->keywords)
@section('description', $page->description)
@section('content')

    <div class="row">

        <div class="col-xs-24 editable-content mb20">

            <h1>{{$page->name }}</h1>


            {!! html_entity_decode($page->content) !!}


        </div>
    </div>
@stop
