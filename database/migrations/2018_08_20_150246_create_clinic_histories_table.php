<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinic_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id')->unsigned();
            $table->boolean('infectious_disease')->nullable();
            $table->string('disease_name')->nullable();
            $table->boolean('cardiac')->nullable();
            $table->boolean('allergic')->nullable();
            $table->string('what_you_allergy')->nullable();
            $table->boolean('diabetic')->nullable();
            $table->boolean('pregnant')->nullable();
            $table->boolean('epileptic')->nullable();
            $table->string('observations', 200)->nullable();
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
        Schema::dropIfExists('clinic_histories');
    }
}
