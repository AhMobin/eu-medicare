<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('appoint_id');
            $table->text('new_test_name')->nullable();
            $table->string('mdc_name_one')->nullable();
            $table->string('mdc_dose_one')->nullable();
            $table->string('mdc_dur_one')->nullable();
            $table->string('mdc_name_two')->nullable();
            $table->string('mdc_dose_two')->nullable();
            $table->string('mdc_dur_two')->nullable();
            $table->string('mdc_name_three')->nullable();
            $table->string('mdc_dose_three')->nullable();
            $table->string('mdc_dur_three')->nullable();
            $table->string('mdc_name_four')->nullable();
            $table->string('mdc_dose_four')->nullable();
            $table->string('mdc_dur_four')->nullable();
            $table->string('mdc_name_five')->nullable();
            $table->string('mdc_dose_five')->nullable();
            $table->string('mdc_dur_five')->nullable();
            $table->text('extra_mdc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('treatments');
    }
}
