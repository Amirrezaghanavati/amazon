<?php

use App\Models\Market\Cart;
use App\Models\Market\Coupon;
use App\Models\Market\Delivery;
use App\Models\Market\Payment;
use App\Models\User;
use App\Models\User\Address;
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
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Address::class)->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Payment::class)->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Delivery::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Coupon::class)->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Cart::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('address_object')->nullable();
            $table->text('payment_object')->nullable();
            $table->text('delivery_object')->nullable();
            $table->bigInteger('order_final_amount')->nullable();
            $table->bigInteger('order_discount_amount')->nullable();
            $table->bigInteger('order_total_discount_amount')->nullable();
            $table->bigInteger('delivery_amount')->nullable();
            $table->tinyInteger('payment_type')->default(0)->comment('0 => online, 1 => offline');
            $table->tinyInteger('payment_status')->default(0)->comment('0 => pending, 1 => ok, 2 =>failed');
            $table->tinyInteger('delivery_status')->default(0)->comment('0 => pending, 1 => sent, 2 =>refund');
            $table->tinyInteger('order_status')->default(0)->comment('0 => pending, 1 => in progress, 2 => ok, 3 => failed, 4 => refund');
            $table->timestamp('delivery_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
