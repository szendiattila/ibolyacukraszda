<html>
<head>

    <meta charset="utf-8">

    <link rel="stylesheet" href="{{asset('modules/order/css/email.css')}}">
</head>

<body>
<div class="conatiner">
    <div class="row">

        <div class="col-xs-24">

            <p class="email-title">Tisztelt {{$name}}!</p>

            <p class="email-aim">Rendelését rögzítettük, felfogjuk venni önnel a kapcsolatot.</p>

            <label class="email-product-name">{{$product->name}}</label> termékből {{$quantity}}
            @if(get_class($product) == "RegularProduct")

                {{$product->unit->unit}}

                mennyiséget rendelt.

            @else

                @if($quantity == 10)

                    10
                @else
                    20
                @endif
                szeletes torta.

            @endif

            <div class="col-xs-6 email-img">
                <img src="http://www.bbcgoodfood.com/sites/default/files/styles/recipe/public/user-collections/my-colelction-image/2015/12/recipe-image-legacy-id--364184_10.jpg?itok=eWj2NFNK"
                     alt="cake">
            </div>
            <p>Rendelés összege: {{$amount}} Ft</p>
            <p>Megjegyzés: {{$comment}}</p>

        </div>


    </div>

</div>


<br>
Köszönjük a rendelését!

</body>

</html>
