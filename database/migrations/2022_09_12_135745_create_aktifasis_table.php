<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAktifasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aktifasis', function (Blueprint $table) {
            $table->id();
            $table->string('aktif');
            $table->unsignedBigInteger('user_id');
            $table->date('tanggal');
            $table->foreign('user_id')->references('id')->on('useradmins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aktifasis');
    }
}