<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Category\Entities\Category;

class FrontendController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        dd($categories);

        return view('frontend::frontend.product');
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

    public function order()
    {

        //email küldés


        //felugró ablak legyen a rendelés sikerességéről?
        return view('frontend::frontend.product');
    }


}
