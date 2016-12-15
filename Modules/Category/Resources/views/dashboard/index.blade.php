@extends('dashboard::layouts.master')
@include('dashboard::layouts.partials._confirmation')
@php
    $modul = 'category';
    $newString = 'Kategória';
@endphp

@section('title', config('ibolya.title_prefix') . 'Kategória kezelő')

@section('content')
    <h1>Kategóriák:</h1>
    <a class="btn btn-success" href="{{ url('dashboard/category/create') }}">Új kategória hozzáadása</a>
    @if(count($categories) > 0)
        <table class="table table-responsive">
            <thead>
            <tr>
                <th>#</th>
                <th>Megnevezés</th>
                <th>Típus</th>
                <th>Létrehozva</th>
                <th>Legutolsó Módosítás</th>
                <th>Műveletek</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $key => $category)
                <tr>
                    <td><a href="category/{{ $category->id }}/edit">{{ $key + 1 }}</a></td>
                    <td>{{ $category->name }}</td>
                    <td>
                        @if( $category->type == 0 )
                            Normál Torta
                        @else
                            Torta ízekkel
                        @endif
                    </td>
                    <td>{{ $category->created_at }} ({{ $category->created_at->diffForHumans() }})</td>
                    <td>{{ $category->updated_at }} ({{ $category->updated_at->diffForHumans() }})</td>
                    <td>  @include('dashboard::layouts.partials._row_actions_min',['row_id'=> $category->id]) </td>

                </tr>
            @endforeach
            </tbody>
        </table>

    @else
        <p class="alert alert-danger">Nincs megjelenítendő kategória!</p>
    @endif


@stop
