<?php

namespace Modules\Category\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Cake\Entities\Cake;

class Category extends Model
{
    protected $fillable = ['name'];

    public function cakes()
    {
        return $this->hasMany(Cake::class);
    }
}
