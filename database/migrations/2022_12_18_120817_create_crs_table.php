<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crs', function (Blueprint $table) {
            $table->id();
            $table->string('cr_image')->nullable();
            $table->string('cr_name')->nullable();
            $table->string('slug')->nullable();
            $table->string('cr_designation')->nullable();
            $table->string('cr_atitle')->nullable();
            $table->text('cr_amessage')->nullable();
            $table->string('cr_profile')->nullable();
            $table->string('cr_degree')->nullable();
            $table->string('cr_experience')->nullable();
            $table->string('cr_dept')->nullable();
            $table->string('cr_ctitle')->nullable();
            $table->string('cr_email')->nullable();
            $table->string('cr_phone')->nullable();
            $table->string('cr_facebook')->nullable();
            $table->string('cr_twitter')->nullable();
            $table->string('cr_linkedin')->nullable();
            $table->string('cr_instagram')->nullable();
            $table->string('cr_youtube')->nullable();
            $table->string('cr_stitle')->nullable();
            $table->string('cr_slanguage')->nullable();
            $table->string('cr_steam')->nullable();
            $table->string('cr_sdevelopment')->nullable();
            $table->string('cr_sdesign')->nullable();
            $table->string('cr_sinnovation')->nullable();
            $table->string('cr_scommunication')->nullable();
            $table->string('cr_joining')->nullable();
            $table->string('cr_month')->nullable();
            $table->string('cr_year')->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('crs');
    }
}
