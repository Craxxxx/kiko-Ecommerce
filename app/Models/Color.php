<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Color extends Model
{
    use HasFactory;

    protected $fillable = [
        'color_name',
    ];

    /**
     * A color can be used on many orders.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
