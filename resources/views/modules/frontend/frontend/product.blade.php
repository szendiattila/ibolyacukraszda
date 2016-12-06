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
                        {{ Form::open(['url' => 'rendeles', 'method' => 'get']) }}
                        {{Form::token()}}
                        {{Form::hidden('id', $regularProduct->id, ['id' => 'id_'.$productCounter])}}
                        {{Form::hidden('type', 1, ['id' => 'type_'.$productCounter])}}
                        {{--     {{Form::hidden('name', $regularProduct->name, ['id' => 'name_'.$productCounter])}}
                           {{Form::hidden('unit', $regularProduct->unit->unit, ['id' => 'unit_'.$productCounter])}}
                           {{Form::hidden('unit_order', $regularProduct->unit->unit_order, ['id' => 'unit_order_'.$productCounter])}}
                       --}}
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
                            <button type="submit" class="btn btn-info" data-toggle="modal" data-target="#myModal"
                                    id="{{$productCounter}}">Megrendelem
                            </button>
                        </td>
                        {{Form::close()}}
                    </tr>
                @endforeach
            </table>
        </div>


        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Rendelés</h4>
                    </div>
                    <div class="modal-body">
                        <label>Email cím:</label><input type="text" name="email" id="modal-email" value=""><br>
                        <label>Email megjegyzése, a további megrendelések felgyorsításához:</label>
                        <input type="checkbox" name="email-remember" id="modal-email-remember" value="false"><br>
                        <label>Rendelés adatai:</label>
                        <div id="modal-order-description"></div>
                        <br>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal" id="modal-order-btn">Rendelés
                            leadása
                        </button>

                        <button type="button" class="btn btn-default" data-dismiss="modal">Mégsem</button>
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


            var actualProduct = null;
            var inp = null;

            $('.btn.btn-info').on('click', function () {


                // $('#myModal').dialog('open');

                console.log(this.id);

                inp = $('#inp_' + this.id).val();
                var pid = $('#id_' + this.id).val();
                var type = $('#type_' + this.id).val();

                /*
                 var name = $('#name_' + this.id).val();
                 console.dir(inp);
                 console.dir(pid);

                 console.dir(type);
                 console.log(name);
                 */

                $.ajax({
                    url: "getProduct/" + pid + "/" + type,
                    cache: false,
                    success: function (respone) {

                        actualProduct = respone[0];

                        var orderDescription = orderProductText(respone[0], inp);

                        $('#modal-order-description').html(orderDescription);

                        //$('#myModal').dialog('open');
                        $('#myModal').modal('show');

                        console.log(respone);
                    }
                });

                return false;
            });


            $('#modal-order-btn').on('click', function () {

                var email = $('#modal-email').val();

                if ($.trim(email).length == 0) {

                    alert('Please enter valid email address');

                    return false;
                }

                if (validateEmail(email)) {

                    alert('Email is valid');

                    var successOrder = sendOrder(actualProduct, inp, email);
                    if (successOrder) {

                        alert('Sikeres rendelés');
                        return true;
                    }
                    else {
                        alert('Sikertelen rendelés, kérem próbálja meg később!');
                        return false;
                    }

                }

                else {

                    alert('Invalid Email Address');

                    return false;

                }


            });


        });


        function sendOrder(product, quantity, email) {

            var result = false;

            $.ajaxSetup(
                    {
                        headers: {
                            'X-CSRF-Token': $('input[name="_token"]').val()
                        }
                    });

            $.ajax({
                url: "/rendeles-veglegesites-ajax",
                type: 'post',
                data: {
                    product: product,
                    quantity: quantity,
                    email: email
                },
                cache: false,
                success: function (response) {

                    result = response;
                    console.log(response);
                }
            });

            return result;
        }


        function validateEmail(email) {
            var emailReg = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
            return emailReg.test(email);

        }

        function orderProductText(product, inp) {

            var result = 'Termék neve: ' + product.name + '<br>Termék ára:' + product.price;

            if (product.unit_id == 0) {


            }
            else {

                result += '.-' + product.unit.unit + ", " + inp + "<br>Kívánt mennyiség: " + product.unit.order_unit + "<br>"
                        + "Várható ár: " + ((product.price / product.unit.change_number) * inp) + ' Ft.';


            }

            return result;
        }


    </script>

@endsection
