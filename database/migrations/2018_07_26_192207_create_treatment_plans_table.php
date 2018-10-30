<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTreatmentPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatment_plans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id')->unsigned();
            // $table->date('start_date');
            // $table->date('end_date');
            $table->decimal('subtotal', 19, 4);
            $table->decimal('discount', 19, 4);
            $table->decimal('total', 19, 4);


            $table->timestamps();

           $table->foreign('patient_id')->references('id')->on('patients')
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
        Schema::dropIfExists('treatment_plans');
    }
}
