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

        .logo {
            width: 100%;
            height: auto;
        }


    </style>


</head>

<body>
<div class="conatiner">
    <div class="row">

        <div class="col-xs-24">

            <h2>Rendelés - Ibolya cukrászda</h2>

            <img src="{{url('/public/modules/order/image/mail/mail_logo.jpg')}}" alt="ibolya cukrászda logó"
                 class="logo"/>

            <div class="content">

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
                            <label class="email-product-name">{{$product->name}}</label> termékből.


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

                <p>Köszönjük rendelését!</p>
                <p>Munkatársunk, hamarosan fel veszi önnel a kapcsolatot.</p>

            </div>

        </div>


    </div>

</div>


</body>

</html>
