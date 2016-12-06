<html>
<head>

    <meta charset="utf-8">
</head>

<body>

<p>Rendelés az Ibolya cukrászdából</p>

{{$product->name}} termékből {{$quantity}} mennyiséget rendelt.

@if(get_class($product) == "RegularProduct")

    Ez egy mértékegységes termék


@else

    Nornmál torta termék

@endif

<br>
Köszönjük a rendelését!

</body>

</html>
