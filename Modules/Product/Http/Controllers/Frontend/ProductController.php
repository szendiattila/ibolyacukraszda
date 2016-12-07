<?php

namespace Modules\Product\Http\Controllers\frontend;


use Illuminate\Routing\Controller;
use Modules\Product\Entities\Product;
use Modules\ProductWithUnit\Entities\RegularProduct;

class ProductController extends Controller
{
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
