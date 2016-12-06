<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Category\Entities\Category;
use Modules\Product\Entities\Product;
use Modules\ProductWithUnit\Entities\RegularProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;


use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
    public function index()
    {


        //dd(Config::get('mail'));


        $categories = Category::with('products')->whereHas('products')->get();

        $regularProducts = RegularProduct::with('unit')->get();


        //dd($regularProducts);

        return view('frontend::frontend.product', compact('categories', 'regularProducts'));
    }

    public function products()
    {
        $categories = Category::all();

        dd($categories);

        return view('frontend::frontend.product');
    }

    public function aboutUs()
    {
        //  return 'about Us';
        return view('frontend::frontend.about_us');
    }

    public function contact()
    {
        return view('frontend::frontend.contact');
    }

    public function sweetShop()
    {
        return view('frontend::frontend.sweetShop');
    }

    public function orderForm($id, $quantity)
    {
        dd($id, $quantity);

        //email küldés


        //felugró ablak legyen a rendelés sikerességéről?
        return view('frontend::frontend.order');
    }


    public function order()
    {

        //email küldés


        //felugró ablak legyen a rendelés sikerességéről?
        return view('frontend::frontend.order');
    }

    public function orderAjax(Request $request)
    {
        $id = $request->get('product', '0');

        $pType = $request->get('pType', '0');

        if ($pType == 0) {
            $product = Product::with('categories')->whereId($id)->get()->first();
        } else {
            $product = RegularProduct::with('unit')->whereId($id)->get()->first();
        }


        $quantity = $request->get('quantity', 'no quantity');
        $email = $request->get('email', 'no email');
        $name = $request->get('name', 'no name');
        $comment = $request->get('comment');


        $data = ['product' => $product, 'quantity' => $quantity, 'name' => $name, 'comment' => $comment, 'email' => $email];
//
//        return $data;

//
//        $sendMail = Mail::send('frontend::emails.order', $data, function ($message) use ($email) {
//            $message->from('ibolya@examplee.come', 'Laravel')
//                ->subject('Ibolya cukrászda rendelés');
//
//            $message->to($email); //->cc('bar@example.com');
//
//            // $message->attach($pathToFile);
//        });


        $sendMail = Mail::send('frontend::emails.order', $data,
            function ($message) use ($email) {

                $message->from('ibolya@examplee.come', 'Laravel');

                $message->subject('Rendelés');

                $message->to($email); //->cc('bar@example.com');

            });

        return $sendMail ? 1 : 0;





    }


    public function getProductById($id, $type)
    {

        if ($type == 0) {
            $product = Product::with('categories')->whereId($id)->get()->first();
        } else {
            $product = RegularProduct::with('unit')->whereId($id)->get()->first();
        }

        return $product;
    }


}
