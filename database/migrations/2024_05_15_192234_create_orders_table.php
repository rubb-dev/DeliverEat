<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->enum("status",["unpaid", "paid"]);
            $table->decimal("total_price", 6, 2);
            $table->unsignedBigInteger("cart_id");
            $table->string("checkout_session_id");
            $table->string("name");
            $table->unsignedBigInteger("phone");
            $table->string("city");
            $table->string("direction");
            $table->string("direction_extra_info")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
