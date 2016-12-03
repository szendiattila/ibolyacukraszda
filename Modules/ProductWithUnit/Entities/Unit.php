<?php

namespace Modules\ProductWithUnit\Entities;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = ['unit', 'order_unit', 'change_number'];


    public function regularProducts()
    {
        return $this->hasMany(RegularProduct::class);
    }
}
