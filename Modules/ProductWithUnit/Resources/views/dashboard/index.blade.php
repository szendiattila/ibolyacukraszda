@extends('dashboard::layouts.master')
@include('dashboard::layouts.partials._confirmation')
@php
$modul = 'productwithunit';
@endphp
@section('title', config('ibolya.title_prefix') . 'Süteménykezelő')

@section('content')
    <h1>Sütemények:</h1>
    <div><a class="btn btn-success" href="{{ url('dashboard/productwithunit/create') }}">Új sütemény hozzáadása</a></div>
    @if(count($products) > 0)
        <table class="table table-responsive">
            <thead>
            <tr>
                <th>#</th>
                <th>Megnevezés</th>
                <th>Létrehozva</th>
                <th>Legutolsó Módosítás</th>
                <th>Műveletek</th>
            </tr>
            </thead>
            <tbody>
            @php
                $productCounter = 0;
            @endphp
            @foreach($products as $product)
                <tr>
                    <td><a href="product/{{ $product->id }}/edit">{{ ++$productCounter }}</a></td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->created_at }} - {{ $product->created_at->diffForHumans() }}</td>
                    <td>{{ $product->updated_at }} - {{ $product->updated_at->diffForHumans() }}</td>
                    <td>  @include('dashboard::layouts.partials._row_actions_min',['row_id'=> $product->id]) </td>

                </tr>
            @endforeach
            </tbody>

        </table>

    @else
        <p class="alert alert-danger">Nincs megjelenítendő sütemény!</p>
    @endif
    <div>

    </div>
    <div class="col-md-4 col-md-offset-4">
        {{ $products->render() }}
    </div>
@stop
