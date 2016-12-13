@extends('frontend::layouts.master')
@include('shared._sweetalert2')

@php
    $productCounter = 1;
@endphp
@section('content')

    <input type="hidden" id="radio_cake_pcs" value="10">

    @if(count($categories) > 0)
        <div class="row">
            @foreach($categories as $category)
                <div class="col-xs-24 content-cake mb20">
                    @if($category->type == 0)

                        <div class="row">
                            <div class="col-xs-24">
                                <div class="well content-title p10">
                                    <h2>{{$category->name}}</h2>
                                </div>
                                <div class="category-detail">{{$category->description_above}}</div>
                            </div>
                        </div>


                        <div class="row">
                            @foreach($category->products as $key => $product)
                                @php
                                    $productCounter++
                                @endphp
                                <div class="col-xxs-24 col-xs-12 col-sm-8 col-md-6 col-lg-4 cake-item"
                                     id="product-{{$product->id}}" data-id="{{ $key+1 }}">

                                    <input type="hidden" id="product-{{$product->id}}id_{{$key+1}}"
                                           value="{{$product->id}}">
                                    <input type="hidden" id="product-{{$product->id}}category_{{$key+1}}"
                                           value="{{$category->name}}">
                                    <input type="hidden" id="product-{{$product->id}}cid_{{$key+1}}"
                                           value="{{$productCounter}}">
                                    <input type="hidden" id="product-{{$product->id}}image_{{$key+1}}"
                                           value="{{$product->image}}">
                                    <input type="hidden" id="product-{{$product->id}}name_{{$key+1}}"
                                           value="{{$product->name}}">
                                    <input type="hidden" id="product-{{$product->id}}description_{{$key+1}}"
                                           value="{{$product->description}}">
                                    <input type="hidden" id="product-{{$product->id}}_10pcs_price_{{$key+1}}"
                                           value="{{$product->_10pcs_price}}">
                                    <input type="hidden" id="product-{{$product->id}}_20pcs_price_{{$key+1}}"
                                           value="{{$product->_20pcs_price}}">
                                    <input type="hidden" id="choiced-cake-quantity-{{$key+1}}"
                                           value="10">

                                    <div class="cake">
                                        <div class="cake-header">
                                            {{$product->name}}
                                        </div>
                                        <div class="cake-img">
                                            {{--<img src="images/product/{{$product->image}}" class="cake-img">--}}
                                            <img src="" alt="{{$product->name}}">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="row">

                            <div class="col-xs-24 background-white">

                                <div class="row">

                                    <div class="col-xs-24 well">

                                        <div class="row">

                                            <div class="col-xs-24 col-sm-8">
                                                <img src="" class="taste-img">

                                            </div>

                                            <div class="col-xs-24 col-sm-15">

                                                <p class="content-title-taste">{{$category->name}}</p>
                                                <p class="category-detail">{{$category->description_above}}</p>

                                                <div class="row">

                                                    @foreach($category->products as $product)
                                                        <div class="col-xs-24 col-sm-7 tastes-box">
                                                            @php
                                                                $productCounter++
                                                            @endphp
                                                            {{Form::open(['url' => 'rendeles', 'method' => 'post', 'id' => 'form-'. $productCounter]) }}
                                                            {{Form::token()}}
                                                            {{Form::hidden('id', $product->id, ['id' => 'id_'.$productCounter])}}
                                                            {{Form::hidden('type', 0, ['id' => 'type_'.$productCounter])}}
                                                            {{ Form::label('name', $product->name) }}
                                                            <div class="row">
                                                                {{ Form::radio($productCounter.'_pcs_price', 10, true, ['id' => 'radio_'.$productCounter.'_10pcs']) }}
                                                                {{ Form::label('radio_'.$productCounter.'_10pcs', '10 szeletes' . $product->_10pcs_price . '.-') }}
                                                            </div>
                                                            <div class="row">
                                                                {{ Form::radio($productCounter.'_pcs_price', 20, false, ['id' => 'radio_'.$productCounter.'_20pcs']) }}
                                                                {{ Form::label('radio_'.$productCounter.'_20pcs', '20 szeletes' . $product->_20pcs_price . '.-' ) }}
                                                            </div>
                                                            <p>
                                                                <button type="button" class="btn btn-info orderButton"
                                                                        data-pcid="{{$productCounter}}"
                                                                        data-pid="{{$product->id}}"
                                                                        data-ptype={{$product->type}}
                                                                        data-pname="{{$product->name}}"
                                                                        data-p10pcsprice="{{$product->_10pcs_price}}"
                                                                        data-p20pcsprice="{{$product->_20pcs_price}}"
                                                                        data-pdescription="{{$product->description}}"
                                                                        data-pimage="{{$product->image}}"
                                                                        data-category="{{$category->name}}"

                                                                >
                                                                    Megrendelem
                                                                </button>
                                                            </p>
                                                            {{Form::close()}}
                                                        </div>

                                                    @endforeach

                                                </div>

                                            </div>

                                        </div>

                                    </div>


                                </div>

                            </div>

                        </div>
                    @endif
                    @if($category->type == 0)
                        @if($category->type)
                            <div class="col-xs-24 category-detail">
                                {{$category->description_above}}
                            </div>
                        @endif
                    @endif
                </div>
            @endforeach
        </div>
    @else
        <p>Nincs elérhető termék lista, kérlek nézz vissza később!</p>
    @endif
    @if(isset($regularProducts) && count($regularProducts) > 0)

        <div class="row">

            <div class="col-xs-24 background-white">

                <div class="well content-title">Rendelhető édes és sós sütemények</div>
                <div class="col-xs-16 col-xs-offset-4">
                    @foreach($regularProducts as $regularProduct)
                        @php
                            $productCounter++
                        @endphp

                        <div class="row mb5">

                            {{Form::open(['url' => 'rendeles', 'method' => 'get']) }}
                            {{Form::token()}}
                            {{Form::hidden('id', $regularProduct->id, ['id' => 'id_'.$productCounter])}}
                            {{Form::hidden('type', 1, ['id' => 'type_'.$productCounter])}}

                            <div class="col-xs-24 col-sm-10 col-md-10">
                                {{$regularProduct->name}}
                                @if(isset($regularProduct->description))
                                    <p>/{{$regularProduct->description}}/</p>
                                @endif
                            </div>
                            <div class="col-xs-24 col-sm-4 col-sm col-md-4">
                                {{$regularProduct->price}}
                                .-{{$regularProduct->unit->unit}}
                            </div>
                            <div class="col-xs-20 col-sm-4 col-md-4">
                                {{ Form::number('quantity', 1, ['class' => 'form-control col-xs-3', 'placeholder' => 'Írja be a mennyiséget.',
                                        'min' => 1, 'max' => 999999, 'step' => 1, 'id' => 'inp_'.$productCounter]) }}
                            </div>
                            <div class="col-xs-4 col-sm-2 col-md-2">
                                {{$regularProduct->unit->order_unit}}
                            </div>
                            <div class="col-xs-24 col-sm-4 col-md-4">
                                <button type="button" class="btn btn-info orderButton"
                                        data-pcid="{{$productCounter}}"
                                        data-pid="{{$regularProduct->id}}"
                                        data-ptype="99"
                                        data-pname="{{$regularProduct->name}}"
                                        data-pprice="{{$regularProduct->price}}"
                                        data-punit="{{$regularProduct->unit->unit}}"
                                        data-porderunit="{{$regularProduct->unit->order_unit}}"
                                        data-pchangenumber="{{$regularProduct->unit->change_number}}"
                                        data-pdescription="{{$regularProduct->description}}"
                                        data-pimage="{{$regularProduct->image}}"

                                >
                                    Megrendelem
                                </button>
                            </div>
                            {{Form::close()}}

                        </div>


                    @endforeach
                </div>

            </div>


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

        function getScreenWidth() {

            return $(window).width();
        }

        function numberOfCakesInRow() {

            var width = getScreenWidth();

            if (width <= 320)
                return 1;
            if (width > 320 && width <= 480)
                return 2;
            if (width > 480 && width < 768)
                return 3;
            if (width >= 768 && width < 992)
                return 4;
            else
                return 6;
        }

        function getCakeDescriptionTemplate(id, ob) {

            var pre = "#" + $(ob).attr("id");

            var counter = $(pre + 'counter_' + id).val();

            console.log(counter);

            var pcid = $(pre + 'cid_' + id).val();
            var pid = $(pre + 'id_' + id).val();
            var name = $(pre + 'name_' + id).val();
            var img = $(pre + 'image_' + id).val();
            var image = $(ob).find(".cake-img").html();
            var description = $(pre + 'description_' + id).val();
            var _10pcs_price = $(pre + '_10pcs_price_' + id).val();
            var _20pcs_price = $(pre + '_20pcs_price_' + id).val();
            var category = $(pre + 'category_' + id).val();


            var button =
                    '<button type="button" class="btn btn-info orderButton" id="megrendelButton" ' +
                    'data-pcid="' + pcid + '" ' +
                    'data-pid="' + pid + '" ' +
                    'data-ptype="0" ' +
                    'data-pname="' + name + '" ' +
                    'data-p10pcsprice="' + _10pcs_price + '" ' +
                    'data-p20pcsprice="' + _20pcs_price + '" ' +
                    'data-pdescription="' + description + '" ' +
                    'data-pimage="' + img + '" ' +
                    'data-category="' + category + '" ' +
                    '>Megrendelem</button>';

            var template = '<div class="col-xs-24"><div class="well cake-item-details">' +
                    '<div class="row">' +
                    '<div class="col-xs-1"><</div><div class="col-xs-8">' +
                    image + '</div> ' +
                    '<div class="col-xs-14"> <div class="row"> <div class="col-xs-24"> ' +
                    '<p>' + name + '</p> <p>' + description + '</p> ' +
                    '</div> </div> ' +
                    '<div class="row"> <div class="col-xs-24"> ' +
                    '<div class="row"> ' +
                    '<div class="col-xs-12"> ' +
                    '<p><input type="radio" checked name="_pcs_price_order' + id + '" id="_10_pcs_price_order' + id + '" onchange="choicedCakeSize(10)"> <label for="_10_pcs_price_order' + id + '">10 szeletes:' + _10pcs_price + '.-</p> ' +
                    '<p><input type="radio" name="_pcs_price_order' + id + '" id="_20_pcs_price_order' + id + '" onchange="choicedCakeSize(20)"> <label for="_20_pcs_price_order' + id + '">20 szeletes:' + _20pcs_price + '.-</p> ' +
                    '</div> ' +
                    '<div class="col-xs-12"> ' +
                    button +
                    '</div> </div> </div> </div> </div> ' +
                    '<div class="col-xs-1">></div> </div> </div></div> ';

            return template;
        }

        function choicedCakeSize(value) {
            console.log('change value to ' + value);
            $('#radio_cake_pcs').val(value);
        }


        $(function () {

            var actualProduct = null;

            $('.orderButton').on('click', function () {

                orderProduct(this);

            });

            window.orderProduct = function (obj) {

                var product = null;

                var obj = $(obj);


                if (obj.attr('data-ptype') > 10) {


                    console.log('up');
                    product = {
                        cid: obj.attr('data-pcid'),
                        id: obj.attr('data-pid'),
                        type: obj.attr('data-ptype'),
                        name: obj.attr('data-pname'),
                        unit: obj.attr('data-punit'),
                        orderUnit: obj.attr('data-porderunit'),
                        price: obj.attr('data-pprice'),
                        changeNumber: obj.attr('data-pchangenumber'),
                        description: obj.attr('data-pdescription'),
                        image: obj.attr('data-pimage')

                    };
                }
                else {

                    console.log('rp');

                    product = {
                        cid: obj.attr('data-pcid'),
                        id: obj.attr('data-pid'),
                        type: obj.attr('data-ptype'),
                        name: obj.attr('data-pname'),
                        _10pcs_price: obj.attr('data-p10pcsprice'),
                        _20pcs_price: obj.attr('data-p20pcsprice'),
                        description: obj.attr('data-pdescription'),
                        image: obj.attr('data-pimage'),
                        category: obj.attr('data-category')

                    };

                }

                console.dir(product);

                actualProduct = product;

                megrendelModal(product);
            };

            $(".cake-item").click(function () {

               // $("#myModal").on("hidden.bs.modal", function () {}

                $('#radio_cake_pcs').val(10);



                $(".cake-item-details").remove();
                var di = $(this).attr("data-id");

                var template = getCakeDescriptionTemplate(di, this);

                console.log("data-id:" + di);
                // var cake_datas = di.split('_');

                //alert(cake_datas[1]);

                var numberOfCakes = numberOfCakesInRow();
                console.log('number of cakes: ' + numberOfCakes);

                var last = Math.ceil(di / numberOfCakes) * numberOfCakes;
                var max = $(this).parent().find(".cake-item").last().attr("data-id");
                if (last > max) {
                    last = max;
                }
                $(this).parent().find(".cake-item[data-id=" + last + "]").after(template);


                $("#megrendelButton").click(function () {

                    // console.log("hurrá rákkat a " + $(this).val() + " értékű buttonra");
                    orderProduct(this);
                });

            });


            $('#modal-order-btn').on('click', function () {

                        if (validateInputs()) {

                            var successOrder = sendOrder(actualProduct);

                            console.log('rendelés sikeressége: ' + successOrder);


                            if (successOrder == 1) {

                                $('#modal-order-succes').show();
                            }
                            else {
                                $('#modal-order-error').show();

                            }


                        }


                        return false;


                    }
            );


            $('#modal-quantity').keyup(function () {
                var orderDescription = orderProductText(actualProduct, $('#modal-quantity').val());
                $('#modal-order-description').html(orderDescription);
            });


        });


        function modalInit(product, inp, orderDescription) {

            console.log('modal init: ' + inp);
            console.dir(product);
            console.dir(orderDescription);


            $('#modal-order-succes').hide();
            $('#modal-order-error').hide();

            $('#modal-email-error').hide();
            $('#modal-name-error').hide();
            $('#modal-quantity-error').hide();

            $('#modal-order-description').html(orderDescription);

            if (product.type > 10) {

                $('#modal-quantity').val(inp);

                //$('#myModal').dialog('open');
                $('#modal-cake-slice-price').hide();
                $('#modal-quantity-div').show();

            }
            else {

                if (inp == 10) {
                    console.log('checked 10');
                    $('#modal-pcs').val(10);
                    $("#modal-cake-pcs-10").prop("checked", true);
                }
                else if (inp == 20) {

                    $('#modal-pcs').val(20);
                    $("#modal-cake-pcs-20").prop("checked", true);
                }
                else {
                    $('#modal-pcs').val(10);
                    $("#modal-cake-pcs-10").prop("checked", true);

                }


                $('#modal-cake-slice-price').show();
                $('#modal-quantity-div').hide();

                $('#modal-pcs-10-label').html(product._10pcs_price);
                $('#modal-pcs-20-label').html(product._20pcs_price);


                $('#myModal').modal('show');

            }
        }

        function getQuantity(product) {
            var inp = 0;

            if (product.type == 0) {

                inp = $('#radio_cake_pcs').val();
            }
            else if (product.type == 1) {
                //'radio_'.$productCounter.'_10pcs'
                //$("#radio_1").prop("checked", true)
                //radio_75_10pcs


                _10pcs = $('#radio_' + product.cid + '_10pcs').is(":checked");
                if (_10pcs == true) {
                    inp = 10;
                }
                else {
                    _20pcs = $('#radio_' + product.cid + '_20pcs').is(":checked");

                    if (_20pcs == true) {
                        inp = 20;
                    }
                    else {
                        inp = 10;
                    }
                }
            }
            else {

                inp = $('#inp_' + product.cid).val();
            }


            return inp;
        }

        function megrendelModal(product) {

            var quantity = getQuantity(product);


            var orderDescription = orderProductText(product, quantity);


            modalInit(product, quantity, orderDescription);

            $('#myModal').modal('show');


            return false;
        }


        $(function () {





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

            var result = 1;

            $.ajaxSetup(
                    {
                        headers: {
                            'X-CSRF-Token': $('input[name="_token"]').val()
                        }
                    });

            var _quantity = 0;

            if (product.type > 10) {
                _quantity = $('#modal-quantity').val();
            }
            else {

                //  _quantity = $('input[name=modal-cake-pcs]:checked', '#modal-form-id').val();
                _quantity = $('#modal-pcs').val();
            }

            console.log('rendelni kívánt mennyiség: ' + _quantity);
            console.log('send order: ' + result);




            $.ajax({
                url: "/rendeles-veglegesites-ajax",
                type: 'post',
                data: {
                    product: product.id,
                    quantity: _quantity,
                    pType: product.type,
                    email: $('#modal-email').val(),
                    name: $('#modal-name').val(),
                    comment: $('#modal-comment').val()
                },
                cache: false,
                success: function (response) {

                    console.log('resp: ' + response);

                    result = response;
                    console.log(response);

                    return response;
                }
            });


            console.log('send order: ' + result);

            return result;
        }


        function validateEmail(email) {
            var emailReg = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
            return emailReg.test(email);

        }

        function orderProductText(product, inp) {
            //            console.log('product: ');
            //            console.dir(product);

            console.log('mennyiség: ' + inp);

            var result = 'Termék neve: ';

            console.dir(product);

            if (product.type > 10) {

                result += product.name + '<br>Termék ára:' + product.price;
                result += '.-' + product.unit + "<br>Kívánt mennyiség: " + inp + " " + product.orderUnit + "<br>"
                        + "Ára: ";
                if (validateQuantity()) {

                    result += ((product.price / product.changeNumber) * inp) + ' Ft.';

                }
                else {
                    result += 'Nem meghatározható!';
                }

                return result;

            }
            else {
                return result + product.category + ' - ' + product.name;

            }


        }


    </script>
@endsection