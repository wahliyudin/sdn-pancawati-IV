<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdentitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('identities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nama');
            $table->string('nisn');
            $table->string('nik');
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->string('agama');
            $table->string('anak_ke');
            $table->string('jumlah_saudara');
            $table->string('suku');
            $table->string('kewarganegaraan');
            $table->string('bahasa');
            $table->string('asal_sekolah');
            $table->string('no_ijazah');
            $table->string('tanggal_ijazah');
            $table->string('gol_darah')->nullable();
            $table->string('berat_badan');
            $table->string('tinggi_badan');
            $table->string('riwayat_penyakit')->nullable();
            $table->string('pas_foto_url');

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
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
        Schema::dropIfExists('identities');
    }
}
