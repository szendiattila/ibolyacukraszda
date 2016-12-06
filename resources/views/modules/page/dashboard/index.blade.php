@extends('dashboard::layouts.master')
@include('dashboard::layouts.partials._confirmation')
@php
$modul = 'page';
@endphp
@section('title', config('ibolya.title_prefix') . 'Oldal kezelő')

@section('content')
    <h1>Torták:</h1>
    <div><a class="btn btn-success" href="{{ url('dashboard/page/create') }}">Új oldal hozzáadása</a></div>
    @if(count($pages) > 0)
        <table class="table table-responsive">
            <thead>
            <tr>
                <th>#</th>
                <th>Megnevezés</th>
                <th>Leírás</th>
                <th>Létrehozva</th>
                <th>Legutolsó Módosítás</th>
                <th>Műveletek</th>
            </tr>
            </thead>
            <tbody>
            @php
                $pageCounter = 0;
            @endphp
            @foreach($pages as $page)
                <tr>
                    <td><a href="page/{{ $page->id }}/edit">{{ ++$pageCounter }}</a></td>
                    <td>{{ $page->name }}</td>
                    <td>{{ $page->description}}</td>
                    <td>{{ $page->created_at }} - {{ $page->created_at->diffForHumans() }}</td>
                    <td>{{ $page->updated_at }} - {{ $page->updated_at->diffForHumans() }}</td>
                    <td>  @include('dashboard::layouts.partials._row_actions_min',['row_id'=> $page->id]) </td>

                </tr>
            @endforeach
            </tbody>

        </table>

    @else
        <p class="alert alert-danger">Nincs megjelenítendő oldal!</p>
    @endif
    <div>

    </div>
    <div class="col-md-4 col-md-offset-4">
        {{ $pages->render() }}
    </div>
@stop
