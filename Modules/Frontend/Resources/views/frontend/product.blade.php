@extends('frontend::layouts.master')

@section('content')

    @if(count($categories) > 0)

        <div class="content-cake">

            @foreach($categories as $category)
                <div class="well">{{$category->name}}</div>
                <p class="category-detail">{{$category->description_above}}</p>


                @foreach($category->products as $product)


                    <div class="cake-container">
                        <div class="cake" id="product-{{$product->id}}">
                            <div class="cake-header">
                                {{$product->name}}
                            </div>

                            <div>
                                <img src="images/product/{{$product->image}}" class="cake-img">

                            </div>
                            <div style="display: none">
                                {{$product->description}}
                                10 szeletes ára:
                                {{$product->_10pcs_price}}
                                20 szeletes ára:
                                {{$product->_20pcs_price}}

                                <button class="btn alert-success">Megrendelés</button>
                            </div>

                        </div>

                    </div>



                @endforeach

                <p class="category-detail">{{$category->description_above}}</p>

            @endforeach
        </div>

    @else

        <p>Nincs elérhető termék lista, kérlek nézz vissza később!</p>

    @endif





@endsection
