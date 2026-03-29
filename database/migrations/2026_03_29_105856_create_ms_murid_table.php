<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('ms_murid', function (Blueprint $table) {
        $table->id(); // ID otomatis (Primary Key)
        $table->string('nama_lengkap');
        $table->string('kelas');
        $table->string('asal_sekolah');
        $table->text('alamat')->nullable();
        $table->string('no_hp_siswa')->nullable();
        $table->string('nama_orang_tua');
        $table->string('no_hp_ortu');
        $table->string('paket_awal');
        $table->string('pilihan_paket');
        $table->year('tahun_masuk'); // Sesuai desainmu ada tahun masuk
        $table->timestamps(); // Mengisi created_at & updated_at otomatis
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ms_murid');
    }
};
