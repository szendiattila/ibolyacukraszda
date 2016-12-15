<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Category\Entities\Category;
use Modules\Order\Emails\OrderCustomerEmail;
use Modules\Order\Entities\Order;
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
        return view('frontend::frontend.aboutUs');

    }

    public function contact()
    {

        return view('frontend::frontend.contact');

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
