<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('special_exams', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('treatment_plan_id')->unsigned();
            $table->integer('tooth_id')->unsigned();
            $table->string('image')->nullable();
            $table->decimal('cost', 19, 4);
            $table->decimal('total', 19, 4);
            $table->timestamps();


            $table->foreign('treatment_plan_id')->references('id')->on('treatment_plans')
            ->onDelete('cascade')
            ->onUpdate('cascade');

             $table->foreign('tooth_id')->references('id')->on('teeth')
             ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('special_exams');
    }
}
