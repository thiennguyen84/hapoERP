<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salarys', function (Blueprint $table) {
            $table->increments('id');
            $table->float('basic_salary');
            $table->float('overtime_salary');
            $table->float('real_salary');
            $table->float('total_salary');
            $table->integer('user_id')->unsigned();
            $table->integer('attendsion_id')->unsigned();
            $table->integer('overtime_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('vacation_partime_id')->unsigned();
            $table->foreign('attendsion_id')->references('id')->on('attendsions');
            $table->foreign('overtime_id')->references('id')->on('overtimes');
            $table->foreign('vacation_partime_id')->references('id')->on('vacation_partimes');
            $table->softDeletes();
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
        Schema::dropIfExists('salarys');
    }
}
