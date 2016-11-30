<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Category\Entities\Category;

class Product extends Model
{
    protected $fillable = ['name', 'image', 'description', 'category_id', '_10pcs_price', '_20pcs_price'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
