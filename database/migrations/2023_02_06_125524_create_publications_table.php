<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->string('publication_name')->nullable();
            $table->string('publication_slug')->nullable();
            $table->string('publication_image')->nullable();
            $table->string('publication_file')->nullable();
            $table->string('chiefpatron_title')->nullable();
            $table->text('chiefpatron_message')->nullable();
            $table->string('chiefpatron_name')->nullable();
            $table->string('chiefpatron_desig')->nullable();
            $table->string('chiefpatron_dept')->nullable();
            $table->string('chiefpatron_inst')->nullable();
            $table->string('chipatron_name')->nullable();
            $table->string('chipatron_desig')->nullable();
            $table->string('chipatron_dept')->nullable();
            $table->string('chipatron_inst')->nullable();
            $table->string('patron_name')->nullable();
            $table->string('patron_desig')->nullable();
            $table->string('patron_dept')->nullable();
            $table->string('patron_inst')->nullable();
            $table->string('editor_title')->nullable();
            $table->text('editor_note')->nullable();
            $table->string('editor_name')->nullable();
            $table->string('editor_desig')->nullable();
            $table->string('editor_dept')->nullable();
            $table->string('editor_inst')->nullable();
            $table->string('chiefeditor_name')->nullable();
            $table->string('chiefeditor_desig')->nullable();
            $table->string('chiefeditor_dept')->nullable();
            $table->string('chiefeditor_inst')->nullable();
            $table->string('issue_date')->nullable();
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
        Schema::dropIfExists('publications');
    }
}
