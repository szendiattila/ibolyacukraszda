<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['email', 'name', 'phone', 'comment', 'product', 'pType', 'quantity', 'amount'];
}
