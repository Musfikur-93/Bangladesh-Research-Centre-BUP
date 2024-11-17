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
            $table->string('phone_one')->nullable();
            $table->string('phone_two')->nullable();
            $table->string('main_email')->nullable();
            $table->string('support_email')->nullable();
            $table->string('video_url')->nullable();
            $table->string('fax')->nullable();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('link_one')->nullable();
            $table->string('link_two')->nullable();
            $table->string('link_three')->nullable();
            $table->string('link_four')->nullable();
            $table->string('link_five')->nullable();
            $table->string('copyright')->nullable();
            $table->text('address')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
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
