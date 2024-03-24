<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointRedemptionsTable extends Migration
{
    public function up()
    {
        Schema::create('point_redemptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('agent_id');
            $table->float('points', 10, 2); 
            $table->enum('status', ['rejected','in_progress','completed'])->default('in_progress');
            $table->float('tds', 10, 2)->default(5); 
            $table->float('amount_to_be_paid', 10, 2); 
            $table->timestamps();
            $table->foreign('agent_id')->references('id')->on('agents')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('point_redemptions');
    }
}
