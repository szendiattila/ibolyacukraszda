@extends('dashboard::layouts.master')
@include('dashboard::layouts.partials._confirmation')
@php
$modul = 'menu';
@endphp
@section('title', config('ibolya.title_prefix') . 'Menükezelő')

@section('content')
    <h1>Menüpontok:</h1>
    <div><a class="btn btn-success" href="{{ url('dashboard/menu/create') }}">Új menüpont hozzáadása</a></div>
    @if(count($menus) > 0)

        <ul>
            <li style="list-style-type: none;">
                <div class="row">
                    <div class="col-xs-2">#</div>
                    <div class="col-xs-2">Megnevezés</div>
                    <div class="col-xs-3">Létrehozva</div>
                    <div class="col-xs-3">Módosítva</div>
                    <div class="col-xs-2">Műveletek</div>
                </div>
            </li>
        </ul>
        <ul class="sortable" data-onChange="saveOrder('{{ csrf_token() }}', 'menus');">
            @foreach($menus as $key => $menu)
                <li class="sort-item" id="{{ $menu->id }}">
                    <div class="sortable-item row">
                        <div class="col-xs-2">{{ $key + 1 }}</div>
                        <div class="col-xs-2">{{ $menu->name }}</div>
                        <div class="col-xs-3">{{ $menu->created_at }} - {{ $menu->created_at->diffForHumans() }}</div>
                        <div class="col-xs-3">{{ $menu->updated_at }} - {{ $menu->updated_at->diffForHumans() }}</div>
                        <div class="col-xs-2">
                            @include('dashboard::layouts.partials._row_actions_min',['row_id'=> $menu->id])
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <p class="alert alert-danger">Nincs megjelenítendő menüpont!</p>
    @endif

@stop

@section('style')
    @parent
    <link href="{{ url('/js/jquery/jquery_ui.css') }}" rel="stylesheet"/>
    <link href="{{ url('/plugins/nestedSortable/dashboard.nestedSortable.css') }}" rel="stylesheet"/>
@stop

@section('script')
    @parent
    <script src="{{ url('/js/jquery/jquery.js') }}"></script>
    <script src="{{ url('/js/jquery/jquery_ui.js') }}"></script>
    <script src="{{ url('/plugins/nestedSortable/jquery.mjs.nestedSortable.js') }}"></script>
    {{--<script src="{{ url('js/dashboard/change_order.js') }}"></script>--}}

    <script>
        function saveOrder(tkn, table)
        {
            console.log(tkn, table)
            let order = {};

            $( ".sort-item" ).each(function(key) {
                order[parseInt($(this).attr('id'))] = key + 1;
            });

            $.ajaxSetup({
                headers:
                {
                    'X-CSRF-TOKEN': tkn
                }
            });

            $.ajax({
                type: 'post',
                url: 'change-list-order',
                data: {
                    order: order,
                    table: table
                },
                success: function (response) {
                    if(response){
                        alert('Sikeresen megváltoztattas a menü sorrendjét');
                        //swal({
                        //    title: 'Siker',
                        //    text: "A sorrend megváltozott",
                        //    type: 'success',
                        //    buttonsStyling: true
                        //})
                    }
                }
            });

        }

        $(function(){

            $('.sortable').nestedSortable({
                handle: 'div',
                items: 'li',
                listType: "ul",
                toleranceElement: '> div',
                //disableNesting: "no-nest",
                maxLevels: 1,
                excludeRoot : false,
                update : function()
                {
                    var oU = $(this).attr("data-onChange"); // oU = on update :)
                    if(oU !='')
                    {
                        eval(oU);
                    }
                }
            });

        });

    </script>
@stop
