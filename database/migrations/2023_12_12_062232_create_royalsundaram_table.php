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
        Schema::create('royalsundaram', function (Blueprint $table) {
            $table->id();
            $table->string('branch')->nullable(); 
            $table->string('userid')->nullable(); 
            $table->string('policy')->nullable(); 
            $table->string('prody666yhuct')->nullable(); 
            $table->string('covernotenumber')->nullable(); 
            $table->string('covernoteissuedate')->nullable(); 
            $table->string('creationdate')->nullable(); 
            $table->string('lastmodifiedby')->nullable(); 
            $table->string('lastmodifiedtime')->nullable(); 
            $table->string('businessstatus')->nullable(); 
            $table->string('policyholder')->nullable(); 
            $table->string('oacode')->nullable(); 
            $table->string('inceptiondate')->nullable(); 
            $table->string('expirydate')->nullable(); 
            $table->string('make')->nullable(); 
            $table->string('model')->nullable(); 
            $table->string('chassisno')->nullable(); 
            $table->string('engineno')->nullable(); 
            $table->string('registrationnumber')->nullable(); 
            $table->string('contractnumber')->nullable(); 
            $table->string('policypremium')->nullable(); 
            $table->string('idv')->nullable(); 
            $table->string('loading')->nullable(); 
            $table->string('oddiscount')->nullable(); 
            $table->string('covpremium')->nullable(); 
            $table->string('ncd')->nullable(); 
            $table->string('assettype')->nullable(); 
            $table->string('vehicle_inspection_report')->nullable(); 
            $table->string('inspection_date')->nullable(); 
            $table->string('service_providername')->nullable(); 
            $table->string('vir_number')->nullable(); 
            $table->string('fraud_indicator')->nullable(); 
            $table->string('fraud_reason')->nullable(); 
            $table->string('receipt_number')->nullable(); 
            $table->string('policy_type')->nullable(); 
            $table->string('enginecapacity')->nullable(); 
            $table->string('engine_capacity_slab')->nullable(); 
            $table->string('vehicle_fuel_type')->nullable(); 
            $table->string('vehicleage')->nullable(); 
            $table->string('vehicle_slab')->nullable(); 
            $table->string('business_type')->nullable(); 
            $table->string('channel')->nullable(); 
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
        Schema::dropIfExists('royalsundaram');
    }
};
