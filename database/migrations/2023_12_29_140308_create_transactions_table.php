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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->float('net_amount')->nullable();
            $table->float('gst')->nullable();
            $table->float('total_amount')->nullable();
            $table->boolean('is_payment_done')->default(false);
            $table->string('payment_by')->nullable();
            $table->boolean('is_agent_paid_premium_amount')->default(false);
            $table->string('policy_no')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
