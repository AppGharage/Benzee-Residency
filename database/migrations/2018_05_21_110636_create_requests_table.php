<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->increments('id', 9);
            $table->integer('user_id')->unsigned();
            $table->string('occupancy_type', 30);
            $table->boolean('has_roommate')->unsigned()->default(0);
            $table->string('institution', 30);
            $table->string('duration', 20);
            $table->string('level', 40);
            $table->boolean('is_closed')->unsigned()->default(0);
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
        Schema::dropIfExists('requests');
    }
}
