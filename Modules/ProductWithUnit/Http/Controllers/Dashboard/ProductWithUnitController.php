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
        $imageName = FileUploadController::storeImage($request, 'image', 'product', true, 200, 200);

        $request->request->add(['image' => $imageName]);

        RegularProduct::create($request->input());

        return redirect('dashboard/productwithunit');
    }

    public function edit(RegularProduct $productwithunit)
    {
        $units = Unit::pluck('unit', 'id');

        return view('productwithunit::dashboard.edit', compact('productwithunit', 'units'));
    }

    public function update(RegularProduct $productwithunit, ProductWithUnitRequest $request)
    {
        $this->handleImage($productwithunit, $request);

        $productwithunit->update($request->input());

        return redirect('dashboard/productwithunit');
    }

    public function destroy(RegularProduct $productwithunit)
    {
        $this->deleteImage($productwithunit);

        $productwithunit->delete();

        return redirect('dashboard/productwithunit');
    }

    /**
     * @param RegularProduct $product
     * @param Request $request
     */
    private function handleImage(RegularProduct $product, Request $request)
    {
        if ($request->file('image')) {
            $this->deleteImage($product);

            $newImageName = FileUploadController::storeImage($request, 'image', 'product', true);

            $request->request->add(['image' => $newImageName]);
        }
    }

    /**
     * @param RegularProduct $product
     */
    private function deleteImage(RegularProduct $product)
    {
        FileUploadController::removeFile($product->image, 'product', true);
    }
}
