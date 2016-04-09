<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user');
            $table->date('date');
            $table->timestamp('timeIn');
            $table->timestamp('timeOut');
            $table->decimal('actualHours', 2, 2);
            $table->boolean('isHoliday')->default(false);
            $table->integer('leaveStatus');
            $table->integer('leaveType');
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
        Schema::drop('attendances');
    }
}
