<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHargaKirimTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('harga_kirim', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_keluarahan');
            $table->unsignedBigInteger('id_jasa');
            $table->integer('hari');
            $table->integer('harga');
            $table->timestamps();

            $table->foreign('id_keluarahan')->references('id')->on('kelurahan')
            ->onUpdate('CASCADE')
            ->onDelete('CASCADE');
            
            $table->foreign('id_jasa')->references('id')->on('jasa')
            ->onUpdate('CASCADE')
            ->onDelete('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('harga_kirim');
    }
}
