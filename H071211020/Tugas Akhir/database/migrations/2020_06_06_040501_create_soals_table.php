<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soals', function (Blueprint $table) {
            $table->id();
            $table->string('uuid', 36);
            $table->foreignId('mapel_id')->onDelete('cascade');
            $table->string('kode_soal', 25);
            $table->string('soal', 100);
            $table->string('a', 50);
            $table->string('b', 50);
            $table->string('c', 50);
            $table->string('d', 50);
            $table->string('jawaban', 50);
            $table->string('gambar', 100)->nullable();
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('soals');
    }
}
