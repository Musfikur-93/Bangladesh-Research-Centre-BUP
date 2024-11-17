<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEadvisorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eadvisors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('publication_id')->nullable();
            $table->string('title')->nullable();
            $table->string('eadvisor_name')->nullable();
            $table->string('eadvisor_desig')->nullable();
            $table->string('eadvisor_dept')->nullable();
            $table->string('eadvisor_inst')->nullable();
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
        Schema::dropIfExists('eadvisors');
    }
}
