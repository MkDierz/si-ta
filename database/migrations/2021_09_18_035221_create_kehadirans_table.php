<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKehadiransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kehadirans', function (Blueprint $table) {
            $table->id();
            $table->integer('id_mahasiswa');
            $table->date('tgl');
            $table->char('hari');
            $table->time('waktuhadir');
            $table->time('waktupulang');
            $table->text('kemajuan');
            $table->text('konsultasi')->nullable();
            $table->text('catatan_ppb')->nullable();
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
        Schema::dropIfExists('kehadirans');
    }
}
