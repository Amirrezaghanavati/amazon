<?php

use App\Models\Market\Coupon;
use App\Models\User;
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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Coupon::class)->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->bigInteger('total_price');
            $table->bigInteger('total_off_price');
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('discount_status')->default(0)->comment('0 => unused 1 => used');
            $table->timestamp('expired_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
