<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEventToVisitorsLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('visitors_log', function (Blueprint $table) {
            $table->string('event_name')->nullable()->after('unit_id');
            $table->boolean('isEvent')->default(0)->after('isExit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('visitors_log', function (Blueprint $table) {
            //
        });
    }
}
