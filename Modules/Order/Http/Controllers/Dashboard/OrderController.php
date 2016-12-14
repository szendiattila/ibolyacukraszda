<?php

namespace Modules\Order\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Order\Entities\Order;
use Modules\Product\Entities\Product;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {

        $orders1 = Order::with('products', 'products.categories')->where('pType', '<=', 10)->get();
        $orders2 = Order::with('regularProducts', 'regularProducts.unit')->where('pType', '>', 10)->get();


        $orders = $orders1->merge($orders2);
        $orders->sortByDesc('created_at');


        //dd($orders->values()->all());


        return view('order::dashboard.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('order::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('order::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);

        if(isset($order) ){
            $delete = $order->delete();
        }


        $mess = ($delete) ? "<div class='alert alert-success'>Sikeres törlés</div>" : "<div class='alert alert-warning'>Nem sikerült törölni.</div>";

        return redirect()->back()->with('orderMessage', $mess);

    }
}
