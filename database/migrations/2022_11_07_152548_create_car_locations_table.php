<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('car_locations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_id')->constrained();
            $table->foreignId('location_id')->constrained();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('car_locations');
    }
};
