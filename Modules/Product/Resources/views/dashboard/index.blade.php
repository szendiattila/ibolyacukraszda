@extends('dashboard::layouts.master')
@include('dashboard::layouts.partials._confirmation')
@php
    $modul = 'product';
    $newString = 'Termék';
@endphp
@section('title', config('ibolya.title_prefix') . 'Tortakezelő')

@section('content')
    <h1>Torták:</h1>
    <div><a class="btn btn-success" href="{{ url('dashboard/product/create') }}">Új termék hozzáadása</a></div>
    @if(count($products) > 0)
        <table class="table table-responsive">
            <thead>
            <tr>
                <th>#</th>
                <th>Megnevezés</th>
                <th>Kategória</th>
                <th>Leírás</th>
                <th>10 szeletes ára</th>
                <th>20 szeletes ára</th>
                <th>Kép</th>
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
                    <td><a href="product/{{ $product->id }}/edit">{{ ++$counter }}</a></td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->_10pcs_price}}</td>
                    <td>{{$product->_20pcs_price}}</td>
                    <td><img src="{{asset('images/product/tn-'.$product->image)}}" height="50px"></td>
                    <td>{{ $product->created_at }} - {{ $product->created_at->diffForHumans() }}</td>
                    <td>{{ $product->updated_at }} - {{ $product->updated_at->diffForHumans() }}</td>
                    <td>  @include('dashboard::layouts.partials._row_actions_min',['row_id'=> $product->id]) </td>

                </tr>
            @endforeach
            </tbody>

        </table>

    @else
        <p class="alert alert-danger">Nincs megjelenítendő termék!</p>
    @endif
    <div>

    </div>
    <div class="col-md-4 col-md-offset-4">
        {{$products->render()}}
    </div>
@stop
