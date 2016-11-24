@extends('dashboard::layouts.master')

@section('title', config('ibolya.title_prefix') . 'Tortakezelő')

@section('content')
    <h1>Torták:</h1>
    @if(count($cakes) > 0)
    <table class="table table-responsive">
        <thead>
        <tr>
            <th>#</th>
            <th>Megnevezés</th>
            <th>Kategória</th>
            <th>Létrehozva</th>
            <th>Legutolsó Módosítás</th>
            <th>Műveletek</th>
        </tr>
        </thead>
        <tbody>
            @foreach($cakes as $key => $cake)
                <tr>
                    <td><a href="cake/{{ $cake->id }}/edit">{{ $key + 1 }}</a></td>
                    <td>{{ $cake->name }}</td>
                    <td>{{ $cake->category->name }}</td>
                    <td>{{ $cake->created_at }} - {{ $cake->created_at->diffForHumans() }}</td>
                    <td>{{ $cake->updated_at }} - {{ $cake->updated_at->diffForHumans() }}</td>
                    <td>törlés</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @else
    <p class="alert alert-danger">Nincs megjelenítendő torta!</p>
    @endif

    <a class="btn btn-success" href="{{ url('dashboard/cake/create') }}">Új torta hozzáadása</a>
@stop
