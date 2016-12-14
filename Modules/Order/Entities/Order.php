<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Product\Entities\Product;
use Modules\ProductWithUnit\Entities\RegularProduct;

class Order extends Model
{
    protected $fillable = ['email', 'name', 'phone', 'comment', 'product', 'pType', 'quantity', 'amount'];


    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function regularProducts()
    {
        return $this->belongsToMany(RegularProduct::class);
    }


}
