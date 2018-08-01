<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeethTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teeth', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->integer('tooth_type_id')    ->unsigned();
            $table->integer('tooth_stage_id')   ->unsigned();
            $table->integer('tooth_position_id')->unsigned();
            $table->timestamps();

            $table->foreign('tooth_type_id')
            ->references('id')->on('tooth_types')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('tooth_stage_id')
            ->references('id')->on('tooth_stages')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('tooth_position_id')
            ->references('id')->on('tooth_positions')
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
        Schema::dropIfExists('teeth');
    }
}
