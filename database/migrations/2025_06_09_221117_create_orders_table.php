<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // order_id
            $table->foreignId('customer_id')
                  ->constrained('customers')
                  ->restrictOnDelete()
                  ->cascadeOnUpdate();
            $table->foreignId('category_id')
                  ->constrained('shirt_categories')
                  ->restrictOnDelete()
                  ->cascadeOnUpdate();
            $table->foreignId('color_id')
                  ->constrained('colors')
                  ->restrictOnDelete()
                  ->cascadeOnUpdate();

            $table->timestamp('order_date_time')->useCurrent();
            $table->string('status_pembayaran');
            $table->string('status_produksi');
            $table->decimal('total_harga', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
