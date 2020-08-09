<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyekTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyek', function (Blueprint $table) {
            $table->bigIncrements('proyek_id');
            $table->string('nama');
            $table->longText('deskripsi');
            $table->date('tanggal_mulai');
            $table->date('tanggal_deadline');
            $table->boolean('status',false);
            $table->unsignedBigInteger('manager_id');
            $table->foreign('manager_id')->references('manager_id')->on('manager');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyek');
    }
}
