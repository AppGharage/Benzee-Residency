<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id', 9)->unique();
            $table->integer('user_id')->unsigned();
            $table->string('payment_type', 80);
            $table->Integer('amount_paid')->unsigned();
            $table->Integer('service_fee')->unsigned();
            $table->string('ref_id', 10);
            $table->string('narration', 150);
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
        Schema::dropIfExists('payments');
    }
}
