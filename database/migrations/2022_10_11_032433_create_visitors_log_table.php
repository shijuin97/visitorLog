<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorsLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitors_log', function (Blueprint $table) {
            $table->id();
            $table->integer('unit_id')->nullable();
            $table->string('visitor_name');
            $table->string('contact_number');
            $table->string('nric');
            $table->dateTime('entry')->nullable();
            $table->dateTime('exit')->nullable();
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
        Schema::dropIfExists('visitors_log');
    }
}
