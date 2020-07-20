<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStakirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stakir', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_bayar');
            $table->string('no_resi',50);
            $table->string('status_kirim',50);
            $table->timestamps();

            $table->foreign('id_bayar')->references('id')->on('bayar')
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
        Schema::dropIfExists('stakir');
    }
}
