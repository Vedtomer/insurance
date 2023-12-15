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
        Schema::create('shriramgi', function (Blueprint $table) {
            $table->id();
            $table->string('sno')->nullable(); 
          
            $table->string('proposal_no')->nullable(); 
            $table->string('policy_no')->nullable(); 
            $table->string('branch_code')->nullable(); 
            $table->string('branch_name')->nullable(); 

          
            $table->string('proposal_reg_date')->nullable(); 
            $table->string('policy_issuance_date')->nullable(); 
            $table->string('policy_start_date')->nullable(); 
            $table->string('policy_end_date')->nullable(); 
            $table->string('product_name')->nullable(); 
            $table->string('product_class')->nullable(); 
            $table->string('cust_name')->nullable(); 
            $table->string('insured_name')->nullable(); 
            $table->string('business_source')->nullable(); 
            $table->string('agent_name')->nullable(); 
            $table->string('exec_name')->nullable(); 
            $table->string('broker_name')->nullable(); 
            $table->string('fiancier_type')->nullable(); 
            $table->string('veh_code')->nullable(); 
            $table->string('veh_model_make')->nullable(); 
            $table->string('reg_no')->nullable(); 
            $table->string('veh_engine_no')->nullable(); 
            $table->string('veh_chas_no')->nullable(); 
            $table->string('veh_fst_regn_dt')->nullable(); 
            $table->string('veh_pur_dt')->nullable(); 
            $table->string('gvw')->nullable(); 
            $table->string('seat_capcty_y')->nullable(); 
            $table->string('idv_amoun_t')->nullable(); 
            $table->string('social_others_s')->nullable(); 
            $table->string('locality')->nullable(); 
            $table->string('ncb_perct')->nullable(); 
            $table->string('policy_status')->nullable(); 
            $table->string('gross_premium')->nullable(); 
            $table->string('igst_amount')->nullable(); 
            $table->string('sgst_amount')->nullable(); 
            $table->string('cgst_amount')->nullable(); 

            $table->string('net_premium')->nullable(); 
            $table->unsignedBigInteger('agent_id')->nullable(); 

            $table->foreign('agent_id')->references('id')->on('agent')->onDelete('set null');
          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shriramgi');
    }
};
