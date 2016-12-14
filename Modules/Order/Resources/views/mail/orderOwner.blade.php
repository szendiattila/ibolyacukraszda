<html>
<head>

    <meta charset="utf-8">

    <style>

        .content {
            width: 90%;
        }

        .parent {
            display: flex;
            padding-bottom: 5px;
        }

        .narrow {
            width: 200px;
            /* Just so it's visible */
        }

        .wide {
            flex: 1;
        }


    </style>


</head>

<body>
<div class="conatiner">
    <div class="row">

        <div class="col-xs-24">

            <h2>Megrendelés - Ibolya cukrászda</h2>


            <div class="content">

                <h3>Ügyfél adatai</h3>

                <div class="parent">
                    <div class="narrow">
                        <label>Név: </label>
                    </div>
                    <div class="wide">
                        <label>{{$name}} </label>
                    </div>
                </div>

                <div class="parent">
                    <div class="narrow">
                        <label>Email: </label>
                    </div>
                    <div class="wide">
                        <label>{{$email}} </label>
                    </div>
                </div>

                <div class="parent">
                    <div class="narrow">
                        <label>Telefonszám: </label>
                    </div>
                    <div class="wide">
                        <label>{{$phone}} </label>
                    </div>
                </div>

                <div class="parent">
                    <div class="narrow">
                        <label>Megjegyzés: </label>
                    </div>
                    <div class="wide">
                        <label>{{$comment}} </label>
                    </div>
                </div>


                <h3>Termék adatai</h3>

                <div class="parent">
                    <div class="narrow">
                        <label>
                            Kategória - név:

                        </label>
                    </div>
                    <div class="wide">
                        <label>

                            @if($pType > 10)
                                Édes és Sós sütemények -
                            @else

                                {{$product->categories->first()->name}} -
                            @endif
                            <label class="email-product-name">{{$product->name}}</label>


                        </label>
                    </div>
                </div>


                <div class="parent">
                    <div class="narrow">
                        <label>Mennyiség: </label>
                    </div>
                    <div class="wide">
                        <label>{{$quantity}}
                            @if($pType > 10)

                                {{$product->unit->unit}}

                            @else

                                szeletes

                            @endif

                        </label>
                    </div>
                </div>


                <div class="parent">
                    <div class="narrow">
                        <label>Termék ára: </label>
                    </div>
                    <div class="wide">
                        <label>
                            @if($pType > 10)

                                {{$product->price}}

                            @else


                                @if($quantity == 10)
                                    {{$product->_10pcs_price}}
                                @else
                                    {{$product->_20pcs_price}}
                                @endif

                            @endif
                            .- Ft
                        </label>
                    </div>
                </div>


                <div class="parent">
                    <div class="narrow">
                        <label>
                            Rendelés azonosító:

                        </label>
                    </div>
                    <div class="wide">
                        <label>
                            {{$orderId}}
                        </label>
                    </div>
                </div>

            </div>

        </div>


    </div>

</div>


</body>

</html>
