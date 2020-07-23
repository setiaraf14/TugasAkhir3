<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggotas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_anggota');
            $table->char('hp_anggota');
            $table->char('ktp_anggota');
            $table->text('alamat_anggota');
            $table->bigInteger('divisi_id')->unsigned(); 
            $table->bigInteger('jabatan_id')->unsigned();
            $table->text('profile_anggota');
            $table->text('foto_anggota');
            $table->date('tanggal_masuk');
            $table->timestamps();

            $table->foreign('divisi_id')->references('id')->on('divisis')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('jabatan_id')->references('id')->on('jabatans')->onDelete('cascade')->onUpdate('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anggotas');
    }
}
