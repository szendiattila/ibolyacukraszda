<?php

namespace Modules\Cake\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Category\Entities\Category;

class Cake extends Model
{
    protected $fillable = ['name', 'image', 'description', 'category_id', '10pcs_price', '20pcs_price'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
