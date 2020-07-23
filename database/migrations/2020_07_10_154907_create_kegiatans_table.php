<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kegiatan');
            $table->bigInteger('anggota_id')->unsigned();
            $table->bigInteger('jenis_kegiatan_id')->unsigned(); 
            $table->text('summary_kegiatan');
            $table->text('foto_kegiatan');
            $table->date('tanggal_kegiatan');
            $table->text('alamat_kegiatan');
            $table->timestamps();

            $table->foreign('anggota_id')->references('id')->on('anggotas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('jenis_kegiatan_id')->references('id')->on('jenis_kegiatans')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kegiatans');
    }
}
