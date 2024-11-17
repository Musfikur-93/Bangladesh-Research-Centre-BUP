<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('e_title')->nullable();
            $table->string('e_venue')->nullable();
            $table->string('e_time')->nullable();
            $table->string('e_thumbnail')->nullable();
            $table->text('e_des')->nullable();
            $table->string('keynote_img')->nullable();
            $table->string('keynote_name')->nullable();
            $table->string('keynote_desig')->nullable();
            $table->string('keynote_organization')->nullable();
            $table->string('keynote_type')->nullable();
            $table->string('chief_img')->nullable();
            $table->string('chief_name')->nullable();
            $table->string('chief_desig')->nullable();
            $table->string('chief_organization')->nullable();
            $table->string('chief_type')->nullable();
            $table->string('date')->nullable();
            $table->string('month')->nullable();
            $table->string('year')->nullable();
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
        Schema::dropIfExists('events');
    }
}
