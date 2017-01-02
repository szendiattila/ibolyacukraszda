@extends('dashboard::layouts.master')
@include('shared._sweetalert2')
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
        <table class="table table-responsive table-hover">
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
                <th>Státusz</th>
                <th>Legutolsó Módosítás</th>
                <th>Műveletek</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders->items() as $key => $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>
                        @if(isset($order->comment) && $order->comment != "")

                            <a href="#" data-toggle="popover" data-trigger="hover" data-content="{{ $order->comment }}">Megjegyzés
                                szöveg</a>
                        @else
                            Nincs megjegyzés
                        @endif

                    </td>
                    <td>
                        @if($order->pType > 10)
                            {{$order->regularProducts->first()->name}}

                        @else
                            @foreach( $order->products as $product)
                                @foreach($product->categories as $category)
                                    {{$category->name}} -
                                    {{$product->name}}
                                @endforeach

                            @endforeach

                        @endif
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
                    <td>{{Form::select('status', $statuses, $order->status->id, ['id' => 'status_' . $order->id, 'data-id' => $order->id, 'class' => 'form-control orderStatus'])}}</td>
                    <td>{{ $order->created_at }} {{\Carbon\Carbon::parse( $order->created_at)->diffForHumans() }})</td>
                    <td>  @include('order::dashboard.partials._row_delete',['row_id'=> $order->id]) </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="row">
            <div class="col-xs-24 col-xs-offset-6">
                {!!  $orders->render() !!}
                @else
                    @if(app('request')->input('page') > 1)

                    @else
                        <p class="alert alert-danger">Nincs megjelenítendő rendelés!</p>
                    @endif
                @endif
            </div>
        </div>
@stop

@section('scripts')
    @parent

    <script>


        $('.orderStatus').change(function () {

            var orderId = $(this).attr('data-id');
            var orderStatus = $(this).val();

            console.log(orderId + ' ___ ' + orderStatus);

            sendOrderStatus(orderId, orderStatus);
        });


        function sendOrderStatus(orderId, orderStatus) {

            $.ajaxSetup(
                    {
                        headers: {
                            'X-CSRF-Token': $('input[name="_token"]').val()
                        }
                    });


            $.ajax({
                url: "order-status-change-ajax",
                type: 'post',
                data: {
                    orderId: orderId,
                    statusId: orderStatus
                },
                cache: false,
                success: function (response) {

                    console.log(response);
                    if (response == "OK") {
                        orderStatusChangefeedBack(true, 'Sikeres módosítás', 'Sikeres rendelés státusz módosítás.');
                    }
                    else {

                        orderStatusChangefeedBack(false, 'Sikertelen módosítás', 'Valamilyen hiba történt, próbálja meg később');
                    }
                },
                error: function (response) {

                    orderStatusChangefeedBack(false, 'Sikertelen módosítás', 'Valamilyen hiba történt, próbálja meg később');
                }
            });
        }


        function orderStatusChangefeedBack(success, titleM, message) {
            swal({
                type: (success) ? "success" : "error",
                title: titleM,
                text: message,
                timer: 1000,
                showConfirmButton: true,
            });

        }


        $('.orderDelete').on('click', function (e) {
            e.preventDefault();
            swal(
                    {
                        title: "Törlés",
                        text: "Biztos, hogy törölni akarja ezt a megrendelést?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: 'Törlés!',
                        cancelButtonText: "Mégsem!",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    })
                    .then(function () {
                        console.dir(e.target.value);
                        console.log('#formId_' + e.target.value);
                        $('#formId_' + e.target.value).submit();
                    })
            ;
        });

        $(document).ready(function () {
            $('[data-toggle="popover"]').popover();
        });
    </script>

@endsection
