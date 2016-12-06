<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use Modules\Category\Entities\Category;
use Modules\Product\Entities\Product;
use Modules\ProductWithUnit\Entities\RegularProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class FrontendController extends Controller
{
    public function index()
    {
        $categories = Category::with('products')->whereHas('products')->get();

        $regularProducts = RegularProduct::with('unit')->get();

        return view('frontend::frontend.product', compact('categories', 'regularProducts'));
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
        return view('frontend::frontend.order');
    }

    public function orderAjax(Request $request)
    {
        return Mail::send('frontend::emails.order', $request->all(), function ($message) use ($request) {
            $message
                ->from('ibolya@examplee.come', 'Laravel')
                ->subject('Ibolya cukrászda rendelés')
                ->to($request->input('email'));
        });
    }

    public function getProductById($id, $type)
    {

        if ($type == 0) {
            $product = Product::find($id);
        } else {
            $product = RegularProduct::with('unit')->whereId($id)->get();
        }

        return $product;
    }


}
