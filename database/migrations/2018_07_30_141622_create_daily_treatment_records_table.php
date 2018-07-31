<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyTreatmentRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_treatment_records', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('treatment_plan_id')->unsigned();
            $table->integer('doctor_id')->unsigned();
            $table->decimal('total', 19, 4);
            $table->decimal('pay_debt', 19, 4);
            $table->date('payment_date');
            $table->decimal('balance_debt', 19, 4);
            $table->timestamps();

            
            $table->foreign('treatment_plan_id')->references('id')->on('treatment_plans')
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
        Schema::dropIfExists('daily_treatment_records');
    }
}
