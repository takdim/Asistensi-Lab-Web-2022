<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTugasSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tugas_siswas', function (Blueprint $table) {
            $table->id();
            $table->string('uuid', 36);
            $table->foreignId('siswa_id')->onDelete('cascade');
            $table->foreignId('tugas_id')->onDelete('cascade');
            $table->string('file', 100)->nullable();
            $table->integer('nilai')->default(0);
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
        Schema::dropIfExists('tugas_siswas');
    }
}
