<?php

namespace Modules\Category\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Product\Entities\Product;

class Category extends Model
{
    protected $fillable = ['name', 'description_above', 'description_below', 'type'];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
