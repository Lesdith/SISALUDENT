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
            $table->boolean('infectious_disease');
            $table->string('disease_name');
            $table->boolean('cardiac');
            $table->boolean('allergic');
            $table->string('what_you_allergy');
            $table->boolean('diabetic');
            $table->boolean('pregnant');
            $table->boolean('epileptic');
            $table->string('observations', 200);
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
