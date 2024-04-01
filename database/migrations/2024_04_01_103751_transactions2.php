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
        Schema::create('transactions2', function (Blueprint $table) {
            $table->id();
            $table->float('amount')->nullable();
            $table->float('agent_id')->nullable();
            $table->string('payment_mode')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('payment_date')->nullable();
          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('transactions2');
    }
};
