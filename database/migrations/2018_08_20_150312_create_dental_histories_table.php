<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDentalHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dental_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id')->unsigned();
            $table->date('last_medical_visit_date');
            $table->boolean('dental_hemorrhage');
            $table->boolean('mouth_infections');
            $table->boolean('mouth_ulcers');
            $table->boolean('reaction_anesthesia');
            $table->string('what_reaction');
            $table->boolean('toothache');
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
        Schema::dropIfExists('dental_histories');
    }
}
