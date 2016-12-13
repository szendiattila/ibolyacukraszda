@extends('dashboard::layouts.master')
@include('dashboard::layouts.partials._confirmation')
@php
    $modul = 'order';
    $newString = 'Rendelés';
@endphp
@section('title', config('ibolya.title_prefix') . 'Rendelés kezelő')


@section('content')

    <h1>Rendelések:</h1>

    @if(count($orders) > 0)
    <table class="table table-responsive">
        <thead>
        <tr>
            <th>#</th>
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
                    <td><a href="category/{{ $order->id }}/edit">{{ $key + 1 }}</a></td>
                    <td>{{$order->id}}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->comment }}</td>
                    <td>{{ $order->product }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->amount }}</td>
                    <td>{{ $order->created_at }} ({{ $order->created_at->diffForHumans() }})</td>
                    <td>  @include('dashboard::layouts.partials._row_actions_min',['row_id'=> $order->id]) </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @else
    <p class="alert alert-danger">Nincs megjelenítendő rendelés!</p>
    @endif

    <a class="btn btn-success" href="{{ url('dashboard/order/create') }}">Új rendelés hozzáadása</a>
@stop
