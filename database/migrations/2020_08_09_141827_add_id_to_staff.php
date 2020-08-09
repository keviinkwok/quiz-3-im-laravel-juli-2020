<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdToStaff extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('staff', function (Blueprint $table) {
            $table->unsignedBigInteger('manager_id');
            $table->unsignedBigInteger('proyek_id');
            $table->foreign('manager_id')->references('manager_id')->on('manager');
            $table->foreign('proyek_id')->references('proyek_id')->on('proyek');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('staff', function (Blueprint $table) {
            $table->dropForeign(['proyek_id']);
            $table->dropForeign(['manager_id']);
            $table->dropColumn(['proyek_id']);
            $table->dropColumn(['manager_id']);
        });
    }
}
