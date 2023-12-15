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
    public function up(): void
    {
        Schema::create('agent', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable(); 
            $table->string('password');
            $table->string('state')->nullable(); 
            $table->string('city')->nullable(); 
            $table->string('address')->nullable(); 
            $table->string('mobile_number')->nullable(); 
            $table->tinyInteger('status')->default(1); 
            $table->string('commission'); 
            $table->enum('commission_type', ['fixed', 'percentage']);

            $table->unsignedBigInteger('agent_id')->nullable(); 

            $table->foreign('agent_id')->references('id')->on('agent')->onDelete('set null');
          
            $table->timestamps();
        });


        
         // New foreign key column
    // Schema::table('agent', function (Blueprint $table) {
    //     $table->unsignedBigInteger('royalsundaram_id')->nullable(); 

     
    //     $table->foreign('royalsundaram_id')->references('id')->on('royalsundaram')->onDelete('set null');
        
    // }); 
    // Schema::table('agent', function (Blueprint $table) {
    //     $table->unsignedBigInteger('shriramgi_id')->nullable(); 

     
    //     $table->foreign('shriramgi_id')->references('id')->on('shriramgi')->onDelete('set null');
        
    // }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agent');
    }
};
