<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->string('namaKelas');
            $table->integer('idPengajar');
            $table->date('waktuMulai');
            $table->date('waktuSelesai');
            $table->boolean('isTersedia');
            $table->integer('kuotaKelas');
            $table->string('deskripsiKelas');
            $table->integer('biaya');
            $table->string('linkGrupWa');
            $table->string('fotoKelas');
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
        Schema::dropIfExists('kelas');
    }
}
