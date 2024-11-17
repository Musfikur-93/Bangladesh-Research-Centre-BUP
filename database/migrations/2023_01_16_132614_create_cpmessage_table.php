<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCpmessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cpmessage', function (Blueprint $table) {
            $table->id();
            $table->string('cp_title');
            $table->string('cp_image')->nullable();
            $table->text('cp_message')->nullable();
            $table->string('cp_regards')->nullable();
            $table->string('cp_name')->nullable();
            $table->string('cp_designation')->nullable();
            $table->string('cp_organization')->nullable();
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
        Schema::dropIfExists('cpmessage');
    }
}
