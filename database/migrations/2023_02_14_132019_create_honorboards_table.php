<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHonorboardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('honorboards', function (Blueprint $table) {
            $table->id();
            $table->string('hb_image')->nullable();
            $table->string('hb_name')->nullable();
            $table->string('slug')->nullable();
            $table->string('hb_designation')->nullable();
            $table->string('hb_profile')->nullable();
            $table->string('hb_joining')->nullable();
            $table->string('hb_month')->nullable();
            $table->string('hb_year')->nullable();
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
        Schema::dropIfExists('honorboards');
    }
}
