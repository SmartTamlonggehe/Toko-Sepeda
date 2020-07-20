<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBayarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bayar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_tujuan');
            $table->unsignedBigInteger('id_haki');
            $table->string('bank',50);
            $table->integer('total_bayar');
            $table->string('status',15);
            $table->timestamps();

            $table->foreign('id_tujuan')->references('id')->on('tujuan')
            ->onUpdate('CASCADE')
            ->onDelete('CASCADE');
            
            $table->foreign('id_haki')->references('id')->on('harga_kirim')
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
        Schema::dropIfExists('bayar');
    }
}
