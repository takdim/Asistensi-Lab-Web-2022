<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawabanSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawaban_siswas', function (Blueprint $table) {
            $table->id();
            $table->string('uuid', 36);
            $table->foreignId('tes_siswa_id')->onDelete('cascade');
            $table->foreignId('soal_id')->onDelete('cascade');
            $table->string('jawaban', 10);
            $table->tinyInteger('bs');
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
        Schema::dropIfExists('jawaban_siswas');
    }
}
