<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Category\Entities\Category;
use Modules\Order\Entities\Order;

class Product extends Model
{
    protected $fillable = ['name', 'image', 'description', '_10pcs_price', '_20pcs_price'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function getCategoryListAttribute()
    {
        return $this->categories->pluck('id')->all();
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
