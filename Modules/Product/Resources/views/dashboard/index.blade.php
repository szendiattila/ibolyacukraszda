@extends('dashboard::layouts.master')
@include('dashboard::layouts.partials._confirmation')
@php
    $modul = 'product';
    $newString = 'Termék';
@endphp
@section('title', config('ibolya.title_prefix') . 'Tortakezelő')

@section('content')
    <h1>Torták:</h1>

    <div><a class="btn btn-success" href="{{ url('dashboard/product/create') }}">Új termék hozzáadása</a>
        @if(session()->has('successMessage'))
            <div class="alert alert-success">
                {{session()->get('successMessage')}}
            </div>
        @endif
    </div>

    @if(count($products) > 0)
        <table class="table table-responsive">
            <thead>
            <tr>
                <th>#</th>
                <th>Megnevezés</th>
                <th>Kategória</th>
                <th>10 szeletes ára</th>
                <th>20 szeletes ára</th>
                <th>Kép</th>
                <th>típusa</th>
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
                    <td>
                        @foreach($product->categories as $category)
                            {{ $category->name }}
                        @endforeach
                    </td>
                    <td>{{ $product->_10pcs_price . config('ibolya.currency') }}</td>
                    <td>{{ $product->_20pcs_price . config('ibolya.currency') }}</td>
                    <td><img src="{{asset('images/product/tn-'.$product->image)}}" height="50px"></td>
                    <td>
                        @if($product->type == 0)
                            Normál torta
                        @else
                            Íz kínálatos torta
                        @endif

                    </td>
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
        {{ $products->render() }}
    </div>
@stop
