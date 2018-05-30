<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->string('id', 9);
            $table->integer('user_id')->unsigned();
            $table->string('amount', 15,2);
            $table->smallInteger('request_id', 30)->unsigned();
            $table->boolean('is_paid')->unsigned()->default(0);
            $table->timestamp('end_date', 6);
            $table->smallInteger('has_fee_request')->unsigned()->default(0);
            $table->smallInteger('fee_is_paid')->unsigned()->default(0);
            $table->timestamp('fee_end_date', 6)->nullable();
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
        Schema::dropIfExists('bookings');
    }
}
