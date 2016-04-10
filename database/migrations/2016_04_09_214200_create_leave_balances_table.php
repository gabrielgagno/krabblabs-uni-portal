<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeaveBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_balances', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('excessHours', 10, 2);
            $table->decimal('sickLeaves', 10, 2);
            $table->decimal('vacationLeaves', 10, 2);
            $table->decimal('parentalLeaves', 10, 2);
            $table->decimal('bereavementLeaves', 10, 2);
            $table->decimal('leavesWoPay', 10, 2);
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
        Schema::drop('leave_balances');
    }
}
