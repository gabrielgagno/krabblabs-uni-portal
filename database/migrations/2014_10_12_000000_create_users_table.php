<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('employeeNumber')->unique();
            $table->string('firstName');
            $table->string('middleName');
            $table->string('lastName');
            $table->string('sex');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->integer('department');
            $table->integer('position');
            $table->integer('paygrade');
            $table->decimal('salary',10,2);
            $table->date('dateStarted');
            $table->date('dateLeft')->nullable();
            $table->boolean('isManagement')->default(0);
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
        Schema::drop('users');
    }
}
