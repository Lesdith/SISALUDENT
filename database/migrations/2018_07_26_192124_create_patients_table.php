<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('names');
            $table->string('surnames');
            $table->integer('gender_id')->unsigned();
            $table->date('birth_date')->nullable();
            $table->integer('location_id')->unsigned();
            $table->string('address');
            $table->integer('municipality_id')->unsigned();
            $table->string('phone_number', 50);
            $table->string('file')->nullable();
            $table->timestamps();

          $table->foreign('gender_id')->references('id')->on('genders')
           ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('location_id')->references('id')->on('locations')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('municipality_id')->references('id')->on('municipalities')
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
        Schema::dropIfExists('patients');
    }
}
