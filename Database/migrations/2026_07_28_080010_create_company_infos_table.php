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

    $table->string('company_name');

    $table->text('about')->nullable();

    $table->text('vision')->nullable();

    $table->longText('mission')->nullable();

    $table->string('logo')->nullable();

    $table->string('address')->nullable();

    $table->string('email')->nullable();

    $table->string('phone')->nullable();

    $table->string('whatsapp')->nullable();

    $table->longText('map_embed')->nullable();

    $table->json('social_media')->nullable();

    $table->timestamps();
});
    }

    public function down()
    {
        Schema::dropIfExists('company_infos');
    }
};