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
        // Menjalankan query untuk membuat database dan table
        Schema::create('pemasukan', function (Blueprint $table) {
            $table->string('npm', 11)->unique();
            $table->string('nama', 60);
            $table->string('alamat');
            $table->integer('nominalKas');
            $table->date('tanggalKas');
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
        Schema::dropIfExists('pemasukan');
    }
};
