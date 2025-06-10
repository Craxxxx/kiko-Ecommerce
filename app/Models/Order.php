<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'category_id',
        'color_id',
        'order_date_time',
        'status_pembayaran',
        'status_produksi',
        'total_harga',
    ];

    protected $casts = [
        'order_date_time' => 'datetime',
        'total_harga'     => 'decimal:2',
    ];

    /**
     * The customer who placed this order.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * The shirt category selected for this order.
     */
    public function category()
    {
        return $this->belongsTo(ShirtCategory::class);
    }

    /**
     * The color selected for this order.
     */
    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    /**
     * The payment record for this order (one-to-one).
     */
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
