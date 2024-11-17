<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEboardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eboards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('publication_id')->nullable();
            $table->string('title')->nullable();
            $table->string('eboard_name')->nullable();
            $table->string('eboard_desig')->nullable();
            $table->string('eboard_dept')->nullable();
            $table->string('eboard_inst')->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();

            $table->foreign('publication_id')->references('id')->on('publications');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eboards');
    }
}
