<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneratepinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generatepins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pin')->unique();
            $table->string('batch_id');   // 1- 50
            $table->unsignedBigInteger('generated_by'); // auth-id 
            $table->enum('printed', ['yes', 'no'])->nullable();
            $table->unsignedBigInteger('printed_by')->nullable();  // auth-id
            $table->dateTime('printed_date')->nullable();
            $table->string('printed_batch')->nullable();   // 1- 50
            $table->enum('used', ['yes', 'no'])->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('generated_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('printed_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('generatepins');
    }
}
