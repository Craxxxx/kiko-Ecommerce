<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
     use HasFactory;

    protected $fillable = [
        'order_id',
        'tanggal_bayar',
        'metode_pembayaran',
        'status_pembayaran',
        'bukti_pembayaran',
    ];

    protected $casts = [
        'tanggal_bayar' => 'datetime',
    ];

    /**
     * The order that this payment belongs to.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
