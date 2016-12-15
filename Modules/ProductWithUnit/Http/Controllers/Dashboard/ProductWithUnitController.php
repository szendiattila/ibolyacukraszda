<?php

namespace Modules\ProductWithUnit\Http\Controllers\Dashboard;

use App\Http\Controllers\FileUploadController;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ProductWithUnit\Entities\RegularProduct;
use Modules\ProductWithUnit\Entities\Unit;
use Modules\ProductWithUnit\Http\Requests\ProductWithUnitRequest;

class ProductWithUnitController extends Controller
{
    public function index()
    {
        $products = RegularProduct::paginate();

        return view('productwithunit::dashboard.index', compact('products'));
    }

    public function create()
    {
        $units = Unit::pluck('unit', 'id');

        return view('productwithunit::dashboard.create', compact('units'));
    }

    public function store(ProductWithUnitRequest $request)
    {
        RegularProduct::create($request->input());

        return redirect('dashboard/productwithunit')->with('successMessage', 'Sikeres termék felvétel');;
    }

    public function edit(RegularProduct $productwithunit)
    {
        $units = Unit::pluck('unit', 'id');

        return view('productwithunit::dashboard.edit', compact('productwithunit', 'units'));
    }

    public function update(RegularProduct $productwithunit, ProductWithUnitRequest $request)
    {

        $productwithunit->update($request->input());

        return redirect('dashboard/productwithunit')->with('successMessage', 'Sikeres termék frissítés');;
    }

    public function destroy(RegularProduct $productwithunit)
    {
        $productwithunit->delete();

        return redirect('dashboard/productwithunit')->with('successMessage', 'Sikeres termék törlés');;
    }

}
