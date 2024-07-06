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
        Schema::connection('mysql')->create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sepatu', 128);
            $table->integer('hpp')->nullable();
            $table->integer('ukuran37')->nullable();
            $table->integer('ukuran38')->nullable();
            $table->integer('ukuran39')->nullable();
            $table->integer('ukuran40')->nullable();
            $table->integer('ukuran41')->nullable();
            $table->integer('ukuran42')->nullable();
            $table->integer('ukuran43')->nullable();
            $table->integer('ukuran44')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
