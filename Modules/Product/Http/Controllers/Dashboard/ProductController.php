<?php

namespace Modules\Product\Http\Controllers\Dashboard;

use App\Http\Controllers\FileUploadController;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Category\Entities\Category;
use Modules\Product\Entities\Product;
use Modules\Product\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->paginate(2);

        return view('product::dashboard.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id');

        return view('product::dashboard.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $imageName = FileUploadController::storeImage($request, 'image', 'product', true, 200, 200);

        $request->request->add(['image' => $imageName]);
        Product::create(
            $request->input()
        );

        return redirect('dashboard/product');
    }

    public function edit($id)
    {
        $categories = Category::pluck('name', 'id');
        $product = Product::findOrFail($id);


        return view('product::dashboard.edit', compact('product', 'categories'));
    }

    public function update(Product $product, Request $request)
    {

        if ($request->file('image')) {
            $oldImageName = Product::find($product->id)->image;


            $newImageName = FileUploadController::storeImage($request, 'image', 'product', true);


            $request->request->add(['image' => $newImageName]);

        }

//       dd($oldImageName, $product->image, $request->get('image'), $request->input());

        $product->update($request->input());

        (isset($oldImageName)) ? FileUploadController::removeFile($oldImageName, 'product', true) : null;

        return redirect('dashboard/product');
    }

    public function destroy(Product $product)
    {
        FileUploadController::removeFile($product->image, 'product', true);
        $product->delete();

        return redirect('dashboard/product');
    }


}
