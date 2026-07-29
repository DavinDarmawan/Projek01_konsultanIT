<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ctas', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('subtitle')->nullable();
            $table->string('button_text', 100)->nullable();
            $table->string('button_link', 255)->nullable();
            $table->string('background_color', 20)->nullable()->default('#1a1a1a');
            $table->string('button_color', 20)->nullable()->default('#f9d342');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ctas');
    }
};