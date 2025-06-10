<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\DB;
return new class extends Migration
{
   public function up()
{
    Schema::create('customers', function (Blueprint $table) {
        $table->id();
        $table->string('customer_name');
        $table->string('customer_phone_number')->nullable();
        $table->string('email')->nullable();
        $table->text('alamat_pengiriman');
        $table->timestamp('created_at')->useCurrent();
    });

    // Then add the CHECK constraint manually:
    DB::statement(<<<SQL
        ALTER TABLE `customers`
        ADD CONSTRAINT chk_contact
        CHECK (customer_phone_number IS NOT NULL OR email IS NOT NULL)
    SQL
    );
}

    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
