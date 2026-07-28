<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('company_infos', function (Blueprint $table) {
            $table->id();
            $table->text('address')->nullable();
            $table->string('email', 100)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('whatsapp', 20)->nullable();
            $table->text('map_embed')->nullable();
            $table->json('social_media')->nullable(); // simpan array sosial media
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('company_infos');
    }
};