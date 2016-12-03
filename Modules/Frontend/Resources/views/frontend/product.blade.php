@extends('frontend::layouts.master')

@php
    $productCounter = 0;
@endphp
@section('content')


    @if(count($categories) > 0)


        @foreach($categories as $category)
            <div class="content-cake">
                <div class="well">{{$category->name}}</div>
                <p class="category-detail">{{$category->description_above}}</p>

                <div class="cake-container">

                    @foreach($category->products as $product)
                        @php
                            $productCounter++
                        @endphp
                        @if($product->type != 0)

                            <div class="taste-box">


                            </div>


                        @else



                            <div class="cake" id="product-{{$product->id}}">
                                <div class="cake-header">
                                    {{$product->name}}
                                </div>

                                <div>
                                    {{--<img src="images/product/{{$product->image}}" class="cake-img">--}}
                                    <img src="{{$product->image}}" class="cake-img">


                                </div>
                                {{--<div style="display: none">--}}
                                {{--{{$product->description}}--}}
                                {{--10 szeletes ára:--}}
                                {{--{{$product->_10pcs_price}}--}}
                                {{--20 szeletes ára:--}}
                                {{--{{$product->_20pcs_price}}--}}

                                {{--<button class="btn alert-success">Megrendelés</button>--}}
                                {{--</div>--}}

                            </div>


                        @endif

                    @endforeach

                </div>
                <p class="category-detail">{{$category->description_above}}</p>

            </div>
        @endforeach

    @else

        <p>Nincs elérhető termék lista, kérlek nézz vissza később!</p>

    @endif


    @if(isset($regularProducts) && count($regularProducts) > 0)

        <div class="content-cake">
            <div class="well">Rendelhető édes és sós sütemények</div>
            <table class="table table-hover">
                @foreach($regularProducts as $regularProduct)
                    @php
                        $productCounter++
                    @endphp
                    <tr>
                        {{ Form::open(['url' => 'rendeles']) }}

                        {{Form::hidden('id', $regularProduct->id, ['id' => 'id_'.$productCounter])}}
                        {{Form::hidden('type', 1, ['id' => 'type_'.$productCounter])}}
                        {{Form::hidden('name', $regularProduct->name, ['id' => 'name_'.$productCounter])}}

                        <td>{{$regularProduct->name}}
                            @if(isset($regularProduct->description))
                                <br>/{{$regularProduct->description}}/
                            @endif
                        </td>
                        <td>{{$regularProduct->price}}.-{{$regularProduct->unit->unit}}</td>
                        <td>
                            <div class="row">
                                {{ Form::number('quantity', null, ['class' => 'form-control', 'placeholder' => 'Írja be a mennyiséget.',
                                'min' => 1, 'max' => 999999, 'step' => 1, 'id' => 'inp_'.$productCounter]) }}
                                {{$regularProduct->unit->order_unit}}
                            </div>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"
                                    id="{{$productCounter}}">Megrendelem
                            </button>
                        </td>
                        {{Form::close()}}
                    </tr>
                @endforeach
            </table>
        </div>

        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                        <p>Some text in the modal.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>




    @endif

@endsection

@section('scripts')
    @parent

    <script>

        $(function () {

            $('.btn.btn-info').on('click', function () {


                $('#myModal').dialog('open');

                console.log(this.id);

                var inp = $('#inp_' + this.id).val();
                var pid = $('#id_' + this.id).val();
                var type = $('#type_' + this.id).val();
                var name = $('#name_' + this.id).val();
                console.dir(inp);
                console.dir(pid);

                console.dir(type);
                console.log(name);

                return false;
            });

        })


    </script>

@endsection
