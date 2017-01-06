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
        $products = Product::with('categories')->paginate();

        return view('product::dashboard.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id');

        return view('product::dashboard.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $categoryId = $request->get('category_list', 1);

        $type = Category::select('type')->whereId($categoryId)->pluck('type')->first();

        $request->request->add(['type' => $type]);

        $imageName = FileUploadController::storeImage($request, 'image', 'product', true, 200, 200);

        $request->request->add(['image' => $imageName]);

        $product = Product::create($request->input());

        $product->categories()->sync($request->input('category_list'));

        return redirect('dashboard/product')->with('successMessage', 'Sikeres termék felvétel');
    }

    public function edit(Product $product)
    {
        $categories = Category::pluck('name', 'id');

        return view('product::dashboard.edit', compact('product', 'categories'));
    }

    public function update(Product $product, ProductRequest $request)
    {

        if ($request->file('image')) {
            $this->handleImage($product, $request);
        }

        $product->update($request->input());

        $product->categories()->sync($request->input('category_list'));

        return redirect('dashboard/product')->with('successMessage', 'Sikeres termék módosítás');
    }

    public function destroy(Product $product)
    {
        $this->deleteImage($product);

        $product->delete();

        return redirect('dashboard/product')->with('successMessage', 'Sikeres termék törlés');
    }

    /**
     * @param Product $product
     * @param Request $request
     */
    private function handleImage(Product $product, Request $request)
    {
        if ($request->file('image')) {
            $this->deleteImage($product);

            $newImageName = FileUploadController::storeImage($request, 'image', 'product', true);

            $request->request->add(['image' => $newImageName]);
        }
    }

    /**
     * @param Product $product
     */
    private function deleteImage(Product $product)
    {
        FileUploadController::removeFile($product->image, 'product', true);
    }


}
