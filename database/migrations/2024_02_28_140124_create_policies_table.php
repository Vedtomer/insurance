<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; 
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('policies', function (Blueprint $table) {
            $table->id();
            $table->string('policy_no');
            $table->timestamp('policy_start_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('policy_end_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('customername');
            $table->decimal('agent_commission', 8, 2)->nullable();
            $table->unsignedBigInteger('agent_id')->nullable();
            $table->boolean('is_agent_commission_paid')->default(false);
            $table->enum('status', ['Paid', 'Unpaid', 'Partial_Paid'])->default('Unpaid');
            $table->decimal('net_amount', 8, 2);
            $table->decimal('gst', 8, 2);
            $table->decimal('premium', 8, 2);
            $table->string('insurance_company');
            $table->enum('payment_by', ['DEALER', 'SELF'])->nullable();
            $table->timestamps(); // Automatically adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('policies');
    }
};
