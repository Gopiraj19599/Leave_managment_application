<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('staff_management', function (Blueprint $table) {
            $table->id();
            $table->string('staff_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('date_of_birth');
            $table->string('email')->unique();
            $table->string('phone_number');
            $table->string('position');
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
        Schema::dropIfExists('staff_management');
    }
}
