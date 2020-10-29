<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTutorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('subject');
            $table->string('class_type');
            $table->string('rate_hour')->nullable();
            $table->string('class_held');
            $table->string('language')->nullable();
            $table->text('tutor_background')->nullable();
            $table->text('teaching_methodology')->nullable();
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->string('cv')->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tutors');
    }
}
