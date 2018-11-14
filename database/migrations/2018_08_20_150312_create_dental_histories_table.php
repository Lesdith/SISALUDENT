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
            $table->boolean('dental_hemorrhage')->default(0)->nullable();
            $table->boolean('mouth_infections')->default(0)->nullable();
            $table->boolean('mouth_ulcers')->default(0)->nullable();
            $table->boolean('reaction_anesthesia')->default(0)->nullable();
            $table->string('what_reaction')->nullable();
            $table->boolean('toothache')->default(0)->nullable();
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
