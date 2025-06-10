<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Customer extends Model
{
    use HasFactory;

    // If you named your table differently, uncomment:
    // protected $table = 'customers';

    protected $fillable = [
        'customer_name',
        'customer_phone_number',
        'email',
        'alamat_pengiriman',
    ];

    /**
     * A customer can have many orders.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
