<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tr_pengeluaran', function (Blueprint $table) {
            $table->id();
            $table->string('keterangan');
            $table->decimal('jumlah', 12, 2);
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tr_pengeluaran');
    }
};