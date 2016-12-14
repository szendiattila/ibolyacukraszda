<?php

namespace Modules\ProductWithUnit\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Order\Entities\Order;

class RegularProduct extends Model
{
    protected $fillable = ['name', 'description', 'price', 'unit_id'];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
