<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','description','price','image_url','stock_quantity'];

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
