<?php

namespace Modules\Category\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Product\Entities\Product;

class Category extends Model
{
    protected $fillable = ['name', 'description'];

    public function cakes()
    {
        return $this->hasMany(Product::class);
    }
}
