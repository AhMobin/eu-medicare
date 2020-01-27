<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInitialTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('initial_tests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('appoint_id');
            $table->string('body_temperature')->nullable();
            $table->string('blood_pressure')->nullable();
            $table->string('blood_suger')->nullable();
            $table->string('weight')->nullable();
            $table->string('wbc')->nullable();
            $table->string('rbc')->nullable();
            $table->string('hgb')->nullable();
            $table->text('others')->nullable();
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
        Schema::dropIfExists('initial_tests');
    }
}
