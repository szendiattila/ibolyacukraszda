<?php

namespace Modules\Order\Http\Controllers\Frontend;


use Illuminate\Routing\Controller;

use Modules\Order\Entities\Order;
use Modules\Order\Http\Requests\OrderRequest;
use Modules\Product\Entities\Product;
use Modules\ProductWithUnit\Entities\RegularProduct;

use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{


    public function orderAjax(OrderRequest $request)
    {
        $id = $request->get('product', '0');

        $pType = $request->get('pType', '0');

        if ($pType == 0) {
            $product = Product::with('categories')->whereId($id)->get()->first();
        } else {
            $product = RegularProduct::with('unit')->whereId($id)->get()->first();
        }

        $quantity = $request->get('quantity', 'no quantity');
        $email = $request->get('email');
        $name = $request->get('name', 'no name');
        $comment = $request->get('comment');


        $data = ['product' => $product, 'quantity' => $quantity, 'name' => $name, 'comment' => $comment, 'email' => $email];

        Order::create([
            'email' => $email,
            'name' => $name,
            'comment' => $comment,
            'product' => $product->id,
            'pType' => $pType,
            'quantity' => $quantity
        ]);

        $this->sendMail('order::mail.orderOwner', $data, '_kisselek@freemail.hu');


        return $this->sendMail('order::mail.orderCustomer', $data, $email);


    }


    private function sendMail($template, $data, $email)
    {

        return Mail::send($template, $data,
            function ($message) use ($email) {

                $message->from('ibolya@examplee.come', 'Ibolya cukrászda');

                $message->subject('Rendelés');

                $message->to($email);

            });

    }


}
