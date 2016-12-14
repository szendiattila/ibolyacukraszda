@extends('dashboard::layouts.master')
@php
    $modul = 'order';
    $newString = 'Rendelés';
@endphp
@section('title', config('ibolya.title_prefix') . 'Rendelés kezelő')


@section('content')

    <h1>Rendelések:</h1>

    @if(session()->has('orderMessage'))

        {!! session()->get('orderMessage') !!}

    @endif

    @if(count($orders) > 0)
        <table class="table table-responsive">
            <thead>
            <tr>
                <th>Azonosító</th>
                <th>Email</th>
                <th>Név</th>
                <th>Telefonszám</th>
                <th>Komment</th>
                <th>Termék</th>
                <th>Mennyiség</th>
                <th>Ár</th>
                <th>Legutolsó Módosítás</th>
                <th>Műveletek</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $key => $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->comment }}</td>
                    <td>
                        @foreach( $order->products as $product)
                            @foreach($product->categories as $category)
                                {{$category->name}} -
                                {{$product->name}}
                            @endforeach

                        @endforeach
                    </td>
                    <td>
                        {{ $order->quantity }}
                        @if($order->pType > 10)

                            @foreach($order->regularProducts as $regularProduct)

                                {{$regularProduct->unit->order_unit}}

                            @endforeach

                        @else

                            szeletes

                        @endif
                    </td>
                    <td>{{ $order->amount }} .- Ft</td>
                    <td>{{ $order->created_at }} {{\Carbon\Carbon::parse( $order->created_at)->diffForHumans() }})</td>
                    <td>  @include('order::dashboard.partials._row_delete',['row_id'=> $order->id]) </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    @else
        <p class="alert alert-danger">Nincs megjelenítendő rendelés!</p>
    @endif

@stop
