<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShirtCategory extends Model
{
     use HasFactory;

    // Table is 'shirt_categories' by convention.

    protected $fillable = [
        'category_name',
        'description_shirt',
        'base_price',
        'image',
        'duration_days',
    ];

    /**
     * A category can be associated with many orders.
     */
    public function orders()
    {
        return $this->hasMany(Order::class, 'category_id');
    }
}
