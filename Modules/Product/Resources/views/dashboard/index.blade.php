@extends('dashboard::layouts.master')

@section('title', config('ibolya.title_prefix') . 'Tortakezelő')

@section('content')
    <h1>Torták:</h1>
    @if(count($products) > 0)
        <table class="table table-responsive">
            <thead>
            <tr>
                <th>#</th>
                <th>Megnevezés</th>
                <th>Kategória</th>
                <th>Leírás</th>
                <th>Kép</th>
                <th>10 szelet ára</th>
                <th>20 szelet ára</th>
                <th>Létrehozva</th>
                <th>Legutolsó Módosítás</th>
                <th>Műveletek</th>
            </tr>
            </thead>
            <tbody>
            @php
                $counter = 0;
            @endphp
            @foreach($products as $product)
                <tr>
                    <td><a href="cake/{{ $product->id }}/edit">{{ ++$counter }}</a></td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->image}}</td>
                    <td>{{$product->_10pcs_price}}</td>
                    <td>{{$product->_20pcs_price}}</td>
                    <td>{{ $product->created_at }} - {{ $product->created_at->diffForHumans() }}</td>
                    <td>{{ $product->updated_at }} - {{ $product->updated_at->diffForHumans() }}</td>
                    <td>törlés</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    @else
        <p class="alert alert-danger">Nincs megjelenítendő termék!</p>
    @endif

    <a class="btn btn-success" href="{{ url('dashboard/product/create') }}">Új termék hozzáadása</a>
@stop
