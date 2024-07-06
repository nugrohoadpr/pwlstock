<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::connection('mysql')->create('barangkeluars', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->unsignedBigInteger('nama_sepatu_id');
            $table->string('jenis_keluar', 16);
            $table->string('link', 256);
            $table->integer('hargajual');
            $table->integer('ukuran37')->default(0);
            $table->integer('ukuran38')->default(0);
            $table->integer('ukuran39')->default(0);
            $table->integer('ukuran40')->default(0);
            $table->integer('ukuran41')->default(0);
            $table->integer('ukuran42')->default(0);
            $table->integer('ukuran43')->default(0);
            $table->integer('ukuran44')->default(0);
            $table->integer('profit');
            $table->timestamps();

            $table->foreign('nama_sepatu_id') 
                ->references('id')
                ->on('stocks')
                ->onDeletes('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangkeluars');
    }
};
