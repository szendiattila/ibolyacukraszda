<?php

namespace Modules\ProductWithUnit\Entities;

use Illuminate\Database\Eloquent\Model;

class RegularProduct extends Model
{
    protected $fillable = ['name', 'description', 'price', 'unit_id',];


    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

}
