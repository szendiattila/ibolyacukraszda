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

        $product = $this->getProductByType($id, $pType);

        //$data = ['product' => $product, 'quantity' => $quantity, 'name' => $name, 'comment' => $comment, 'email' => $email];

        Order::create([
            'email' => $email,
            'name' => $name,
            'comment' => $comment,
            'product' => $product->id,
            'pType' => $pType,
            'quantity' => $quantity
        ]);


        $amount = $this->calculatePrice($product,$quantity,$pType);

        return $this->sendMail(OrderCustomerEmail::class, $email, $name, $comment, $product, $pType, $quantity, $amount);


    }


    private function sendMail(Mailable $template, $email, $name, $comment, $product, $pType, $quantity, $amount)
    {

        /*
        return Mail::send($template, $data,
            function ($message) use ($email) {

                $message->from('ibolya@examplee.come', 'Ibolya cukrászda');

                $message->subject('Rendelés');

                $message->to($email);

            });
        */

        return Mail::to($email)->send(new $template($email,$name,$comment, $product, $pType, $quantity, $amount));

    }


    public function calculatePrice($product, $quantity, $pType)
    {
        if ($pType == 0) {
            return ($quantity == 10) ? $product->_10pcs_price :
                ($quantity == 20) ? $product->_20pcs_price : "Hiba történt az ár kiszámítása közben!";
        } else {
            return ($product->price / $product->unit->change_number) * $quantity;
        }

    }


    public function getProductByType($id, $pType)
    {

        if ($pType == 0) {
            return Product::with('categories')->whereId($id)->get()->first();
        } else {
            return RegularProduct::with('unit')->whereId($id)->get()->first();
        }
    }


}
