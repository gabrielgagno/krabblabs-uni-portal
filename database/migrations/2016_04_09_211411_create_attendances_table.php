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
            $table->integer('user_id');
            $table->date('date');
            $table->timestamp('timeIn');
            $table->timestamp('timeOut');
            $table->timestamp('oldTimeIn');
            $table->timestamp('oldTimeOut');
            $table->float('actualHours');
            $table->boolean('isHoliday')->default(false);
            $table->integer('leaveStatus');
            $table->text('timeInList');
            $table->timestamps();
            $table->softDeletes();
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
