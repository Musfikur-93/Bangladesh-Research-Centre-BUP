<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('m_thumbnial')->nullable();
            $table->string('m_title')->nullable();
            $table->string('m_name')->nullable();
            $table->string('m_designation')->nullable();
            $table->integer('steering_committee')->nullable();
            $table->integer('finance_committee')->nullable();
            $table->integer('syndicate_committee')->nullable();
            $table->integer('seneate_committee')->nullable();
            $table->integer('academic_councile')->nullable();
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
        Schema::dropIfExists('members');
    }
}
