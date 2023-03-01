<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTesSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tes_siswas', function (Blueprint $table) {
            $table->id();
            $table->string('uuid', 36);
            $table->foreignId('siswa_id')->onDelete('cascade');
            $table->foreignId('tes_id')->onDelete('cascade');
            $table->string('nilai', 100)->nullable();
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
        Schema::dropIfExists('tes_siswas');
    }
}
