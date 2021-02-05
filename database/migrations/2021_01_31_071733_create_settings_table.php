<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            // Meta Info
            $table->string('name')->nullable();
            $table->string('discription')->nullable();
            $table->string('keywords')->nullable();
            $table->string('author')->nullable();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            // Open Graph
            $table->string('og_title')->nullable();
            $table->string('og_discription')->nullable();
            $table->string('og_image')->nullable();
            // Organization Information
            $table->json('phone_no')->nullable();
            $table->string('address')->nullable();
            $table->json('email')->nullable();
            $table->string('map')->nullable();
            // Site Information
            $table->text('excerpt')->nullable();
            $table->text('about_us')->nullable();
            $table->text('why_us')->nullable();
            $table->json('slogan')->nullable();
            $table->string('banner')->nullable();
            // Social Media
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
