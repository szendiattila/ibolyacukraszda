@extends('frontend::layouts.master')

@php
    $productCounter = 1;
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

                                            {{Form::open(['url' => 'rendeles', 'method' => 'post', 'id' => 'form-'. $productCounter]) }}
                                            {{Form::token()}}
                                            {{Form::hidden('id', $product->id, ['id' => 'id_'.$productCounter])}}
                                            {{Form::hidden('type', 0, ['id' => 'type_'.$productCounter])}}

                                            {{ Form::label('name', $product->name) }}

                                            <div class="row taste-pcs-line">
                                                {{ Form::radio($productCounter.'_'. $product->id .'_pcs_price', 10, true, ['id' => 'radio_'.$productCounter.'_'.$product->id.'_10pcs']) }}
                                                {{ Form::label('radio_'.$productCounter.'_'.$product->id.'_10pcs', '10 szeletes' . $product->_10pcs_price . '.-') }}
                                            </div>
                                            <div class="row taste-pcs-line">
                                                {{ Form::radio($productCounter.'_'. $product->id .'_pcs_price', 20, false, ['id' => 'radio_'.$productCounter.'_'.$product->id.'_20pcs']) }}
                                                {{ Form::label('radio_'.$productCounter.'_'.$product->id.'_20pcs', '20 szeletes' . $product->_20pcs_price . '.-' ) }}
                                            </div>


                                            <p>
                                                <button type="button" class="btn btn-info" id="{{$productCounter}}">
                                                    Megrendelem
                                                </button>
                                            </p>
                                            {{Form::close()}}

                                        </div>
                                        @php
                                            $productCounter++
                                        @endphp
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
                        {{Form::open(['url' => 'rendeles', 'method' => 'get']) }}
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


        @include('frontend::frontend.partials._product_modal')

    @endif

@endsection

@section('scripts')
    @parent
    <script src="{{asset('modules/frontend/js/js.cookie.js')}}"></script>
    <script>

        function modalCakePcsChange(pcs) {
            $('#modal-pcs').val(pcs);
        }

        $(function () {

            var pCounter = null;
            var actualProduct = null;
            var inp = null;

            $('.btn.btn-info').on('click', function () {

                console.log($(this).val());

                // $('#myModal').dialog('open');
                pCounter = this.id;
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

                console.log('type: ' + type);

                $.ajax({
                    url: "getProduct/" + pid + "/" + type,
                    cache: false,
                    success: function (response) {

                        actualProduct = response;


//                        console.dir(response);

                        var orderDescription = orderProductText(response, inp);
//
//                        console.log('actual: ');
//                        console.dir(actualProduct);

                        $('#modal-order-description').html(orderDescription);

                        if (actualProduct.hasOwnProperty('unit_id')) {

                            $('#modal-quantity').val(inp);

                            //$('#myModal').dialog('open');
                            $('#modal-cake-slice-price').hide();
                            $('#modal-quantity-div').show();

                        }
                        else {
                            console.log('input[name=' + pCounter + '_' + actualProduct.id + '_pcs_price');

                            console.log('pcs: ' + $('input[name=' + pCounter + '_' + actualProduct.id + '_pcs_price' + ']:checked', '#form-' + pCounter).val());

                            if ($('input[name=' + pCounter + '_' + actualProduct.id + '_pcs_price' + ']:checked', '#form-' + pCounter).val() == 10) {
                                console.log('checked 10');
                                $('#modal-pcs').val(10);
                                $("#modal-cake-pcs-10").prop("checked", true);
                            }
                            else {
                                console.log('not checked 10');
                                $('#modal-pcs').val(20);
                                $("#modal-cake-pcs-20").prop("checked", true);
                            }

                            console.log(actualProduct._10pcs_price);
                            console.log(actualProduct._20pcs_price);

                            $('#modal-cake-slice-price').show();
                            $('#modal-quantity-div').hide();

                            $('#modal-pcs-10-label').html(actualProduct._10pcs_price);
                            $('#modal-pcs-20-label').html(actualProduct._20pcs_price);


                        }

                        $('#myModal').modal('show');
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

            var _quantity = 0;

            if (product.hasOwnProperty('unit_id')) {
                _quantity = $('#modal-quantity').val();
            }
            else {

                //  _quantity = $('input[name=modal-cake-pcs]:checked', '#modal-form-id').val();
                _quantity = $('#modal-pcs').val();
            }

            console.log('rendelni kívánt mennyiség: ' + _quantity);


            var pType = 0;

            if (product.hasOwnProperty('unit_id')) {
                pType = 1;
            }


            $.ajax({
                url: "/rendeles-veglegesites-ajax",
                type: 'post',
                data: {
                    product: product.id,
                    quantity: _quantity,
                    pType: pType,
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
//            console.log('product: ');
//            console.dir(product);

            var result = 'Termék neve: ';

            if (!product.hasOwnProperty('unit_id')) {

                return result + product.categories[0].name + ' - ' + product.name;
            }
            else {
                result += product.name + '<br>Termék ára:' + product.price;
                result += '.-' + product.unit.unit + "<br>Kívánt mennyiség: " + inp + " " + product.unit.order_unit + "<br>"
                        + "Ára: ";
                if (validateQuantity()) {

                    result += ((product.price / product.unit.change_number) * inp) + ' Ft.';

                }
                else {
                    result += 'Nem meghatározható!';
                }

                return result;
            }


        }


    </script>

@endsection
