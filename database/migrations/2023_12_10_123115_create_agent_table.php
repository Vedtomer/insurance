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
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable(); 
            $table->string('password');
            $table->string('state')->nullable(); 
            $table->string('city')->nullable(); 
            $table->string('address')->nullable();
            $table->string('mobile_number');
            $table->tinyInteger('status')->default(1); 
            $table->unsignedBigInteger('commission_id')->nullable(); 
            $table->timestamps();
        });
        DB::statement("ALTER TABLE agents AUTO_INCREMENT = 10000;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agents');
    }
};
