@extends('frontend::layouts.master')

@php
    $productCounter = 0;
@endphp
@section('content')


    @if(count($categories) > 0)


        @foreach($categories as $category)
            <div class="content-cake">
                @if($category->type == 0)
                    <div class="well">{{$category->name}}</div>
                    <p class="category-detail">{{$category->description_above}}</p>

                    <div class="cake-container">


                        @foreach($category->products as $product)

                            @php
                                $productCounter++
                            @endphp


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




                        @endforeach


                    </div>
                @else


                    <div class="taste-box well">


                        <div class="row col-md-12">

                            <div class="col-md-3">
                                <img src="{{$category->products->first()->image}}" class="taste-img">
                            </div>

                            <div class="taste-text col-md-9">

                                <p class="category-detail .text-capitalize">{{$category->name}}</p>
                                <p class="category-detail">{{$category->description_above}}</p>
                                <div class="row col-md-12">

                                    @foreach($category->products as $product)

                                        <div class="taste-box col-md-4">

                                            <p>{{$product->name}}</p><br>
                                            <p>{{$product->_10pcs_price}}</p><br>
                                            <p>{{$product->_20pcs_price}}</p><br>
                                            <p>
                                                <button type="button" class="btn btn-info">Megrendelés</button>
                                            </p>


                                        </div>
                                    @endforeach


                                </div>

                            </div>

                        </div>


                    </div>

                @endif

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
                                {{ Form::number('quantity', 1, ['class' => 'form-control', 'placeholder' => 'Írja be a mennyiséget.',
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
                    <div class="modal-body form-group">
                        <label>Email cím:</label>
                        <input type="text" name="email" id="modal-email" value="" class="form-control">
                        <div id="modal-email-error" style="display: none;" class="alert-danger">
                            Nem megfelelő email cím!
                        </div>
                    </div>

                    <div class="modal-body form-group">
                        <label>Név:</label>
                        <input type="text" name="name" id="modal-name" value="" class="form-control">
                        <div id="modal-name-error" style="display: none;" class="alert-danger">
                            Adja meg a nevét kérem!
                        </div>
                    </div>

                    <div class="modal-body form-group">
                        <label>Megjegyzés:</label>
                        <input type="text" name="comment" id="modal-comment" value="" class="form-control">
                    </div>

                    <div class="modal-body form-group">
                        <label>Mennyiség:</label>
                        <input type="number" name="quantity" id="modal-quantity" class="form-control" value="1" min="1"
                               step="1" max="999999">
                        <div id="modal-quantity-error" style="display: none;" class="alert-danger">
                            A mennyiségnek pozitív számjegynek kell lennie
                        </div>
                    </div>

                    <div class="modal-body form-group">
                        <label>Email és Név megjegyzése, a további megrendelések felgyorsításához:</label>
                        <input type="checkbox" name="order-data-remember" id="modal-order-data-remember" value="false"
                               class=""><br>
                    </div>

                    <div class="modal-body form-group">
                        <label>Rendelés adatai:</label>
                        <div id="modal-order-description"></div>
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
    <script src="{{asset('modules/frontend/js/js.cookie.js')}}"></script>
    <script>

        $(function () {


            var actualProduct = null;
            var inp = null;

            $('.btn.btn-info').on('click', function () {


                // $('#myModal').dialog('open');

                $('#modal-email-error').hide();
                $('#modal-name-error').hide();
                $('#modal-quantity-error').hide();

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

                        $('#modal-quantity').val(inp);
                        //$('#myModal').dialog('open');
                        $('#myModal').modal('show');

                        console.log(respone);
                    }
                });

                return false;
            });


            $('#modal-order-btn').on('click', function () {

                if (validateInputs()) {

                    var successOrder = sendOrder(actualProduct);

                    console.log('rendelés sikeressége: ' + successOrder);
                    if (successOrder) {

                        alert('Sikeres rendelés');
                        return true;
                    }
                    else {
                        alert('Sikertelen rendelés, kérem próbálja meg később!');
                        return false;
                    }


                }


                return false;


            });


            $('#modal-quantity').keyup(function () {
                var orderDescription = orderProductText(actualProduct, $('#modal-quantity').val());
                $('#modal-order-description').html(orderDescription);
            });


        });

        function validateInputs() {

            var result = true;

            var email = $('#modal-email').val();

            if ($.trim(email).length == 0) {
                result = false;
                $('#modal-email-error').show();
            }
            else {

                if (validateEmail(email)) {
                    $('#modal-email-error').hide();
                }
                else {

                    result = false;
                    $('#modal-email-error').show();
                }

            }

            var customerName = $('#modal-name').val();
            if (customerName.length < 5) {
                result = false;
                $('#modal-name-error').show();
            }
            else {
                $('#modal-name-error').hide();
            }


            return result && validateQuantity();
        }

        function validateQuantity() {
            var qty = $('#modal-quantity').val();

            if (qty.match(/^\d+$/) && (qty > 0)) {
                $('#modal-quantity-error').hide();
                return true;
            }
            else {
                $('#modal-quantity-error').show();
                return false;

            }
        }

        function sendOrder(product) {

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
                    quantity: $('#modal-quantity').val(),
                    email: $('#modal-email').val(),
                    name: $('#modal-name').val(),
                    comment: $('#modal-comment').val()
                },
                cache: false,
                success: function (response) {

                    console.log('resp: ' + response);

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
                result += '.-' + product.unit.unit + "<br>Kívánt mennyiség: " + inp + " " + product.unit.order_unit + "<br>"
                        + "Ára: ";
                if (validateQuantity()) {

                    result += ((product.price / product.unit.change_number) * inp) + ' Ft.';

                }
                else {
                    result += 'Nem meghatározható!';
                }

            }

            return result;
        }


    </script>

@endsection
