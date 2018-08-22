<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailTreatmentPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_treatment_plans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('treatment_plan_id')->unsigned();
            $table->integer('tooth_id')->unsigned();
            $table->integer('diagnosis_id')->unsigned();
            $table->integer('tooth_treatment_id')->unsigned();
            $table->decimal('cost', 19, 4);
            $table->longText('description')->nullable();
            $table->timestamps();
                     
            $table->foreign('treatment_plan_id')->references('id')->on('treatment_plans')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('tooth_id')->references('id')->on('teeth')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('diagnosis_id')->references('id')->on('diagnoses')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('tooth_treatment_id')->references('id')->on('tooth_treatments')
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
        Schema::dropIfExists('detail_treatment_plans');
    }
}
