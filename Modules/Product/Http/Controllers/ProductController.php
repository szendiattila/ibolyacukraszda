<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\FileUpload;
use Illuminate\Routing\Controller;
use Modules\Category\Entities\Category;
use Modules\Product\Entities\Product;
use Modules\Product\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->paginate();

        return view('product::dashboard.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id');

        return view('product::dashboard.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $imageName = FileUpload::storeImage($request, 'image', 'product', true, 200, 200);

        $request->request->add(['image' => $imageName]);
        Product::create(
            $request->input()
        );

        return redirect('dashboard/product');
    }

    public function edit()
    {
        $categories = Category::pluck('name', 'id');

        return view('product::dashboard.edit', compact('categories'));
    }

    public function update(Product $product, Request $request)
    {
        $product->update($request->all());

        return redirect('dashboard/product');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect('dashboard/product');
    }


}
