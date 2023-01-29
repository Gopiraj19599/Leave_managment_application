<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('staff_id');
            $table->string('type_of_leave');
            $table->string('description');
            $table->string('first_code');
            $table->string('second_code');
            $table->string('third_code');
            $table->string('status_one');
            $table->string('status_two');
            $table->string('status_three');
            $table->timestamps();

            $table->foreign('staff_id')->references('id')->on('user_accounts')
                   ->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leave_data');
    }
}
