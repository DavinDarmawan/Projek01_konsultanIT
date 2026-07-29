<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('technologies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('icon', 50)->nullable();  // bootstrap icon
            $table->string('color', 20)->nullable(); // hex color
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('technologies');
    }
};