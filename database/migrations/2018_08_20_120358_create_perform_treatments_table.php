<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerformTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perform_treatments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('detail_treatment_plan_id')->unsigned();
            $table->integer('doctor_id')->unsigned();
            $table->boolean('status');
            $table->timestamps();

            $table->foreign('detail_treatment_plan_id')->references('id')->on('detail_treatment_plans')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('doctor_id')->references('id')->on('doctors')
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
        Schema::dropIfExists('perform_treatments');
    }
}
