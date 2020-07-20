<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTujuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tujuan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_kelurahan');
            $table->string('nm_penerima',100);
            $table->text('alamat');
            $table->string('no_hp',14);
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')
            ->onUpdate('CASCADE')
            ->onDelete('CASCADE');

            $table->foreign('id_kelurahan')->references('id')->on('kelurahan')
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
        Schema::dropIfExists('tujuan');
    }
}
