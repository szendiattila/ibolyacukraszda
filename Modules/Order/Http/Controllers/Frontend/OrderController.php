<?php

namespace Modules\Order\Http\Controllers\Frontend;


use Illuminate\Contracts\Mail\Mailable;
use Illuminate\Routing\Controller;

use Modules\Order\Emails\OrderCustomerEmail;
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

        $quantity = $request->get('quantity', 'no quantity');
        $email = $request->get('email');
        $name = $request->get('name', 'no name');
        $comment = $request->get('comment');
        $phone = 'Nincs';

        $product = $this->getProductByType($id, $pType);

        Order::create([
            'email' => $email,
            'name' => $name,
            'comment' => $comment,
            'product' => $product->id,
            'pType' => $pType,
            'quantity' => $quantity
        ]);


        $amount = $this->calculatePrice($product, $quantity, $pType);

        $data = [
            'product' => $product,
            'pType' => $pType,
            'quantity' => $quantity,
            'name' => $name,
            'comment' => $comment,
            'email' => $email,
            'amount' => $amount,
            'phone' => $phone
        ];

        $this->sendMail('order::mail.orderOwner', $email, $data);
        $this->sendMail('order::mail.orderCustomer', $email, $data);

        return 1;

    }


    private function sendMail($template, $email, $data)
    {

        Mail::send($template, $data,
            function ($message) use ($email) {

                $message->from('csaccount04@gmail.com', 'Ibolya cukrászda');

                $message->subject('Rendelés');

                $message->to($email);

            });

        // return Mail::to($email)->send(new $template($email,$name,$comment, $product, $pType, $quantity, $amount));

    }


    public function calculatePrice($product, $quantity, $pType)
    {
        if ($pType == 0 || $pType == 1) {
            return ($quantity == 10) ? $product->_10pcs_price :
                ($quantity == 20) ? $product->_20pcs_price : "Hiba történt az ár kiszámítása közben!";
        } else {
            return ($product->price / $product->unit->change_number) * $quantity;
        }

    }


    public function getProductByType($id, $pType)
    {

        if ($pType == 0 || $pType == 1) {
            return Product::with('categories')->whereId($id)->get()->first();
        } else {
            return RegularProduct::with('unit')->whereId($id)->get()->first();
        }
    }


}
