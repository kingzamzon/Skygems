<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumToActivationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activations', function (Blueprint $table) {
            $table->string('payment_type');
            $table->enum('status', ['active', 'expired'])->nullable();
            $table->string('transaction_ref');
            $table->string('exam_type');
            $table->string('imei_no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('activations', function (Blueprint $table) {
            $table->dropColumn('payment_type');
            $table->dropColumn('status');
            $table->dropColumn('transaction_ref');
            $table->dropColumn('exam_type');
            $table->dropColumn('imei_no');
        });
    }
}
