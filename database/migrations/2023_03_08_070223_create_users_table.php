<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('designation')->nullable();
            $table->string('department')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->string('avatar')->nullable();
            $table->integer('category')->default(0)->nullable();
            $table->integer('slider')->default(0)->nullable();
            $table->integer('notice')->default(0)->nullable();
            $table->integer('about')->default(0)->nullable();
            $table->integer('gallery')->default(0)->nullable();
            $table->integer('event')->default(0)->nullable();
            $table->integer('administration')->default(0)->nullable();
            $table->integer('researcher')->default(0)->nullable();
            $table->integer('archive')->default(0)->nullable();
            $table->integer('publication')->default(0)->nullable();
            $table->integer('author')->default(0)->nullable();
            $table->integer('newsletter')->default(0)->nullable();
            $table->integer('setting')->default(0)->nullable();
            $table->integer('user')->default(0)->nullable();
            $table->boolean('is_admin')->default(0)->nullable();
            $table->boolean('role_admin')->default(0)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
