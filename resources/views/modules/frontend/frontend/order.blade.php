@extends('frontend::layouts.master')

@section('content')


    {{ Form::open(['url' => 'rendeles']) }}
    {{Form::token()}}
    {{Form::hidden('id', $regularProduct->id, ['id' => 'id_'.$productCounter])}}





    {{Form::close()}}

@endsection